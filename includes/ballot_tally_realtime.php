<?php
include "db.php";
$array_nickname = array();
$array_vote_count = array();
$array_position = array();
$querypost = $conn->prepare("SELECT DISTINCT Position FROM candidate");
$querypost->execute();
$queryCand = $conn->prepare("SELECT candidate_id FROM candidate WHERE position = :cand_position");
$queryCount = $conn->prepare("SELECT candidate.candidate_nickname as nickname, COUNT(voters_ballot.user_voter) as count, candidate.Position as position FROM candidate 
LEFT JOIN voters_ballot ON candidate.candidate_id = voters_ballot.candidate_id WHERE candidate.candidate_id = :cand_id");
foreach($querypost as $pos){
    $queryCand->bindParam(":cand_position", $pos['Position'], PDO::PARAM_STR);
    $queryCand->execute();
    foreach($queryCand as $cand_id){
        $queryCount->bindParam(":cand_id", $cand_id['candidate_id'], PDO::PARAM_STR);
        $queryCount->execute();
        $rowRecord = $queryCount->fetch(PDO::FETCH_ASSOC);
        array_push($array_nickname, $rowRecord['nickname']);
        array_push($array_vote_count, $rowRecord['count']);
        array_push($array_position, $rowRecord['position']);
    }
}
$querypost2 = $conn->prepare("SELECT DISTINCT Position FROM candidate");
$querypost2->execute();
$json = array();
foreach($querypost2 as $postChart) {
  $i = 0;
  $position = 0;
  $candidate_nick_and_count = array();
  foreach($array_position as $cand_sort){
      if($postChart['Position']===$cand_sort){
          $candidate_nick_and_count[$postChart['Position']][$position]["name"] = $array_nickname[$i];
          $candidate_nick_and_count[$postChart['Position']][$position]["vote_count"] = $array_vote_count[$i];
          $position++;
      }
      $i++;
  }
  array_push($json, $candidate_nick_and_count);
}
echo json_encode($json);

?>

