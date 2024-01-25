<link rel="stylesheet" href="../css/vote_tally_body.css">
<?php 
include "db.php";
if(!isset($_SESSION['user_type']) || $_SESSION['user_type']!="Admin"){
  header("location: ../index.php");
}else{
  $candPostCount = array();
  $queryrow = $conn->prepare("SELECT DISTINCT Position FROM candidate");
  $queryrow->execute();

  $queryBanner = $conn->prepare("SELECT * FROM banner");
  $queryBanner->execute();
  $banner = $queryBanner->fetch(PDO::FETCH_ASSOC);

  $queryPosCand = $conn->prepare("SELECT COUNT(candidate_id) as num_cand FROM candidate WHERE Position = :position");
}
?>
<?php if($queryrow->rowCount() > 0): ?>
<div class="nav-body">
    <h3>TURNING RESULT</h3>
    <p id="banner_header">
    <?php echo strtoupper($banner['Banner_title']);?>
</p>
</div>
<div class="dashboard-cards">
    <?php foreach($queryrow as $queryPos): ?>
    <?php 
        $queryPosCand->bindParam(":position", $queryPos['Position'], PDO::PARAM_STR);
        $queryPosCand->execute();
        $numCands = $queryPosCand->fetch(PDO::FETCH_ASSOC);
    ?>
    <div>
        <h1><?php echo $numCands['num_cand'];?></h1>
        <p>Number of <?php echo $queryPos['Position'];?> Candidates</p>
    </div>
    <?php endforeach;?>
</div>
<div class="turning-content">
  <div class="turning-container">
    <h2 class="title">Top 10 Elected President</h2>
    <div class="turning-padding">
      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>

      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>

      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>

      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>

      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="turning-container">
    <h2 class="title">Top 10 Elected President</h2>
    <div class="turning-padding">
      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>

      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>

      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>

      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>

      <div class="candidate_card">
        <h4>Top 1</h4>
        <p>167 VOTES</p>
        <img src="admin.jpg" alt="">
        <div class="cand_name">
          <p><b>NATHANIEL ANGELO OLVIDO GENTUGAO</b></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php if($queryrow->rowCount() <= 0): ?>
  <div id="chart-blank">
      <h3>NOTHING TO SHOW</h3>
  </div>
<?php endif; ?>
