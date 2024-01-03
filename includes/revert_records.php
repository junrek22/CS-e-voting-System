<?php 
include "db.php";
session_start();
if(isset($_POST['revert_submit'])){
    $confirmPassword = $_POST['passwordConfirm'];
    $queryPull = $conn->prepare("SELECT Password FROM login WHERE User_Type = 'Admin'");
    $queryPull->execute();
    $rawPassword = $queryPull->fetch(PDO::FETCH_ASSOC);
    $verify = password_verify($confirmPassword,$rawPassword['Password']);
    if($verify){
        $queryReset = $conn->prepare("UPDATE voters SET vote_stat = 'NOTVOTED' WHERE Status = 'Valid'");
        $queryReset->execute();
        $queryerase = $conn->prepare("TRUNCATE TABLE voters_ballot");
        $queryerase->execute();
        $querydelete = $conn->prepare("DELETE FROM voters WHERE Status = 'Invalid'");
        $querydelete->execute();
        if($queryReset){
            $_SESSION['message'] = "Vote resets succesfully";
            $_SESSION['title'] = "RESETS SUCCESSFULLY";
            $_SESSION['control'] = "text-bg-success border-0";
        }else{
            $_SESSION['message'] = "Something went wrong";
            $_SESSION['title'] = "RESETS FAILED";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
    }else{
        $_SESSION['message'] = "Vote resets failed";
        $_SESSION['title'] = "PASSWORD INVALID";
        $_SESSION['control'] = "text-bg-danger border-0";
    }
    header("location: ../admin/voters.php");
}
else if(isset($_POST['submit_delete_records'])){
    $confirmPassword = $_POST['passwordConfirm'];
    $queryPull = $conn->prepare("SELECT Password FROM login WHERE User_Type = 'Admin'");
    $queryPull->execute();
    $rawPassword = $queryPull->fetch(PDO::FETCH_ASSOC);
    $verify = password_verify($confirmPassword,$rawPassword['Password']);
    if($verify){
        $querydeleteRecords = $conn->prepare("TRUNCATE TABLE candidate");
        $querydeleteRecords->execute();
        if($querydeleteRecords){
            $_SESSION['message'] = "Delete all candidates succesfully";
            $_SESSION['title'] = "ALL RECORDS DELETED";
            $_SESSION['control'] = "text-bg-success border-0";
        }else{
            $_SESSION['message'] = "Something went wrong";
            $_SESSION['title'] = "FAILED TO DELETE ALL RECORDS";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
    }else{
        $_SESSION['message'] = "Failed to delete all records";
        $_SESSION['title'] = "PASSWORD INVALID";
        $_SESSION['control'] = "text-bg-danger border-0";
    }
    header("location: ../admin/candidates.php");
}

else if(isset($_POST['submit_recover'])){
    $confirmPassword = $_POST['passwordConfirm'];
    $queryPull = $conn->prepare("SELECT Password FROM login WHERE User_Type = 'Admin'");
    $queryPull->execute();
    $rawPassword = $queryPull->fetch(PDO::FETCH_ASSOC);
    $verify = password_verify($confirmPassword,$rawPassword['Password']);
    if($verify){
        $userID = $_POST['UserID'];
        $passRecov = password_hash("1234", PASSWORD_DEFAULT);
        $queryPassrecov = $conn->prepare("UPDATE login SET Password = '$passRecov' WHERE Username = '$userID'");
        $queryValidChange = $conn->prepare("UPDATE voters SET acc_stat = 'New' WHERE UserID = '$userID'");
        $queryValidChange->execute();
        $queryPassrecov->execute();
        if($queryPassrecov){
            $_SESSION['message'] = "Voter's account recovered";
            $_SESSION['title'] = "PASSWORD RECOVERED";
            $_SESSION['control'] = "text-bg-success border-0";
        }else{
            $_SESSION['message'] = "Something went wrong";
            $_SESSION['title'] = "FAILED TO DELETE ALL RECORDS";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
    }else{
        $_SESSION['message'] = "Failed to password recover";
        $_SESSION['title'] = "PASSWORD INVALID";
        $_SESSION['control'] = "text-bg-danger border-0";
    }
    header("location: ../admin/voters.php");
}else {
    header("location: ../admin/voters.php");
}
$_SESSION['function'] = "<script>
const toastLiveExample = document.getElementById('liveToast')
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
 toastBootstrap.show()
</script>";

?>