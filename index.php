<?php include "css/bootstrap.php";  
session_start();
if(isset($_SESSION['user_type']) && $_SESSION['user_type']=="Admin"){
  header("location: admin/dashboard.php");
}else if(isset($_SESSION['user_type']) && $_SESSION['user_type']=="Voters"){
  if($_SESSION['stats']=="Pending" || $_SESSION['stats']=="Invalid"){
    header("location: voter_verification.php");
  }else{
    if($_SESSION['acc_stats']=="New"){
      header("location: voters/create_new_password.php");
    }else if($_SESSION['acc_stats']=="Old"){
      header("location: voters/voter_page.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<link rel="stylesheet" href="css/nav-bar.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $("#confirmPassword2").keyup(function(){
      let inp = $("#inputPassword2").val();
      let conf = $(this).val();
      if(inp!=conf){
        $(this).css("border-color", "red");
        $("#inputPassword2").css("border-color", "");
        $(".signup").prop("disabled", true);
      }else{
        if(conf.length >= 10){
          $(this).css("border-color", "");
          $("#inputPassword2").css("border-color", "");
          $(".signup").prop("disabled", false);
      }else{
        $(".signup").prop("disabled", true);
        $("#inputPassword2").css("border-color", "red");
        $("#pwMessage").text("Password must be long atleast 10 characters");
      }
      }
    });
     $("#inputPassword2").keyup(function(){
      let inp = $("#confirmPassword2").val();
      let conf = $(this).val();
      if(conf.length >= 10){
        $("#pwMessage").text("");
        $("#inputPassword2").css("border-color", "green");

      }else{
        $(".changepass").prop("disabled", true);
        $("#inputPassword2").css("border-color", "red");
        $("#pwMessage").text("Password must be long atleast 10 characters");
      }
      
    });
    
  });
</script>

<body onload="load()">
    <?php include "includes/nav-bar-homepage.php"; ?>
    <?php 
    if(isset($_SESSION['message-error'])){
      echo $_SESSION['message-error'];
      unset($_SESSION['message-error']);
    }
    ?>
<div class="carousel-container">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="slider-1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="slider-2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="slider-3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<h1>VOTE TALLY</h1>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <script>
  
  function load(){
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Handle the response when the request is complete
                     document.getElementById("chart-content").innerHTML = this.responseText;
                    alert("SUCCESS")
                }else{
                  alert("FAILED TO LOAD")
                }
            };
          
        
        xhttp.open("GET", "includes/ballot_tally.php", true);
        xhttp.send();
        }
        // setInterval(function(){
        //   load();
        // },1000);
</script> -->
<div id="chart-content">

<?php include "includes/ballot_tally.php";?>
</div>
</body>
</html>
<style>
  body{
    overflow-x:hidden;
  }
  .carousel-item img {
    height:calc(100vh - 10vh);
  }.carousel-caption{
    color:#092635;
  }.chart-container{
        width:50vw;
        height:50vh;
        margin-top:20px;
    }#chart-content {
        display:grid;
        grid-template-columns: auto auto;
        width:100%;
    } h1 {
        text-align:center;
        margin:20px;
    }
</style>
<!-- Login Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="includes/login.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User ID</label>
                <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Ex. 19-0947-316" required>
            </div>
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" required >
            <div id="passwordHelpBlock" class="form-text"><a href="http://">Forgot Password</a></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit_log" class="btn btn-primary">Login</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Sign-up Modal -->
<div class="modal fade" id="sign-up-modal" tabindex="-1" aria-labelledby="sign-up-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sign up here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="includes/sign_up.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" id="exampleFormControlInput1" placeholder="Ex. John" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname" id="exampleFormControlInput1" placeholder="Ex. Titor" required>
            </div>
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" id="inputPassword2" name="password"  class="form-control" aria-describedby="passwordHelpBlock" required>
            <div class="form-text" id="pwMessage">
                    
            </div>
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" id="confirmPassword2" name="confirmpassword" class="form-control" aria-describedby="passwordHelpBlock" required>
            <div class="mb-3">
                <label for="Profile" class="form-label">Profile Picture</label>
                <input class="form-control" type="file" name="profile" id="Profile">
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit_register" class="btn btn-primary signup">Sign up</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>