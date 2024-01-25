<link rel="stylesheet" href="../css/voter_done.css">
<link rel="stylesheet" href="../css/dashboard_body.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
     $(".new_pass").keyup(function(){
      let conf = $(this).val();
      if(conf.length >= 10){
        $("#pwMessage").text("");
        $(".new_pass").css("border-color", "green");
        $(".changepass").prop("disabled", false);

      }else{
        $(".changepass").prop("disabled", true);
        $(".new_pass").css("border-color", "red");
        $("#pwMessage").text("Password must be long atleast 10 characters");
      }
      
    });
  });
</script>
<?php 
include "db.php";
if(!isset($_SESSION['user_type']) || $_SESSION['user_type']!="Admin"){
  header("location: ../index.php");
}
?>
<div class="nav-body">
    <h3>DASHBOARD</h3>
    <div class="right-nav">
        <button type="button "class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#changeAdmin">Change Admin Credentials</button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Banner">Banner</button>
        

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
                    <input class="form-control new_pass" id="newFormPassword" name="NewPassword"type="password" required>
                    <div class="form-text" id="pwMessage">
                      
                    </div>
                </div>
                <label for="PasstoConfirm" class="form-label">Old Password</label>
                <input type="password" id="PasstoConfirm" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" required>
                <div id="passwordHelpBlock" class="form-text">
                  To proceed to change admin's credential, Enter the admin password.
                </div>
                <div class="modal-footer">
                  <button type="submit" name="submit_change_admin" class="btn btn-primary changepass">Save changes</button>
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
        <h1 class="record_board"></h1>
        <p>Number of Registered Voters</p>
    </div>
    <div>
        <h1 class="record_board"></h1>
        <p>Number of Unregistered Voters</p>
    </div>
    <div>
        <h1 class="record_board"></h1>
        <p>Number of Voters Already Voted</p>
    </div>
    <div>
        <h1 class="record_board"></h1>
        <p>Number of Voters Not Voted Yet</p>
    </div>
    <div>
        <h1 class="record_board"></h1>
        <p>Number of Revoked voters</p>
    </div>
    <div>
        <h1 class="record_board"></h1>
        <p>Number of Candidates</p>
    </div>
</div>
<?php 
$queryrow = $conn->prepare("SELECT DISTINCT Position FROM candidate");
$queryrow->execute();
$queryBanner = $conn->prepare("SELECT * FROM banner");
$queryBanner->execute();
$banner = $queryBanner->fetch(PDO::FETCH_ASSOC);
?>
<?php if($queryrow->rowCount() > 0): ?>
<h3 id="banner_header">
<?php echo strtoupper($banner['Banner_title']);?>
</h3>
<p class="title">
VOTE TALLY</p>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  let catchdata = "";
  function setResponse(data){
    catchdata = data;
  }
  function getResponse(){
    return catchdata;
  }
  function loadEverything(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        setResponse(this.responseText);
    }
    xhttp.open("GET", "../includes/ballot_tally_realtime.php");
    xhttp.send();
  }
  function loadDashboard(){
    const json_http = new XMLHttpRequest();
    json_http.onload = function(){
        let record_class = document.getElementsByClassName("record_board");
        let json_retrieve = JSON.parse(this.responseText);
        for(let i = 0; i<json_retrieve.length; i++){
          record_class[i].innerHTML = json_retrieve[i];
        }
    }
    json_http.open("GET", "../includes/dashboard_count.php");
    json_http.send();
  }
  function jsonAsync(){
    let cand_nicks = [];
    let cand_voteCount = [];
    let cand_post = [];
    let jsonText = getResponse();
    let getJson = JSON.parse(jsonText);
    let i = 0;
    getJson.forEach(function(position) {
      let cand_nicks_votes = {};
          for (var key in position) {
                  var candidates = position[key];
                  candidates.forEach(function(candidate) {
                      var name = candidate.name;
                      var votes = candidate.vote_count;
                      cand_nicks_votes[name] = votes;
                  });
                  cand_post.push(cand_nicks_votes);
                  
              i++;
          }
      });
      cand_post.forEach(function(key){
        let cand_nick_temp = [], cand_vote_temp = [];
        var sortedKeys = Object.keys(key).sort(function(a, b) {
          return key[b] - key[a];
      });
      var sortedArray = {};
        sortedKeys.forEach(function(sortkey) {
            sortedArray[sortkey] = key[sortkey];
      });
      Object.keys(sortedArray).forEach(function(catchkey) {
          var value = sortedArray[catchkey];
          cand_nick_temp.push(catchkey);
          cand_vote_temp.push(value);
          ;
      });
      cand_nicks.push(cand_nick_temp);
      cand_voteCount.push(cand_vote_temp);
      })
      <?php 
      $queryLoop = $conn->prepare("SELECT DISTINCT Position FROM candidate");
      $queryLoop->execute();
      $j = 0;
      ?>
      <?php foreach($queryLoop as $k):?>
        chartTable<?php echo $j;?>.data.labels = cand_nicks[<?php echo $j;?>];
        chartTable<?php echo $j;?>.data.datasets[0].data = cand_voteCount[<?php echo $j;?>];
        chartTable<?php echo $j;?>.update();
      <?php $j++;?>
      <?php endforeach;?>
  }
  function load(){
    loadDashboard();
    loadEverything();
  }
  setInterval(function(){
    load();
    jsonAsync();
  },1000);
</script> 
<div class="chart-content">
<?php include "ballot_tally.php";?>
</div>
<?php endif; ?>
<?php if($queryrow->rowCount() <= 0): ?>
  <div id="chart-blank">
      <h3>NOTHING TO SHOW</h3>
  </div>
<?php endif; ?>
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
