<?php include "../css/bootstrap.php";
    include "../includes/db.php";
    session_start();

    if(!isset($_SESSION['voter_user_id']) ||  $_SESSION['acc_stats'] == "Old"){
        header("location: ../index.php");
    }else{
    $voter_id = $_SESSION['voter_user_id'];
    $queryVoter = $conn->prepare("SELECT * FROM voters WHERE UserID = '$voter_id'");
    $queryVoter->execute();
    $user_voter = $queryVoter->fetch(PDO::FETCH_ASSOC);
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your strong password</title>
    
  
</head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $(".conf_pass").keyup(function(){
      let inp = $(".new_pass").val();
      let conf = $(this).val();
      if(inp!=conf){
        $(this).css("border-color", "red");
        $(".new_pass").css("border-color", "");
        $(".changepass").prop("disabled", true);
      }else{
        if(conf.length >= 10){
          $(this).css("border-color", "");
          $(".new_pass").css("border-color", "");
          $(".changepass").prop("disabled", false);
      }else{
        $(".changepass").prop("disabled", true);
        $(".new_pass").css("border-color", "red");
        $("#pwMessage").text("Password must be long atleast 10 characters");
      }
      }
    });
     $(".new_pass").keyup(function(){
      let inp = $(".conf_pass").val();
      let conf = $(this).val();
      if(conf.length >= 10){
        $("#pwMessage").text("");
        $(".new_pass").css("border-color", "green");

      }else{
        $(".changepass").prop("disabled", true);
        $(".new_pass").css("border-color", "red");
        $("#pwMessage").text("Password must be long atleast 10 characters");
      }
      
    });
  });
</script>
<style>
    nav{
    height:10vh;
    background-color: #092635;
    padding:15px;
    /* position:fixed; */
    width:100vw;
    top:0;
}
    h2{
        color:#9EC8B9;
    }.container-body{
    height:calc(100vh - 10vh);
    display:grid;
    justify-content:center;
    align-items:center;
}.container-body .center-container{
    border:1px solid #092635;
    border-radius:10px;
    padding:20px;
    width:40vw;
}.buttons{
    display:flex;
    justify-content:space-between;
}
</style>
<body>
    <nav>
        <h2>E-VOTING SYSTEM</h2>
    </nav>
    <?php if(isset($_SESSION['message-wrong-password'])){ echo  $_SESSION['message-wrong-password']; unset( $_SESSION['message-wrong-password']);}?>
    <div class="container-body">
        <form action="../includes/newVoterChangePassword.php" method="post" class="center-container">
            <p>Hi, <?php echo $user_voter['Firstname'];?></p>
            <h4>CREATE YOUR NEW PASSWORD</h4>
            <br>
            <div class="mb-3">
            <label for="newpassword" class="form-label">New Password</label>
            <input type="password" name="newPassword" class="form-control new_pass" id="newpassword" required>
              <div class="form-text" id="pwMessage">
                    
              </div>
            </div>
            <div class="mb-3">
            <label for="confpassword" class="form-label">Confirm Password</label>
            <input type="password" name="confirmNewPassword" class="form-control conf_pass" id="confpassword" required>
            </div>
            <div class="buttons">
            <button type="submit" name="submit_changePass" class="btn btn-primary changepass">Change Password</button>
            <a type="submit" href="../logout.php" class="btn btn-danger">Logout</a>
            </div>
        </form>
    </div>
</body>
</html>