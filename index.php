<?php include "css/bootstrap.php";  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<link rel="stylesheet" href="css/nav-bar.css">
<body>
    <?php include "includes/nav-bar-homepage.php"; ?>
    <?php session_start();
    if(isset($_SESSION['message-error'])){
      echo $_SESSION['message-error'];
      unset($_SESSION['message-error']);
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="chart-container" style="position: relative; height:100vh;">
  <canvas id="myChart"></canvas>
</div>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [8, 13, 2, 16, 19, 14],
        borderWidth: 1
      }]
    },
    options: {
        indexAxis: 'y',
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


</body>
</html>



<!-- Login Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="includes/login.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User ID</label>
                <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Ex. 19-0947-316" required>
            </div>
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" required >
            <div id="passwordHelpBlock" class="form-text"><a href="http://">Forgot Password</a></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit_log" class="btn btn-primary">Login</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Sign-up Modal -->
<div class="modal fade" id="sign-up-modal" tabindex="-1" aria-labelledby="sign-up-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sign up here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="includes/sign_up.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" id="exampleFormControlInput1" placeholder="Ex. John" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname" id="exampleFormControlInput1" placeholder="Ex. Titor" required>
            </div>
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5 "name="password"  class="form-control" aria-describedby="passwordHelpBlock" required>
            <label for="inputPassword5" class="form-label">Confirm Password</label>
            <input type="password" id="inputPassword5" name="confirmpassword" class="form-control" aria-describedby="passwordHelpBlock" required>
            <div class="mb-3">
                <label for="Profile" class="form-label">Profile Picture</label>
                <input class="form-control" type="file" name="profile" id="Profile">
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit_register" class="btn btn-primary">Sign up</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>