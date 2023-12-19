<?php 
include "db.php";
if(isset($_POST['res_accept'])){
    $req_id = $_POST['res_accept'];
    $queryPull = $conn->prepare("UPDATE voters SET Status = 'Valid' WHERE id = '$req_id'");
    $queryPull->execute();
}
if(isset($_POST['res_decline'])){
    $req_id = $_POST['res_decline'];
    $queryPull = $conn->prepare("UPDATE voters SET Status = 'Invalid' WHERE id = '$req_id'");
    $queryPull->execute();
}
?>