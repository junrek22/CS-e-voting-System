<?php
include "db.php";
$array_nickname = array();
$array_vote_count = array();
$array_position = array();
$querypost = $conn->prepare("SELECT DISTINCT Position FROM candidate");
$querypost->execute();
// $queryCountValidVoters = $conn->prepare("SELECT COUNT(UserID) as validCount FROM voters WHERE Status = 'Valid'");
// $queryCountValidVoters->execute();
$numVal = $queryCountValidVoters->fetch(PDO::FETCH_ASSOC);
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
?>


<?php 
        $querypost2 = $conn->prepare("SELECT DISTINCT Position FROM candidate");
        $querypost2->execute();
    $increment = 0;
    ?>

<?php foreach($querypost2 as $postChart): ?>
<?php 
    $i = 0;
    $candidate_pos = array();
    $candidate_vote_count = array();
    foreach($array_position as $cand_sort){
        if($postChart['Position']===$cand_sort){
            array_push($candidate_pos, $array_nickname[$i]);
            array_push($candidate_vote_count, $array_vote_count[$i]);
        }
        $i++;
    }
?>
<div class="chart-container">
  <canvas id="myChart-<?php echo $increment;?>"></canvas>
</div>
<script>
  const ctx<?php echo $increment;?> = document.getElementById('myChart-<?php echo $increment;?>');

  new Chart(ctx<?php echo $increment;?>, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($candidate_pos);?>,
      datasets: [{
        label: '<?php echo $postChart['Position'];?>',
        data: <?php echo json_encode($candidate_vote_count);?>,
        borderWidth: 1
      }]
    },
    options: {
        indexAxis: 'y',
      scales: {
        x: {
            
          ticks: {
            
          }
        }
      }
    }
  });
</script>
<?php $increment++;?>
<?php endforeach; ?>
