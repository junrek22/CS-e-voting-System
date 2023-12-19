<?php 
session_start();
include "db.php";
if(isset($_POST['submit_newPosition']) && $_SESSION['user_admin'] == "Admin"){
    $position = ucfirst($_POST['position']);
    $description = ucfirst($_POST['description']);
    $passwordConfirm = $_POST['passwordConfirm'];
    $usernameQuery = $_SESSION['user_admin'];
    $queryPullPassword = $conn->prepare("SELECT Password FROM login WHERE User_Type = '$usernameQuery'");
    $queryPullPassword->execute();
    $rawPassword = $queryPullPassword->fetch(PDO::FETCH_ASSOC);
    $verify = password_verify($passwordConfirm, $rawPassword['Password']);
    if($verify){
        $queryPosition = $conn->prepare("INSERT INTO positions (position_name, description) VALUES ('$position','$description')");
        $queryPosition->execute();
        if($queryPosition){
            $_SESSION['message'] = "New Position Created Successfully";
            $_SESSION['title'] = "CREATED SUCCESSFULLY";
            $_SESSION['control'] = "text-bg-success border-0";
            header("location: ../admin/positions.php");
        }else{
            $_SESSION['message'] = "New Position Created Failed";
            $_SESSION['title'] = "CREATED POSITION FAILED";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
    }else{
        $_SESSION['message'] = "CREATED NEW POSITION DENIED";
        $_SESSION['title'] = "CREATED POSITION FAILED";
        $_SESSION['control'] = "text-bg-danger border-0";
          header("location: ../admin/positions.php");
    }
}
echo (isset($_POST['submit_edit_position']) && $_SESSION['user_admin'] == "Admin");
if(isset($_POST['submit_edit_position']) && $_SESSION['user_admin'] == "Admin"){
    $position = ucfirst($_POST['position']);
    $description = ucfirst($_POST['description']);
    $passwordConfirm = $_POST['passwordConfirm'];
    $usernameQuery = $_SESSION['user_admin'];
    $positionID = $_POST['PositionID'];
    $queryPullPassword = $conn->prepare("SELECT Password FROM login WHERE User_Type = '$usernameQuery'");
    $queryPullPassword->execute();
    $rawPassword = $queryPullPassword->fetch(PDO::FETCH_ASSOC);
    $verify = password_verify($passwordConfirm, $rawPassword['Password']);
    if($verify){
        $queryPosition = $conn->prepare("UPDATE positions SET position_name = '$position', description = '$description' WHERE id = '$positionID'");
        $queryPosition->execute();
        if($queryPosition){
            $_SESSION['message'] = "New Position Edited Successfully";
            $_SESSION['title'] = "EDITED SUCCESSFULLY";
            $_SESSION['control'] = "text-bg-primary border-0";
            header("location: ../admin/positions.php");
        }else{
            $_SESSION['message'] = "New Position Edited Failed";
            $_SESSION['title'] = "EDITED POSITION FAILED";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
    }else{
        $_SESSION['message'] = "position editing has been denied";
        $_SESSION['title'] = "EDITED POSITION DENIED";
        $_SESSION['control'] = "text-bg-danger border-0";
        //   header("location: ../admin/positions.php");
    }
}

if(isset($_POST['submit_delete_position']) && $_SESSION['user_admin'] == "Admin" ){
    $positionID = $_POST['PositionID'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $usernameQuery = $_SESSION['user_admin'];
    $queryPullPassword = $conn->prepare("SELECT Password FROM login WHERE User_Type = '$usernameQuery'");
    $queryPullPassword->execute();
    $rawPassword = $queryPullPassword->fetch(PDO::FETCH_ASSOC);
    $verify = password_verify($passwordConfirm, $rawPassword['Password']);
    echo $verify;
    if($verify){
        $queryDelete = $conn->prepare("DELETE FROM positions WHERE id = '$positionID'");
        $queryDelete->execute();
        if($queryDelete){
            $_SESSION['message'] = "New Position delete successfully";
            $_SESSION['title'] = "DELETED SUCCESSFULLY";
            $_SESSION['control'] = "text-bg-success border-0";
            header("location: ../admin/positions.php");
        }else{
            $_SESSION['message'] = "Something Went Wrong";
            $_SESSION['title'] = "DELETED POSITION FAILED";
            $_SESSION['control'] = "text-bg-danger border-0";
            header("location: ../admin/positions.php");
        }
        
    }else{
        $_SESSION['message'] = "New position to delete failed";
        $_SESSION['title'] = "DELETED POSITION FAILED";
        $_SESSION['control'] = "text-bg-danger border-0";
        header("location: ../admin/positions.php");
    }
}
$_SESSION['function'] = "<script>
const toastLiveExample = document.getElementById('liveToast')
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
 toastBootstrap.show()
</script>";
?>