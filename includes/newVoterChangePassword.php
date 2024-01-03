<?php 
include "db.php";
session_start();
if(isset($_POST['submit_changePass'])){
    $newPass = $_POST['newPassword'];
    $confirmPass = $_POST['confirmNewPassword'];
    if($newPass==$confirmPass){
        $voter_id = $_SESSION['voter_user_id'];
        $hashpassword = password_hash($newPass, PASSWORD_DEFAULT);
        $queryChangePass = $conn->prepare("UPDATE login SET Password = '$hashpassword' WHERE Username = '$voter_id'");
        $queryChangePass->execute();
        $queryStats = $conn->prepare("UPDATE voters SET acc_stat = 'Old' WHERE UserID = '$voter_id'");
        $queryStats->execute();
        $_SESSION['changePassSuccess'] = "<div class='alert alert-success' role='alert'>
            YOUR PASSWORD HAS BEEN CHANGED SUCCESSFULLY
           </div>";
           $_SESSION['acc_stats'] = "New";
        header("Location: ../voters/voter_page.php");
       
    }else{
        $_SESSION['message-wrong-password'] = "<div class='alert alert-danger' role='alert'>
        YOUR PASSWORD DOES NOT MATCH
           </div>";
        header("location: ../voters/create_new_password.php");
    }
}
else{
    header("location: ../index.php");
}


?>