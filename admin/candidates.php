<?php include "../css/bootstrap.php";
session_start();
if(!isset($_SESSION['user_type']) && $_SESSION['user_type']!="Admin"){
    header("location: ../index.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates</title>
</head>
<link rel="stylesheet" href="../css/default-style.css">
<?php include "../plugins/search-control.php";?>
<body>
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
    </div>
    <div class="bodypage">
       <?php include "../includes/candidates_crud.php";?>
    </div>
    <?php
if(isset($_SESSION['function'])){
    echo $_SESSION['function'];
    unset($_SESSION['function']);
}?>
</body>
</html>
