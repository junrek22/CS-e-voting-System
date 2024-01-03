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
    <h3>VOTE TALLY</h3>
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
<div id="chart-content">
<?php include "../includes/ballot_tally.php";?>
</div>
<?php endif; ?>
<?php if($queryrow->rowCount() <= 0): ?>
  <div id="chart-blank">
      <h3>NOTHING TO SHOW</h3>
  </div>
<?php endif; ?>
<style>
    .nav-body{
        padding:15px;
        border:1px solid #092635;
    }.right-nav button{
        margin:0px 5px 0px 5px;
    }.dashboard-cards{
       display:flex;
       flex-wrap:wrap;
        margin:10px;
       
       justify-content:center;
        padding:10px;
        
    }.dashboard-cards > div{
      text-align:center;
       border:1px solid #092635;
        border-radius:10px;
       padding:5px 30px 0px 30px;
       background-color: #5C8374;
       margin:10px;
    }.dashboard-cards div > *{
      color:white;
    }
    .chart-container{
        height:70vh;
        margin-top:20px;
    }#chart-content {
        display:flex;
        align-items:center;
        flex-direction:column;
    } #title {
        text-align:center;
        margin:0;
    }.nav-body > * {
        text-align:center;
    }#chart-blank{
      height:calc(100vh - 10vh);
      display:grid;
      place-items:center;
    }#chart-blank h3{
      color:#B6C4B6;
    }
</style>