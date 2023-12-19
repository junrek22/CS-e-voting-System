<?php include "css/bootstrap.php"; session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify your account</title>
</head>
<link rel="stylesheet" href="css/voter_verification.css">
<body>
<nav>
    <h2>E-VOTING SYSTEM</h2>
</nav>
<div class="container-body">
    <div class="center-container">
        <h3><?php if(isset($_SESSION['verif-header'])){echo $_SESSION['verif-header'];}?></h3>
        <hr>
        <div class="body-text">
            <?php if(isset($_SESSION['verif-body-text'])){echo $_SESSION['verif-body-text'];}?>
            <a href="logout.php"type="button" class="btn btn-primary" > Logout
</a>
        </div>
    </div>
</div>
</body>
</html>