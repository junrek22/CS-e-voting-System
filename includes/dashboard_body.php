<?php 
include "db.php";
if(!isset($_SESSION['user_type']) || $_SESSION['user_type']!="Admin"){
  header("location: ../index.php");
}else{
  $votersVar = array("Valid", "Pending", "Invalid");
  $votertypeNum = array();
  $queryVoters = $conn->prepare("SELECT COUNT(UserID) as num_voters FROM voters WHERE Status = :stat");
  foreach($votersVar as $voters){
      $queryVoters->bindParam(":stat", $voters, PDO::PARAM_STR);
      $queryVoters->execute();
      $voterFetch = $queryVoters->fetch(PDO::FETCH_ASSOC);
      array_push($votertypeNum, $voterFetch['num_voters']);
  }
  $votedtype = array("VOTED", "NOTVOTED");
  $votedNum = array();
  $queryVoted = $conn->prepare("SELECT COUNT(UserID) as votes FROM voters WHERE Status = 'Valid' AND vote_stat = :vote_stat");
  foreach($votedtype as $isVote){
      $queryVoted->bindParam(":vote_stat", $isVote, PDO::PARAM_STR);
      $queryVoted->execute();
      $hasVoteFetch = $queryVoted->fetch(PDO::FETCH_ASSOC);
      array_push($votedNum, $hasVoteFetch['votes']);
  }
  
  $queryCand = $conn->prepare("SELECT COUNT(candidate_id) as candidate_num FROM candidate");
  $queryCand->execute();
  $numCand = $queryCand->fetch(PDO::FETCH_ASSOC);

  $queryBanner = $conn->prepare("SELECT * FROM banner");
  $queryBanner->execute();
  $banner = $queryBanner->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="nav-body">
    <h3>DASHBOARD</h3>
    <div class="right-nav">
        <button type="button "class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#changeAdmin">Change Admin Credentials</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vote_recovery">Voter's Recovery</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Banner">Banner</button>
        

        <div class="modal fade" id="changeAdmin" tabindex="-1" aria-labelledby="seeChangeAdmin" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="seeChangeAdmin">Change Credentials</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body seeMoreBox">
              <form action="../includes/admin_tools_and_config_processing.php" method="post">
                <div class="mb-3">
                    <label for="newUsername" class="form-label">Username</label>
                    <input class="form-control" id="newUsername" name="newUsername" value="<?php echo $admin_username; ?>"type="text" required>
                </div>
                <div class="mb-3">
                    <label for="newFormPassword" class="form-label">New Password</label>
                    <input class="form-control" id="newFormPassword" name="NewPassword"type="password" required>
                </div>
                <label for="PasstoConfirm" class="form-label">Old Password</label>
                <input type="password" id="PasstoConfirm" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" required>
                <div id="passwordHelpBlock" class="form-text">
                  To proceed to change admin's credential, Enter the admin password.
                </div>
                <div class="modal-footer">
                  <button type="submit" name="submit_change_admin" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div> 
                </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="vote_recovery" tabindex="-1" aria-labelledby="seeVoterRecovery" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="seeVoterRecovery">Voter's Recovery</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body seeMoreBox">
              <form action="../includes/admin_tools_and_config_processing.php" method="post">

              <!-- <div class="mb-3">
                    <label for="OldBanner" class="form-label">Search voter</label>
                    <input class="form-control" id="search_vote" type="text">
                </div>

                <label for="PasstoConfirm" class="form-label">Password</label>
                  <input type="password" id="PasstoConfirm" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" required>
                  <div id="passwordHelpBlock" class="form-text">
                    To proceed to recover voter account, Enter the admin password.
                  </div>
                   -->
                <div class="modal-footer">
                  <button type="submit" name="submit_recovery" class="btn btn-primary">Recover</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div> 
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="Banner" tabindex="-1" aria-labelledby="seeBanner" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="seeBanner">Create Banner</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body seeMoreBox">
              <form action="../includes/admin_tools_and_config_processing.php" method="post">
                <div class="mb-3">
                    <label for="OldBanner" class="form-label">Old Banner</label>
                    <input class="form-control" id="OldBanner" type="text" value="<?php echo $banner['Banner_title'];?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="NewBanner" class="form-label">New Banner</label>
                    <input class="form-control" id="NewBanner" name="Banner" type="text" required >
                </div>
                <label for="PasstoConfirm" class="form-label">Password</label>
                  <input type="password" id="PasstoConfirm" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" required>
                  <div id="passwordHelpBlock" class="form-text">
                    To proceed to change election banner, Enter the admin password.
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="submit_change_banner" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>

    </div>
</div>
<div class="dashboard-cards">
    <div>
        <h1><?php echo $votertypeNum[0];?></h1>
        <p>Number of Registered Voters</p>
    </div>
    <div>
        <h1><?php echo $votertypeNum[1];?></h1>
        <p>Number of Unregistered Voters</p>
    </div>
    <div>
        <h1><?php echo $votedNum[0];?></h1>
        <p>Number of Voters Already Voted</p>
    </div>
    <div>
        <h1><?php echo $votedNum[1];?></h1>
        <p>Number of Voters Not Voted Yet</p>
    </div>
    <div>
        <h1><?php echo $votertypeNum[2];?></h1>
        <p>Number of Revoked voters</p>
    </div>
    <div>
        <h1><?php echo $numCand['candidate_num'];?></h1>
        <p>Number of Candidates</p>
    </div>
</div>
<h3 id="banner_header">
<?php echo strtoupper($banner['Banner_title']);?>
</h3>
<p id="title">
VOTE TALLY
</p>

<div id="chart-content">
<?php include "../includes/ballot_tally.php";?>
</div>
<style>
    .nav-body{
        padding:10px;
        display:flex;
        justify-content:space-between;
    }.right-nav{
        /* border:1px solid blue; */
    }.right-nav button{
        margin:0px 5px 0px 5px;
    }.dashboard-cards{
        /* border:1px solid blue; */
        display:grid;
        grid-template-columns: auto auto auto;
    }.dashboard-cards > div{
      text-align:center;
       border:1px solid #092635;
        border-radius:10px;
       margin:0px 5px 10px 5px;
       padding-top:5px;
       background-color: #5C8374;
    }.dashboard-cards div > *{
      color:white;
    }
    
    .chart-container{
        width:50%;
        height:50vh;
        margin-top:20px;
        border:1px solid #092635;
    }#chart-content {
        display:flex;
        flex-wrap:wrap;
    } #title {
        text-align:center;
        margin:0;
    }#banner_header {
        text-align:center;
        margin:20px;
    }
</style>
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
