<?php 
session_start();
include "db.php";
if(isset($_POST['submit_register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];
    $profile_pic_name = (!empty(($_FILES['profile']['name']))) ? $_FILES['profile']['name'] : "profile_blank.jpg";
    $profile_pic_tmp_name = $_FILES['profile']['tmp_name'];
    // $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    // $randomtext = $characters[rand(0, strlen($characters) - 1)];

    $userID = (string)(date('m')."-".rand(111, 999)."-".rand(1111, 9999));
    $precinct = array("4563F", "2323G", "6784D");
    $randomPrecinct = $precinct[rand(0, count($precinct) - 1)];
    $profile_slice = explode(".", $profile_pic_name);
    $profile_type = strtolower(end($profile_slice));
    $allowedType = array("jpg", "png", "jpeg");
    if($password===$confirmPassword){
        $realPassword = password_hash($password, PASSWORD_DEFAULT);
        if(in_array($profile_type, $allowedType)){
            $profile_name = (!empty(($_FILES['profile']['name']))) ? "profile-voter-".$userID.".".$profile_type : $profile_pic_name;
            $queryVoters = $conn->prepare("INSERT INTO voters (UserID, Precinct, Firstname, Lastname, Profile_pic, Status, acc_stat) VALUES ('$userID', '$randomPrecinct', '$firstname', '$lastname', '$profile_name', 'Pending', 'New')");
            $queryVoters->execute();
            $queryLogin = $conn->prepare("INSERT INTO login (Username, Password, User_Type) VALUES ('$userID','$realPassword', 'Voters')");
            $queryLogin->execute();
            // $_SESSION['message'] = "Voter account Created Successfully";
            if($profile_name !== "profile_blank.jpg"){
                if(move_uploaded_file($profile_pic_tmp_name, "../profile/".$profile_name)){
                    echo "File Image Upload Successfully";
                }else{
                    echo "File Image Upload Failed";
                }
            }
        }else{
            $_SESSION['message-error'] = "<div class='alert alert-danger' role='alert'>
            INVALID TO REGISTER
           </div>";
        }
        $_SESSION['verif-body-text'] = "<p>You may proceed to contact or process your requirements in order to verify you account. Please go to the com-elect admission nearby to comply the needed requirements.</p>
        <p>Your Permanent User ID or Username: <b>".$userID."</b></p>
        <div class='alert alert-danger' role='alert'>
        Don't forget your Username or User ID, Please write it on your note in case
        </div>";
        $_SESSION['verif-header'] = "VERIFY YOUR ACCOUNT";
        header("location: ../voter_verification.php");
    }else{
        $_SESSION['message-error'] = "<div class='alert alert-danger' role='alert'>
       INVALID TO REGISTER
      </div>";
        header("location: ../index.php");
    }
}
?>