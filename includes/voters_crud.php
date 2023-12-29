<?php 
    if(!isset($_SESSION['user_type']) || $_SESSION['user_type']!="Admin"){
      header("location: ../index.php");
    }
?>
<link rel="stylesheet" href="../css/voters_crud.css">
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
<h3>List of Voters</h3>
</div>
<table class="table table-striped">
<thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Picture Profile</th>
      <th scope="col">User ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Precinct #</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody id="records">
  <?php 
    include "../includes/db.php";
    $query = $conn->prepare("SELECT * FROM voters WHERE Status = 'Valid' ORDER BY id DESC");
    $query->execute();
    ?>
    <?php foreach($query as $rows): ?> 
      <tr>
      <th scope="row"><?php echo $rows['id']; ?></th>
      <td><img src="<?php echo "../profile/".$rows['Profile_pic']; ?>" alt=""></td>
      <td><b><?php echo $rows['UserID']; ?></b></td>
      <td><?php echo $rows['Firstname']; ?></td>
      <td><?php echo $rows['Lastname']; ?></td>
      <td><?php echo $rows['Precinct']; ?></td>
      <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $rows['id'];?>">Edit</button>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal-<?php echo $rows['id'];?>">Delete</button></td>
    </tr>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal-<?php echo $rows['id'];?>" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="EditModalLabel">Edit voter's account</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="../includes/create_vote.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="FormFirstname" class="form-label">First name</label>
                <input type="text" name="firstname" class="form-control" id="FormFirstname" placeholder="Ex. John"  value="<?php echo $rows['Firstname']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="FormLastname" class="form-label">Last Name</label>
                <input type="text" name="lastname" class="form-control" id="FormLastname" placeholder="Ex. Doe"  value="<?php echo $rows['Lastname']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="Profile" class="form-label">Profile Picture</label>
                <input class="form-control" type="file" name="profile" id="Profile">
              </div>
              <div class="mb-3">
                <input type="hidden" name="UserID" class="form-control" value="<?php echo $rows['UserID']; ?>">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit_edit" class="btn btn-success">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModal-<?php echo $rows['id'];?>" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="DeleteModalLabel">Voter's account delete?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you wanna delete <?php echo " ".$rows['Firstname']." ".$rows['Lastname'];?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="../includes/create_vote.php?U_ID=<?php echo $rows['UserID'];?>" type="button" class="btn btn-danger">Delete</a>
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
        <h1 class="modal-title fs-5" id="CreateModalLabel">Create new voter</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../includes/create_vote.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="FormFirstname" class="form-label">First name</label>
            <input type="text" name="firstname" class="form-control" id="FormFirstname" placeholder="Ex. John" required>
          </div>
          <div class="mb-3">
            <label for="FormLastname" class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="FormLastname" placeholder="Ex. Doe" required>
          </div>
          <div class="mb-3">
            <label for="Profile" class="form-label">Profile Picture</label>
            <input class="form-control" type="file" name="profile" id="Profile">
          </div>
          <br>
          <hr>
          <div class="mb-3">
            <label for="FormPassword" class="form-label">Password</label>
            <input class="form-control" id="FormPassword" type="text" value="Default: 1234" aria-label="Disabled input example" disabled readonly>
          </div>
          <div class="mb-3">
            <label for="FormPassword" class="form-label">Precinct</label>
            <input class="form-control" id="FormPassword" type="text" value="Random" aria-label="Disabled input example" disabled readonly>
          </div>
          <div class="mb-3">
            <label for="FormUserID" class="form-label">User ID</label>
            <input class="form-control" id="FormUserID" type="text" value="Random" aria-label="Disabled input example" disabled readonly>
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit_account_vote" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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