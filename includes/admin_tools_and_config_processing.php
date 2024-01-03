<?php 
include "db.php";
session_start();
if(isset($_POST['submit_change_admin']) && $_SESSION['user_type']=="Admin"){
    $confPassword = $_POST['passwordConfirm'];
    $userAdmin = $_SESSION['user_type'];
    $queryPull = $conn->prepare("SELECT Password FROM login WHERE User_Type = '$userAdmin'");
    $queryPull->execute();
    $rawPassword = $queryPull->fetch(PDO::FETCH_ASSOC);
    $verify = password_verify($confPassword, $rawPassword['Password']);
    if($verify){
        $newAdminUser = $_POST['newUsername'];
        $newAdminPass = $_POST['NewPassword'];
        $hashPassword = password_hash($newAdminPass, PASSWORD_DEFAULT);
        $queryUpdate = $conn->prepare("UPDATE login SET Password = '$hashPassword', Username = '$newAdminUser' WHERE User_Type = '$userAdmin'");
        $queryUpdate->execute();
        if($queryUpdate){
            $_SESSION['message'] = "ADMIN CHANGE CREDENTIAL SUCCESFULLY";
            $_SESSION['title'] = "CHANGE CREDENTIAL SUCCESSFULLY";
            $_SESSION['control'] = "text-bg-success border-0";
            header("location: ../admin/dashboard.php");
        }else{
            $_SESSION['message'] = "Something Went Wrong";
            $_SESSION['title'] = "CHANGE CREDENTIAL FAILED";
            $_SESSION['control'] = "text-bg-danger border-0";
            header("location: ../admin/dashboard.php");
        }
    }else{
        $_SESSION['message'] = "INVALID PASSWORD";
        $_SESSION['title'] = "CHANGE CREDENTIAL FAILED";
        $_SESSION['control'] = "text-bg-danger border-0";
        header("location: ../admin/dashboard.php");
    }
}

else if(isset($_POST['submit_change_banner']) && $_SESSION['user_type']=="Admin"){
    $confPassword = $_POST['passwordConfirm'];
    $userAdmin = $_SESSION['user_type'];
    $queryPull = $conn->prepare("SELECT Password FROM login WHERE User_Type = '$userAdmin'");
    $queryPull->execute();
    $rawPassword = $queryPull->fetch(PDO::FETCH_ASSOC);
    $verify = password_verify($confPassword, $rawPassword['Password']);
    if($verify){
        $newBanner = $_POST['Banner'];
        $queryUpdate = $conn->prepare("UPDATE banner SET Banner_title = '$newBanner'");
        $queryUpdate->execute();
        if($queryUpdate){
            $_SESSION['message'] = "NEW BANNER CREATED";
            $_SESSION['title'] = "BANNER CREATED SUCCESSFULLY";
            $_SESSION['control'] = "text-bg-success border-0";
            header("location: ../admin/dashboard.php");
        }else{
            $_SESSION['message'] = "Something Went Wrong";
            $_SESSION['title'] = "BANNER CREATED FAILED";
            $_SESSION['control'] = "text-bg-danger border-0";
            header("location: ../admin/dashboard.php");
        }
    }else{
        $_SESSION['message'] = "INVALID PASSWORD";
        $_SESSION['title'] = "BANNER CREATED FAILED";
        $_SESSION['control'] = "text-bg-danger border-0";
        header("location: ../admin/dashboard.php");
    }
}else{
    header("location: ../index.php");
}
$_SESSION['function'] = "<script>
const toastLiveExample = document.getElementById('liveToast')
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
 toastBootstrap.show()
</script>";

?>