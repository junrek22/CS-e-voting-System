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
                $_SESSION['user_admin'] = $result['User_Type'];
                header("location: ../admin/dashboard.php");
            }else if($result['User_Type']=='Voters'){
                $username = $result['Username'];
                $queryReview = $conn->prepare("SELECT Status, acc_stat FROM voters WHERE UserID = '$username'");
                $queryReview->execute();
                $getStatus = $queryReview->fetch(PDO::FETCH_ASSOC);
                if($getStatus['Status']=="Pending"){
                    $_SESSION['verif-body-text'] = "<p>You may proceed to contact or process your requirements in order to verify you account. Please go to the com-elect admission nearby to comply the needed requirements.</p>
                    <p>Your Permanent User ID or Username: <b>".$username."</b></p>
                    <div class='alert alert-danger' role='alert'>
                    Don't forget your Username or User ID, Please write it on your note in case
                    </div>";
                    $_SESSION['verif-header'] = "VERIFY YOUR ACCOUNT";
                    header("location: ../voter_verification.php");
                }else if($getStatus['Status']=="Invalid"){
                    $_SESSION['verif-body-text'] = "<p>If you are seeing this message, your account has been invalidated for some reason that is difficult to identify your valid identity. Please contact to the admission to clarify this matter.</p>
                    <p>This Permanent User ID or Username has been revoked: <b>".$username."</b></p>";
                    $_SESSION['verif-header'] = "ACCOUNT HAS BEEN INVALIDATED";
                    header("location: ../voter_verification.php");
                }else if($getStatus['Status']=="Valid"){
                    if($getStatus['acc_stat']=="New"){
                        header("location: ../voters/voter_page.php");
                    }else{
                        
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