<?php include "../css/bootstrap.php";
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Box</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/default-style.css"/>
<?php include "../plugins/search-control.php";?>
<body onload="load()">
<script type="text/javascript">
    //  function load(){
    //     const xhttp = new XMLHttpRequest();
    //     xhttp.onload = function(){
    //         document.getElementById("records").innerHTML = this.responseText;
    //     }
    //     xhttp.open("GET", "../includes/verification_json.php");
    //     xhttp.send();
    //     }
    //     setInterval(function(){
    //       load();
    //     },1000);
     $(document).ready(function(){
        <?php 
            include "../includes/db.php";
            $queryEvent = $conn->prepare("SELECT id FROM voters WHERE Status = 'Pending' ORDER BY id DESC");
            $queryEvent->execute();
        ?>
         <?php foreach($queryEvent as $queryAjax): ?>
            $("#accept-<?php echo $queryAjax['id'];?>").click(function(){
                var requestID = <?php echo $queryAjax['id'];?>;
                $.post("../includes/send_response.php",{ res_accept : requestID},
                function(data, status){
                    $("#onChange-<?php echo $queryAjax['id']; ?>").html("<button type='button' class='btn btn-success' disabled>Accepted</button>");

                });
            });
            $("#decline-<?php echo $queryAjax['id'];?>").click(function(){
                var requestID = <?php echo $queryAjax['id'];?>;
                $.post("../includes/send_response.php",{ res_decline : requestID},
                function(data, status){
                    $("#onChange-<?php echo $queryAjax['id']; ?>").html("<button type='button' class='btn btn-secondary' disabled>Declined</button>");

                });
            });
        <?php endforeach; ?>
     });
</script>
    <nav>
        <h2>E-VOTING SYSTEM</h2>
    </nav>
    <div class="side-bar">
        <div class="image-container"><img src="admin-profile.png" alt=""></div>
        <h4>Admin</h4>
        <hr>
        <ul>
            <a href="dashboard.php">
                <li>Dashboard</li>
            </a><a href="voters.php">
                <li>Voters</li>
            </a><a href="candidates.php">
                <li>Candidates</li>
            </a><a href="positions.php">
                <li>Positions</li>
            </a><a href="request.php">
                <li>Request box</li>
            </a><a href="ballot.php">
                <li>Ballot Tally</li>
            </a><a href="../logout.php">
                <li>Logout</li>
            </a>
        </ul>
    </div><div class="bodypage">
    <?php include "../includes/request_crud.php";?>
    </div>
    <?php
if(isset($_SESSION['function'])){
    echo $_SESSION['function'];
    unset($_SESSION['function']);
}?>
</body>
</html>

