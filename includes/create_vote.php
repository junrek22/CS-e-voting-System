<?php 
session_start();
include "db.php";
if(isset($_POST['submit_account_vote'])){
    $firstname = ucfirst($_POST['firstname']);
    $lastname = ucfirst($_POST['lastname']);
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
    $password = password_hash("1234", PASSWORD_DEFAULT);
    if(in_array($profile_type, $allowedType)){
        $profile_name = (!empty(($_FILES['profile']['name']))) ? "profile-voter-".$userID.".".$profile_type : $profile_pic_name;
        $queryVoters = $conn->prepare("INSERT INTO voters (UserID, Precinct, Firstname, Lastname, Profile_pic, Status, acc_stat) VALUES ('$userID', '$randomPrecinct', '$firstname', '$lastname', '$profile_name', 'Valid', 'New')");
        $queryVoters->execute();
        $queryLogin = $conn->prepare("INSERT INTO login (Username, Password, User_Type) VALUES ('$userID','$password', 'Voters')");
        $queryLogin->execute();
        $_SESSION['message'] = "Voter account Created Successfully";
        $_SESSION['title'] = "CREATED SUCCESSFULLY";
        $_SESSION['control'] = "text-bg-success border-0";
        if($profile_name !== "profile_blank.jpg"){
            if(move_uploaded_file($profile_pic_tmp_name, "../profile/".$profile_name)){
                echo "File Image Upload Successfully";
            }else{
                echo "File Image Upload Failed";
            }
        }
    }else{
        $_SESSION['message'] = "Invalid Profile Image Type";
        $_SESSION['title'] = "PROFILE INVALID";
        $_SESSION['control'] = "text-bg-danger border-0";
    }
    header("location: ../admin/voters.php");
}

if(isset($_POST['submit_edit'])){
    $firstname = ucfirst($_POST['firstname']);
    $lastname = ucfirst($_POST['lastname']);
    $userID = $_POST['UserID'];
    $queryVoter = " ";
    if(!empty($_FILES['profile']['name']) && !empty( $_FILES['profile']['tmp_name'])){
        $profile_pic_name = $_FILES['profile']['name'];
        $profile_pic_tmp_name = $_FILES['profile']['tmp_name'];
        $profile_slice = explode(".", $profile_pic_name);
        $profile_type = strtolower(end($profile_slice));
        $allowedType = array("jpg", "png", "jpeg");
        if(in_array($profile_type, $allowedType)){
            $profile_name = "profile-voter-".$userID.".".$profile_type;
            $queryVoter = "UPDATE voters SET Firstname = '$firstname', Lastname = '$lastname', Profile_pic = '$profile_name' WHERE UserID = '$userID'" ;
            if(move_uploaded_file($profile_pic_tmp_name, "../profile/".$profile_name)){
                echo "File Image Upload Successfully";
            }else{
                echo "File Image Upload Failed";
            }
        }else{
            echo "File is invalid";
        }
    }else{
        $queryVoter = "UPDATE voters SET Firstname = '$firstname', Lastname = '$lastname' WHERE UserID = '$userID'";
    }
    $queryEditVoters = $conn->prepare($queryVoter);
    $queryEditVoters->execute();
    if($queryEditVoters){
        $_SESSION['message'] = "Voter account Edited Successfully";
        $_SESSION['title'] = "EDITED SUCCESSFULLY";
        $_SESSION['control'] = "text-bg-primary border-0";
    }else{
        $_SESSION['message'] = "Voter account Edited Failed";
        $_SESSION['title'] = "EDITED FAILED";
        $_SESSION['control'] = "text-bg-danger border-0";
    }
    header("location: ../admin/voters.php");   
} 

if(isset($_GET['U_ID'])){
    $U_id = $_GET['U_ID'];
    $queryDelete = $conn->prepare("DELETE FROM voters WHERE UserID = '$U_id'");
    $queryDeleteLog = $conn->prepare("DELETE FROM login WHERE Username ='$U_id'");
    $queryDelete->execute();
    $queryDeleteLog->execute();
    $_SESSION['message'] = "Voter account deleted successfully";
    $_SESSION['title'] = "DELETED SUCCESSFULLY";
    $_SESSION['control'] = "text-bg-success border-0";
    header("location: ../admin/voters.php");
}
$_SESSION['function'] = "<script>
const toastLiveExample = document.getElementById('liveToast')
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
 toastBootstrap.show()
</script>";
?>