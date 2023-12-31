<?php 
if(!isset($_SESSION['user_type']) || $_SESSION['user_type']!="Admin"){
  header("location: ../index.php");
}
?>
<style>
    .nav-body{
        padding:10px 10px 10px 20px;
        background-color: #A8DF8E;
        color:#092635;
    }
    .alert{
        margin:0;
    }td img {
    width:50px;
    height:50px;
    border-radius:360px;
}
td, th{
  text-align:center;
}
#option{
  text-align:center;
}.req-nav{
  display:flex;
  width:90%;
  justify-content:space-between;
}.req-nav .form-search-control{
  width:50%;
}
</style>

<div class="nav-body">
  <div class="req-nav">
    <h3>REQUEST BOX</h3>
    <div class="form-search-control">
        <input type="text" name="search" class="form-control" id="seachControl" placeholder="Search Something" required>
    </div>
  </div>
  <p>In this section, these are pending request to verified their voters account.</p>
</div>
<table class="table table-striped">
<thead class="table-dark">
    <tr>
      <th scope="col">Profile</th>
      <th scope="col">User ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th id="option" scope="col" >Options</th>
    </tr>
  </thead>
  <?php 
include "db.php";
// $queryrow = $conn->prepare("SELECT Position FROM candidate");
$queryrow = $conn->prepare("SELECT id FROM voters WHERE Status ='Pending'");
$queryrow->execute();
?>
<?php if($queryrow->rowCount() > 0):?>
  <tbody id="records">
    <?php include "../includes/verification_json.php";?>
  </tbody>
  <?php endif;?>
</table>
<?php if($queryrow->rowCount() <= 0):?>
  <div id="chart-blank">
      <h3>NO POSITION RECORDS</h3>
  </div>
  <style>
    #chart-blank{
      height:calc(78vh - 10vh);
      display:grid;
      place-items:center;
    }#chart-blank h3{
      color:#B6C4B6;
    }
  </style>
  <?php endif;?>