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
  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#NewModal">
    Delete all records
  </button>
</div>
<div class="form-search-control">
    <input type="text" name="search" class="form-control" id="seachControl" placeholder="Search Something" required>
</div>
<h3>List of Candidates</h3>
</div>
<table id="myTable" class="table table-striped">
<thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Profile Picture</th>
      <th scope="col">Candidate ID</th>
      <th scope="col">Nickname</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Position</th>
      <th id="option" scope="col" >Options</th>
    </tr>
  </thead>
  <tbody id="records">
    <?php 
      include "../includes/db.php";
      $query = $conn->prepare("SELECT * FROM candidate ORDER BY id DESC");
      $query->execute();
      
      ?>
      <?php foreach($query as $rows): ?> 
        <tr>
        <th scope="row"><?php echo $rows['id']; ?></th>
        <td><img src="<?php echo "../profile/".$rows['profile_pic']; ?>" alt=""></td>
        <th><?php echo $rows['candidate_id']; ?></th>
        <th><?php echo $rows['candidate_nickname']; ?></th>
        <td><?php echo $rows['candidate_first_name']; ?></td>
        <td><?php echo $rows['candidate_last_name']; ?></td>
        <td><?php echo $rows['Position']; ?></td>
        <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#seePlatformModal-<?php echo $rows['id'];?>">See Platform</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $rows['id'];?>">Edit</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal-<?php echo $rows['id'];?>">Delete</button></td>
      </tr>

      <div class="modal fade" id="seePlatformModal-<?php echo $rows['id'];?>" tabindex="-1" aria-labelledby="seePlatformModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="seePlatformModalLabel">Description Platform</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body seeMoreBox">
              <?php echo $rows['Platform']; ?>
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
              <h1 class="modal-title fs-5" id="EditModalLabel">Edit candidate</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../includes/create_candidates.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="FormPosition" class="form-label">Candidate First name</label>
                  <input type="text" name="cand_Edit_fname" class="form-control" id="FormPosition" value="<?php echo $rows['candidate_first_name']; ?>" required>
                </div>
                <div class="mb-3">
                  <label for="FormPosition" class="form-label">Candidate Last name</label>
                  <input type="text" name="cand_Edit_lname" class="form-control" id="FormPosition" value="<?php echo $rows['candidate_last_name']; ?>" required>
                </div>
                <div class="mb-3">
                  <label for="FormPosition" class="form-label">Candidate Nickname</label>
                  <input type="text" name="cand_Edit_nickname" class="form-control" id="FormPosition" value="<?php echo $rows['candidate_nickname']; ?>" required>
                </div>
                <div class="mb-3">
                <label for="FormCandPosition" class="form-label">Position</label>
                <select name="cand_Edit_position" class="form-select" aria-label="Default select example" id="FormCandPosition">
                    <?php 
                    $queryPosition = $conn->prepare("SELECT position_name FROM positions");
                    $queryPosition->execute();
                    foreach($queryPosition as $getposition){
                      if($getposition['position_name']===$rows['Position']){
                        echo '<option selected value="'.$getposition['position_name'].'">'.$getposition['position_name'].'</option>';
                      }else{
                        echo '<option value="'.$getposition['position_name'].'">'.$getposition['position_name'].'</option>';
                      }
                    }
                    ?>
                </select>
                </div>
                <div class="mb-3">
                    <label for="Profile" class="form-label">Profile Picture</label>
                    <input class="form-control" type="file" name="cand_Edit_profile" id="Profile">
                </div>
                <div class="mb-3">
                  <label for="PlatformDescription" class="form-label">Platform</label>
                  <textarea class="form-control" name="platformEdit" id="PlatformDescription" rows="5" required><?php echo $rows['Platform'];?></textarea>
                </div>
                <label for="PasstoConfirm" class="form-label">Password</label>
                  <input type="password" id="PasstoConfirm" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" required>
                  <div id="passwordHelpBlock" class="form-text">
                    To proceed to edit this row, Enter the admin password.
                  </div>
                <div class="mb-3">
                  <input type="hidden" name="candidate_Id" class="form-control" value="<?php echo $rows['id']; ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit_edit_candidate" class="btn btn-primary">Edit</button>
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
              <h1 class="modal-title fs-5" id="DeleteModalLabel">Delete candidate</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../includes/create_candidates.php" method="post">
                  <div class="mb-3">
                    are you sure you wanna delete the Candidate
                    <p><b><?php echo ' "'.$rows['candidate_first_name']." ".$rows['candidate_last_name'].'"?';?></b></p>
                  </div>
                  <div id="passwordHelpBlock" class="form-text">
                    To proceed to delete this row, enter the admin password.
                  </div>
                  <input type="password" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" placeholder="Password" required>
                  <input type="hidden" name="CandidateID" class="form-control" value="<?php echo $rows['id']; ?>">
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
</table>


<!-- New Modal -->
<div class="modal fade" id="NewModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="CreateModalLabel">Create new candidate</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../includes/create_candidates.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="FormCandFname" class="form-label">Candidate First name</label>
                <input type="text" name="cand_fname" class="form-control" id="FormCandFname" required>
            </div>
            <div class="mb-3">
                <label for="FormCandLname" class="form-label">Candidate Last name</label>
                <input type="text" name="cand_lname" class="form-control" id="FormCandLname" required>
            </div>
            <div class="mb-3">
                <label for="FormCandNickname" class="form-label">Candidate Nickname</label>
                <input type="text" name="cand_nickname" class="form-control" id="FormCandNickname" required>
            </div>
            <div class="mb-3">
                <label for="FormCandPosition" class="form-label">Position</label>
                <select name="cand_position" class="form-select" id="FormCandPosition" aria-label="Default select example" required>
                    <option value="invalid" selected>Select Position</option>
                    <?php
                      $queryPositioncreate = $conn->prepare("SELECT position_name FROM positions");
                      $queryPositioncreate->execute(); 
                    foreach($queryPositioncreate as $positioncreate): ?>
                    <option value="<?php echo $positioncreate['position_name'];?>"><?php echo $positioncreate['position_name'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="Profile" class="form-label">Profile Picture</label>
                <input class="form-control" type="file" name="cand_profile" id="Profile">
            </div>
            <div class="mb-3">
                <label for="TextareaPlatform" class="form-label">Platform</label>
                <textarea class="form-control" name="platform" id="TextareaPlatform" rows="5" required></textarea>
            </div>
            <label for="PasstoConfirm" class="form-label">Password</label>
                <input type="password" id="PasstoConfirm" class="form-control" name="passwordConfirm" aria-describedby="passwordHelpBlock" required>
                <div id="passwordHelpBlock" class="form-text">
                To proceed to edit this row, Enter the admin password.
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit_create_candidate" class="btn btn-success preventEventCreate">Save changes</button>
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
