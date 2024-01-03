<?php 
session_start();
include "db.php";
if(isset($_SESSION['voter_user_id']) && isset($_POST['vote_submit'])){
    $voter = $_SESSION['voter_user_id'];
    $queryQueue = $conn->prepare("SELECT id FROM positions");
    $queryQueue->execute();
    $listcandidate = array();
    foreach($queryQueue as $posQueue){
        $candidate = "candidate-".$posQueue['id'];
        if(isset($_POST[$candidate])){
            array_push($listcandidate, $_POST[$candidate]);
        }
    }
    $stmt = $conn->prepare("INSERT INTO voters_ballot (user_voter, candidate_id, position, platform) VALUES (:uservote,:candidate_id,:position,:platform)");
    $cand_stmt = $conn->prepare("SELECT Position, Platform FROM candidate WHERE candidate_id = :cand_id");



    foreach($listcandidate as $lists){
        $cand_stmt->bindParam(":cand_id", $lists, PDO::PARAM_STR);
        $cand_stmt->execute();
        $pos_plat = $cand_stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->bindParam(':uservote', $voter);
        $stmt->bindParam(':candidate_id', $lists);
        $stmt->bindParam(':position', $pos_plat['Position']);
        $stmt->bindParam(':platform', $pos_plat['Platform']);
        $stmt->execute();
    }

    $updateVote = $conn->prepare("UPDATE voters SET vote_stat = 'VOTED' WHERE UserID = '$voter'");
    $updateVote->execute();

    $_SESSION['header-title'] = "DONE VOTED";
    $_SESSION['header-h3'] = "YOU ARE DONE VOTED!";

    $_SESSION['already-voter'] = "VOTED";
    
    header("location: ../voters/voter_done_voting.php");
}else{
    header("location: ../voters/voter_page.php");
}

?>