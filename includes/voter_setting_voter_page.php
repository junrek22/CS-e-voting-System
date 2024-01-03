<?php 
include "db.php";
session_start();
if(isset($_POST['submit_change_pass'])){
    $ConfirmPassword = $_POST['passwordConfirm'];
    $voter_id = $_SESSION['voter_user_id'];
    $queryPull = $conn->prepare("SELECT Password FROM login WHERE Username = '$voter_id'");
    $queryPull->execute();
    $rawPassword = $queryPull->fetch(PDO::FETCH_ASSOC);
    $verify = password_verify($ConfirmPassword, $rawPassword['Password']);
    if($verify){
        $newPassword = $_POST['NewPassword'];
        $hasPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $queryPassUpdate = $conn->prepare("UPDATE login SET Password = '$hasPassword' WHERE Username = '$voter_id'");
        $queryPassUpdate->execute();
        if($queryPassUpdate){
            $_SESSION['message'] = "Password has been changed succesfully";
            $_SESSION['title'] = "VOTER PASSWORD CHANGE SUCCESFULLY";
            $_SESSION['control'] = "text-bg-success border-0";
        }else{
            $_SESSION['message'] = "Something Went Wrong";
            $_SESSION['title'] = "VOTER PASSWORD CHANGE FAILED";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
    }else{
        $_SESSION['message'] = "Invalid Password";
        $_SESSION['title'] = "VOTER PASSWORD CHANGE FAILED";
        $_SESSION['control'] = "text-bg-danger border-0";
    }
    $_SESSION['function'] = "<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
     toastBootstrap.show()
    </script>";
    header("location: ../voters/voter_page.php");
}

else if(isset($_POST['submit_change_account'])){
    $NewFirstname = ucfirst($_POST['EditFirstname']);
    $NewLastname = ucfirst($_POST['EditLastname']);
    $voter_id = $_SESSION['voter_user_id'];
    if(!empty($_FILES['changeProfile']['name'])){
        $voter_profile_name = $_FILES['changeProfile']['name'];
        $voter_profile_tmp = $_FILES['changeProfile']['tmp_name'];
        $explodeProfile = explode(".",$voter_profile_name);
        $profileType = strtolower(end($explodeProfile));
        $allowedType = array("jpg", "png", "jpeg");
        if(in_array($profileType, $allowedType)){
            $profileName = "profile-voter-".$voter_id.".".$profileType;
            $queryvoterUpdate = $conn->prepare("UPDATE voters SET Profile_pic = '$profileName',
            Firstname = '$NewFirstname', Lastname = '$NewLastname' WHERE UserID = '$voter_id'");
            $queryvoterUpdate->execute();
            move_uploaded_file($voter_profile_tmp, "../profile/".$profileName);
            $_SESSION['message'] = "Voter account has been changed";
            $_SESSION['title'] = "VOTER ACCOUNT CHANGED SUCCESFULLY";
            $_SESSION['control'] = "text-bg-success border-0";
        }else{
            $_SESSION['message'] = "Invalid Profile Image Type";
            $_SESSION['title'] = "PROFILE INVALID";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
    }else{
        $queryvoterUpdate = $conn->prepare("UPDATE voters SET Firstname = '$NewFirstname', Lastname = '$NewLastname' WHERE UserID = '$voter_id'");
        $queryvoterUpdate->execute();
        $_SESSION['message'] = "Voter account has been changed";
        $_SESSION['title'] = "VOTER ACCOUNT CHANGED SUCCESFULLY";
        $_SESSION['control'] = "text-bg-success border-0";
    }
    $_SESSION['function'] = "<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastBootstrap.show()
    </script>";
    header("location: ../voters/voter_page.php");
}else {
    header("location: ../voters/voter_page.php");
}

?>