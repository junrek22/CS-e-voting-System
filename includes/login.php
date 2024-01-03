<?php 
session_start();
if(isset($_POST['submit_log'])){
    include "db.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM login WHERE Username = '$username'");
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $verify = false;
        do{
            $verify = password_verify($password, $result['Password']);
            if($verify){
                break;
            }
        }while($stmt->nextRowset());
        if($verify){
            if($result['User_Type']=='Admin'){
                
                $_SESSION['user_type'] = $result['User_Type'];
                $_SESSION['username'] = $result['Username'];

                header("location: ../admin/dashboard.php");
            }else if($result['User_Type']=='Voters'){
                $User_ID = $result['Username'];
                $queryReview = $conn->prepare("SELECT * FROM voters WHERE UserID = '$User_ID'");
                $queryReview->execute();
                $getStatus = $queryReview->fetch(PDO::FETCH_ASSOC);

                $_SESSION['user_type'] = $result['User_Type'];
                $_SESSION['stats'] = $getStatus['Status'];
                $_SESSION['acc_stats'] = $getStatus['acc_stat'];
                $_SESSION['voter_user_id'] = $getStatus['Username'];
                $_SESSION['already-voter'] = $getStatus['vote_stat'];

                if($getStatus['Status']=="Pending"){
                    $_SESSION['verif-body-text'] = "<p>You may proceed to contact or process your requirements in order to verify you account. Please go to the com-elect admission nearby to comply the needed requirements.</p>
                    <p>Your Permanent User ID or Username: <b>".$User_ID."</b></p>
                    <div class='alert alert-danger' role='alert'>
                    Don't forget your Username or User ID, Please write it on your note in case
                    </div>";
                    $_SESSION['verif-header'] = "VERIFY YOUR ACCOUNT";
                    header("location: ../voter_verification.php");
                }else if($getStatus['Status']=="Invalid"){
                    $_SESSION['verif-body-text'] = "<p>If you are seeing this message, your account has been invalidated for some reason that is difficult to identify your valid identity. Please contact to the admission to clarify this matter.</p>
                    <p>This Permanent User ID or Username has been revoked: <b>".$User_ID."</b></p>";
                    $_SESSION['verif-header'] = "ACCOUNT HAS BEEN INVALIDATED";
                    header("location: ../voter_verification.php");
                }else if($getStatus['Status']=="Valid"){
                    if($getStatus['acc_stat']=="New"){     
                        header("location: ../voters/create_new_password.php");
                    }else if($getStatus['acc_stat']=="Old"){
                        header("location: ../voters/voter_page.php");
                    }
                }
            }
        }else{
            $_SESSION['message-error'] = "<div class='alert alert-danger' role='alert'>
            INVALID CREDENTIALS
           </div>";
           header("location: ../index.php");
        }
    }else{
        $_SESSION['message-error'] = "<div class='alert alert-danger' role='alert'>
            INVALID CREDENTIALS
           </div>";
           header("location: ../index.php");
    }
}else{
    header("location: ../index.php");
}
?>