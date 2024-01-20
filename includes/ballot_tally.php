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
$increment = 0;
?>
<?php foreach($querypost2 as $postChart): ?>
<?php 
    $i = 0;
    $candidate_pos = array();
    $candidate_vote_count = array();

    $candidate_nick_and_count = array();
    foreach($array_position as $cand_sort){
        if($postChart['Position']===$cand_sort){
            $candidate_nick_and_count[$array_nickname[$i]] = $array_vote_count[$i];
        }
        $i++;
    }
    arsort($candidate_nick_and_count);
    foreach($candidate_nick_and_count as $name => $value){
      array_push($candidate_pos, $name);
      array_push($candidate_vote_count, $value);
    }
?>
<div class="chart-container">
  <canvas id="myChart-<?php echo $increment;?>"></canvas>
</div>
<script>
  const ctx<?php echo $increment;?> = document.getElementById('myChart-<?php echo $increment;?>');

  var chartTable<?php echo $increment;?> = new Chart(ctx<?php echo $increment;?>, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($candidate_pos);?>,
      datasets: [{
        label: '<?php echo $postChart['Position'];?>',
        data: <?php echo json_encode($candidate_vote_count);?>,
        backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
        borderWidth: 1
      }]
    },
    options: {
        indexAxis: 'y',
      scales: {
        x: {
            
          ticks: {
            stepSize:1,
          }
        }
      }
    }
  });
</script>
<?php $increment++;?>
<?php endforeach; ?>
