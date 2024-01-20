<?php 
include "db.php";
$queryrow = $conn->prepare("SELECT DISTINCT Position FROM candidate");
$queryrow->execute();

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

$json_array = array();
array_push($json_array, $votertypeNum[0]);
array_push($json_array, $votertypeNum[1]);
array_push($json_array, $votedNum[0]);
array_push($json_array, $votedNum[1]);
array_push($json_array, $votertypeNum[2]);
array_push($json_array, $numCand['candidate_num']);

echo json_encode($json_array);
?>