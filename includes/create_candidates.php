<?php 
session_start();
if(!isset($_SESSION['user_type']) || $_SESSION['user_type']!="Admin"){
    header("location: ../index.php");
}else{
    include "db.php";
    if(isset($_POST['submit_create_candidate']) && $_SESSION['user_type'] == "Admin"){
        $confirmPassword = $_POST['passwordConfirm'];
        $userAdmin = $_SESSION['user_type'];
        $queryPullPassword = $conn->prepare("SELECT Password FROM login WHERE User_Type = '$userAdmin'");
        $queryPullPassword->execute();
        $rawPassword = $queryPullPassword->fetch(PDO::FETCH_ASSOC);
        $verifyPassword = password_verify($confirmPassword,$rawPassword['Password']);
        if($verifyPassword){
            $cand_fname = ucfirst($_POST['cand_fname']);
            $cand_lname = ucfirst($_POST['cand_lname']);
            $cand_nickname = ucfirst($_POST['cand_nickname']);
            $cand_position = ucfirst($_POST['cand_position']);
            $cand_platform = ucfirst($_POST['platform']);
            $cand_id_candidate = "candidate-".rand(111, 999)."-".rand(1111, 9999);
            if(!empty($_FILES['cand_profile']['name'])){
                $cand_profile = $_FILES['cand_profile']['name'];
                $cand_tmp_profile = $_FILES['cand_profile']['tmp_name'];
                $explodeProfile = explode(".",$cand_profile);
                $profileType = strtolower(end($explodeProfile));
                $allowedType = array("jpg", "png", "jpeg");
                $UniqueProfileID = rand(111, 9999)."-".rand(1111, 9999);
                if(in_array($profileType, $allowedType)){
                    $profileName = "profile-candidate-".$UniqueProfileID.".".$profileType;
                    $queryCandidate = $conn->prepare("INSERT INTO candidate (profile_pic, candidate_first_name, candidate_last_name, candidate_nickname, Position, Platform, candidate_id) 
                    VALUES('$profileName','$cand_fname', '$cand_lname', '$cand_nickname', '$cand_position', '$cand_platform', '$cand_id_candidate')");
                    $queryCandidate->execute();
                    move_uploaded_file($cand_tmp_profile, "../profile/".$profileName);
                }else{
                    $_SESSION['message'] = "Invalid Profile Image Type";
                    $_SESSION['title'] = "PROFILE INVALID";
                    $_SESSION['control'] = "text-bg-danger border-0";
                }
            }else{
                $profileName = "profile_blank.jpg";
                $queryCandidate = $conn->prepare("INSERT INTO candidate (profile_pic, candidate_first_name, candidate_last_name, candidate_nickname, Position, Platform, candidate_id) 
                VALUES('$profileName','$cand_fname', '$cand_lname', '$cand_nickname', '$cand_position', '$cand_platform', '$cand_id_candidate')");
                $queryCandidate->execute();
            }
            $_SESSION['message'] = "Candidate has been created";
            $_SESSION['title'] = "NEW CANDIDATE CREATED SUCCESSFULLY";
            $_SESSION['control'] = "text-bg-success border-0";
        }else{
            $_SESSION['message'] = "Admin password is Invalid";
            $_SESSION['title'] = "PASSWORD INVALID";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
        header("location: ../admin/candidates.php");
    }
    
    else if(isset($_POST['submit_edit_candidate']) && $_SESSION['user_type'] == "Admin"){
        $confirmPassword = $_POST['passwordConfirm'];
        $userAdmin = $_SESSION['user_type'];
        $queryPullPassword = $conn->prepare("SELECT Password FROM login WHERE User_Type = '$userAdmin'");
        $queryPullPassword->execute();
        $rawPassword = $queryPullPassword->fetch(PDO::FETCH_ASSOC);
        $verifyPassword = password_verify($confirmPassword,$rawPassword['Password']);
        if($verifyPassword){
            $cand_fname_edit = ucfirst($_POST['cand_Edit_fname']);
            $cand_lname_edit = ucfirst($_POST['cand_Edit_lname']);
            $cand_nickname_edit = ucfirst($_POST['cand_Edit_nickname']);
            $cand_position_edit = ucfirst($_POST['cand_Edit_position']);
            $cand_platform_edit = ucfirst($_POST['platformEdit']);
            $cand_Id = $_POST['candidate_Id'];
            if(!empty($_FILES['cand_Edit_profile']['name'])){
                $cand_profile_edit = $_FILES['cand_Edit_profile']['name'];
                $cand_tmp_profile = $_FILES['cand_Edit_profile']['tmp_name'];
                $explodeProfile = explode(".",$cand_profile_edit);
                $profileType = strtolower(end($explodeProfile));
                $allowedType = array("jpg", "png", "jpeg");
                $UniqueProfileID = rand(111, 9999)."-".rand(1111, 9999);
                if(in_array($profileType, $allowedType)){
                    $profileName = "profile-candidate-".$UniqueProfileID.".".$profileType;
                    $queryCandidate = $conn->prepare("UPDATE candidate SET profile_pic = '$profileName', candidate_first_name = '$cand_fname_edit', 
                    candidate_last_name = '$cand_lname_edit',  candidate_nickname = '$cand_nickname_edit', 
                    Position = '$cand_position_edit', Platform = '$cand_platform_edit'
                    WHERE id = '$cand_Id'");
                    $queryCandidate->execute();
                    move_uploaded_file($cand_tmp_profile, "../profile/".$profileName);
                }else{
                    $_SESSION['message'] = "Invalid Profile Image Type";
                    $_SESSION['title'] = "PROFILE INVALID";
                    $_SESSION['control'] = "text-bg-danger border-0";
                }
            }else{
                $queryCandidate = $conn->prepare("UPDATE candidate SET candidate_first_name = '$cand_fname_edit', 
                candidate_last_name = '$cand_lname_edit',  candidate_nickname = '$cand_nickname_edit', 
                Position = '$cand_position_edit', Platform = '$cand_platform_edit'
                WHERE id = '$cand_Id'");
                $queryCandidate->execute();
            }
            $_SESSION['message'] = "Candidate has been edited";
            $_SESSION['title'] = "CANDIDATE EDITED SUCCESSFULLY";
            $_SESSION['control'] = "text-bg-primary border-0";
        }else{
            $_SESSION['message'] = "Admin password is Invalid";
            $_SESSION['title'] = "PASSWORD INVALID";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
        header("location: ../admin/candidates.php");
    }
    else if(isset($_POST['submit_delete_position']) && $_SESSION['user_type'] == "Admin"){
        $confirmPassword = $_POST['passwordConfirm'];
        $userAdmin = $_SESSION['user_type'];
        $queryPullPassword = $conn->prepare("SELECT Password FROM login WHERE User_Type = '$userAdmin'");
        $queryPullPassword->execute();
        $rawPassword = $queryPullPassword->fetch(PDO::FETCH_ASSOC);
        $verifyPassword = password_verify($confirmPassword,$rawPassword['Password']);
        if($verifyPassword){
            $Cand_Id = $_POST['CandidateID'];
            $queryDelete = $conn->prepare("DELETE FROM candidate WHERE id ='$Cand_Id'");
            $queryDelete->execute();
            $_SESSION['message'] = "Candidate has been deleted";
            $_SESSION['title'] = "CANDIDATE DELETED SUCCESSFULLY";
            $_SESSION['control'] = "text-bg-success border-0";
        }else{
            $_SESSION['message'] = "Admin password is Invalid";
            $_SESSION['title'] = "PASSWORD INVALID";
            $_SESSION['control'] = "text-bg-danger border-0";
        }
        header("location: ../admin/candidates.php");
    }else{
      header("location: ../admin/candidates.php");
    }
    $_SESSION['function'] = "<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
     toastBootstrap.show()
    </script>";
}
?>