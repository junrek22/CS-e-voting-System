<?php 
session_start();
if(!isset($_SESSION['voter_user_id'])){
    header("location: ../index.php");
}else{
    $voter_id = $_SESSION['voter_user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../css/bootstrap.php";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['header-title'];?></title>
    <?php 
    include "../includes/db.php";
    $queryVoter = $conn->prepare("SELECT * FROM voters WHERE UserID = '$voter_id'");
    $queryVoter->execute();
    $user_voter = $queryVoter->fetch(PDO::FETCH_ASSOC);

    $queryBallot = $conn->prepare("SELECT candidate.profile_pic, candidate.candidate_first_name, 
    candidate.candidate_last_name, candidate.candidate_nickname, candidate.Position FROM candidate
    INNER JOIN voters_ballot ON voters_ballot.candidate_id = candidate.candidate_id WHERE user_voter = '$voter_id'");
    $queryBallot->execute();
    ?>
</head>
<link rel="stylesheet" href="../css/voter_done.css">

<body>
    <nav>
    <h2>E-VOTING SYSTEM</h2>
        <div class="dropdown profile-button">
            <button id="profile-drop"class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../profile/<?php echo $user_voter['Profile_pic'];?>" alt="">
                Hi, <?php echo $user_voter['Firstname'];?>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#modalAccount"><i class="fa-solid fa-user"></i>My Account</a></li>
                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#modalChangePass"><i class="fa-solid fa-user"></i>Change Password</a></li>
                <li><a class="dropdown-item" href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
            </ul>
        </div>
    </nav>

    
    <div class="modal fade" id="modalAccount" tabindex="-1" aria-labelledby="seeVotersAccount" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="seeVotersAccount">My Account</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body seeMoreBox">
            <form action="../includes/voter_setting_done_vote.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="changeFirstname" class="form-label">Username ID</label>
                  <input type="text" class="form-control" id="changeFirstname" value="<?php echo $voter_id; ?>" disabled>
                </div>
                <div class="mb-3">
                  <label for="changeFirstname" class="form-label">Firstname</label>
                  <input type="text" name="EditFirstname" class="form-control" value="<?php echo $user_voter['Firstname']; ?>" id="changeFirstname" required>
                </div>
                <div class="mb-3">
                  <label for="changeLastname" class="form-label">Lastname</label>
                  <input type="text" name="EditLastname" class="form-control" value="<?php echo $user_voter['Lastname']; ?>" id="changeLastname" required>
                </div>
                <div class="mb-3">
                <label for="Profile" class="form-label">Profile Picture</label>
                <input class="form-control" type="file" name="changeProfile" id="Profile">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit_change_account" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    
        
    <div class="modal fade" id="modalChangePass" tabindex="-1" aria-labelledby="seeChangePass" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="seeChangePass">Change Password</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body seeMoreBox">
            <form action="../includes/voter_setting_done_vote.php" method="post">
                <div class="mb-3">
                  <label for="newPasswordLabel" class="form-label">New Password</label>
                  <input type="password" name="NewPassword" class="form-control" id="newPasswordLabel" required>
                </div>
                <label for="PasstoConfirm" class="form-label">Old Password</label>
                  <input type="password" id="PasstoConfirm" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" required>
                  <div id="passwordHelpBlock" class="form-text">
                    To proceed to change password, Enter the admin password.
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit_change_pass" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    <div class="container-body">
        <div class="center-container">
            <h3><?php echo $_SESSION['header-h3'];?></h3>
            <hr>
            <div class="body-text">
                <p>Thank you for voting Sir/Ma'am <b><?php echo $user_voter['Firstname']." ".$user_voter['Lastname'];?></b><br>Heres the list of your ballot receipt.</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MyBallot">My Ballot</button>
                <div class="modal fade" id="MyBallot" tabindex="-1" aria-labelledby="seeMyBallot" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="seeMyBallot">My Ballot Receipt</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body seeMoreBox">
                                <?php foreach($queryBallot as $ballot):?>
                                <div class="ballot-card">
                                    <div class="position"><b><?php echo $ballot['Position'];?></b></div>
                                    <div class="profile"><img src="../profile/<?php echo $ballot['profile_pic'];?>" alt=""></div>
                                    <div class="name-candidate"><?php echo $ballot['candidate_first_name'].' <b>"'.$ballot['candidate_nickname'].'"</b> '.$ballot['candidate_first_name'];?></div>
                                </div>
                                <?php endforeach;?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php if(isset($_SESSION['message']) && isset($_SESSION['control']) && isset($_SESSION['title'])): ?>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header <?php echo $_SESSION['control'];?>">
      <strong class="me-auto"><?php echo $_SESSION['title']; ?></strong>
      <small>Just now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
    <?php echo $_SESSION['message']; ?>
    </div>
  </div>
</div>
<?php unset($_SESSION['message']);unset($_SESSION['control']);unset($_SESSION['title']);?>
<?php endif; ?>

<?php
if(isset($_SESSION['function'])){
    echo $_SESSION['function'];
    unset($_SESSION['function']);
}?>
</body>
</html>


