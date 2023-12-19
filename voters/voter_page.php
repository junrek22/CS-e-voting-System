<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <?php include "../css/bootstrap.php";?>
</head>
<style>
    *{
    padding:0;
    margin:0;
    }
    nav {
        background-color: #092635;
        height: 10vh;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-left: 15px;
    }h2{
        color:#9EC8B9;
    }.dropdown img{
        width:50px;
        height:50px;
        border-radius:360px;
    }
</style>
<body>
    <nav>
        <h2>E-VOTING SYSTEM</h2>

    </nav>
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
</body>
</html>