<?php 
if(!isset($_SESSION['user_type']) || $_SESSION['user_type']!="Admin"){
  header("location: ../index.php");
}
?>
<link rel="stylesheet" href="../css/position_crud.css">
<div class="nav-body">
<div class="left-group">
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#NewModal">
    New
  </button>
</div>
<div class="form-search-control">
    <input type="text" name="search" class="form-control" id="seachControl" placeholder="Search Something" required>
</div>
<h3>List of Positions</h3>
</div>
<?php 
include "db.php";
$queryrow = $conn->prepare("SELECT id FROM positions");
$queryrow->execute();
?>

<table class="table table-striped">
<thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Position</th>
      <th id="option" scope="col" >Options</th>
    </tr>
  </thead>
  <?php if($queryrow->rowCount() > 0):?>
  <tbody id="records">
    <?php 
      include "../includes/db.php";
      $query = $conn->prepare("SELECT * FROM positions ORDER BY id DESC");
      $query->execute();
      ?>
      <?php foreach($query as $rows): ?> 
        <tr>
        <th scope="row"><?php echo $rows['id']; ?></th>
        <td><?php echo $rows['position_name']; ?></td>
        <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#seeMoreModal-<?php echo $rows['id'];?>">See description</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $rows['id'];?>">Edit</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal-<?php echo $rows['id'];?>">Delete</button></td>
      </tr>

      <div class="modal fade" id="seeMoreModal-<?php echo $rows['id'];?>" tabindex="-1" aria-labelledby="seeMoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="seeMoreModalLabel">Description Platform</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body seeMoreBox">
              <?php echo $rows['description']; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
            </div> 
          </div>
        </div>
      </div>
      <!-- Edit Modal -->
      <div class="modal fade" id="editModal-<?php echo $rows['id'];?>" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="EditModalLabel">Edit position</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../includes/create_position.php" method="post">
                <div class="mb-3">
                  <label for="FormPosition" class="form-label">Position</label>
                  <input type="text" name="position" class="form-control" id="FormPosition" value="<?php echo $rows['position_name']; ?>" required>
                </div>
                <div class="mb-3">
                  <label for="TextAreaDescription" class="form-label">Description</label>
                  <textarea class="form-control" name="description" id="TextAreaDescription" rows="5" required><?php echo $rows['description'];?></textarea>
                </div>
                <label for="PasstoConfirm" class="form-label">Password</label>
                  <input type="password" id="PasstoConfirm" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" required>
                  <div id="passwordHelpBlock" class="form-text">
                    To proceed to edit this row, Enter the admin password.
                  </div>
                <div class="mb-3">
                  <input type="hidden" name="PositionID" class="form-control" value="<?php echo $rows['id']; ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit_edit_position" class="btn btn-success">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="DeleteModal-<?php echo $rows['id'];?>" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="DeleteModalLabel">Delete position</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../includes/create_position.php" method="post">
                  <div class="mb-3">
                    are you sure you wanna delete the position<?php echo ' "'.$rows['position_name'].'"?';?>
                  </div>
                  <div id="passwordHelpBlock" class="form-text">
                    To proceed to delete this row, enter the admin password.
                  </div>
                  <input type="password" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" placeholder="Password" required>
                  <input type="hidden" name="PositionID" class="form-control" value="<?php echo $rows['id']; ?>">
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit_delete_position" class="btn btn-danger">Delete</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
  </tbody>
  <?php endif; ?>
</table>
<?php if($queryrow->rowCount() <= 0):?>
  <div id="chart-blank">
      <h3>NO POSITION RECORDS</h3>
  </div>
  <style>
    #chart-blank{
      height:calc(80vh - 10vh);
      display:grid;
      place-items:center;
    }#chart-blank h3{
      color:#B6C4B6;
    }
  </style>
<?php endif; ?>

<!-- New Modal -->
<div class="modal fade" id="NewModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="CreateModalLabel">Create new position</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../includes/create_position.php" method="post">
          <div class="mb-3">
            <label for="FormPosition" class="form-label">Position</label>
            <input type="text" name="position" class="form-control" id="FormPosition" required>
          </div>
          <div class="mb-3">
            <label for="TextAreaDescription" class="form-label">Description</label>
            <textarea class="form-control" id="TextAreaDescription" rows="3" name="description" required></textarea>
          </div>
          <label for="PasstoConfirm" class="form-label">Password</label>
            <input type="password" id="PasstoConfirm" class="form-control"name="passwordConfirm" aria-describedby="passwordHelpBlock" required>
            <div id="passwordHelpBlock" class="form-text">
              To proceed to create a new position, enter the admin password.
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit_newPosition" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php if(isset($_SESSION['message']) && isset($_SESSION['control']) && isset($_SESSION['title'])): ?>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header <?php echo $_SESSION['control'];?>">
      <strong class="me-auto"><?php echo $_SESSION['title']; ?></strong>
      <small>Just now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
    <?php echo $_SESSION['message']; ?>
    </div>
  </div>
</div>
<?php unset($_SESSION['message']);unset($_SESSION['control']);unset($_SESSION['title']);?>
<?php endif; ?>
