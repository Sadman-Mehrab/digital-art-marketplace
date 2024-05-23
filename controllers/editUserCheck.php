<?php
    // session_start();
    require_once('sessionCheck.php');
    require_once('../models/userModel.php');
    require_once('../models/artworkModel.php');
    require_once('../models/notificationModel.php');
    require_once('../models/chatModel.php');

    $userName = $_SESSION['currentUserName'];
    $user = getUser($userName);

    $updatedUsername = $_REQUEST['userName'];
    $updatedFirstName = $_REQUEST['firstName'];
    $updatedLastName = $_REQUEST['lastName'];
    $updatedEmail = $_REQUEST['email'];
    $updatedPhoneNumber = $_REQUEST['phoneNumber'];
    $updatedGender = $_REQUEST['gender'];
    $updatedType = $_REQUEST['type'];
    $updatedDateOfBirth = $_REQUEST['dateOfBirth'];

    $imageSource = $_FILES['profilePicture']['tmp_name'];
    $imageDestination = "../assets/profilePictures/".$_FILES['profilePicture']['name'];
    $profilePictureId = uniqid();

    $currentPassword = $_REQUEST['password'];
    $updatedNewPassword = $_REQUEST['newPassword'];
    $updatedRetypePassword = $_REQUEST['retypePassword'];

    $isUpdatedUsernameValid = true;
    $isUpdatedFirstNameValid = true;
    $isUpdatedLastNameValid = true;
    $isUpdatedEmailValid = true;
    $isUpdatedPhoneNumberValid = true;
    $isUpdatedGenderValid = true;
    $isUupdatedTypeValid = true;
    $isCurrentPasswordValid = true;

    if($updatedUsername == ""){
        echo "Username Cannot Be Empty!";
        $isUpdatedUsernameValid = false;
    }
    if($updatedFirstName == ""){
        echo "First Name Cannot Be Empty!";
        $isUpdatedFirstNameValid = false;
    }
    if($updatedLastName == ""){
        echo "Last Name Cannot Be Empty!";
        $isUpdatedLastNameValid = false;
    }
    if($updatedEmail == ""){
        echo "Email Cannot Be Empty!";
        $isUpdatedEmailValid = false;
    }
    if($updatedPhoneNumber == ""){
        echo "Phone Number Cannot Be Empty!";
        $isUpdatedPhoneNumberValid = false;
    }
    if($updatedGender == ""){
        echo "Gender Cannot Be Empty!";
        $isUpdatedGenderValid = false;
    }
    if($updatedType == ""){
        echo "Type Cannot Be Empty!";
        $isUupdatedTypeValid = false;
    }
    if($currentPassword == ""){
        echo "Password Cannot Be Empty!";
        $isCurrentPasswordValid = false;
    }
    
    $user['userName'] = $updatedUsername;
    $user['firstName'] = $updatedFirstName;
    $user['lastName'] = $updatedLastName;
    $user['email'] = $updatedEmail;
    $user['phoneNumber'] = $updatedPhoneNumber;
    $user['gender'] = $updatedGender;
    $user['type'] = $updatedType;
    
    if($updatedDateOfBirth != ""){
        $user['dateOfBirth'] = $updatedDateOfBirth;
    }

    if($currentPassword != $user['password']){
        echo "Invalid Current Password!";
        $isCurrentPasswordValid = false;
    }

    if($updatedNewPassword == $updatedRetypePassword && $updatedNewPassword != "" && $updatedRetypePassword != ""){
        $user['password'] = $updatedNewPassword;
    }

    if($imageSource){
        if(move_uploaded_file($imageSource, $imageDestination)){
            $imageExtension = pathinfo($imageDestination)['extension'];
            $imageFileName = "../assets/profilePictures/".$profilePictureId.".".$imageExtension;
            
            if(rename($imageDestination,$imageFileName)){
                if(unlink($user['profilePicture'])){
                    $user['profilePicture'] = $imageFileName;
                    echo 'Profile Picture Update Successful!';         
                }
                else{
                    echo 'Old Profile Picture Delete Error!';         
                }

            }

            else{
                echo 'Profile Picture Rename Error!';         
            }
        }
        else{
            echo 'Profile Picture Move Error!';         
            
        }
    }

    if($isUpdatedUsernameValid && $isUpdatedFirstNameValid && $isUpdatedLastNameValid && $isUpdatedEmailValid && $isUpdatedPhoneNumberValid && $isUpdatedGenderValid && $isUupdatedTypeValid && $isCurrentPasswordValid){
        $status1 = updateUser($userName, $user);
        $status2 = updateOwnerName($userName, $updatedUsername);
        $status3 = updateArtistName($userName, $updatedUsername);
        $status4 = updateNotificationUserName($userName, $updatedUsername);
        $status5 = updateChatSender($userName, $updatedUsername);
        $status6 = updateChatReceiver($userName, $updatedUsername);

        
        if($status1 && $status2 && $status3 && $status4 && $status5 && $status6){
            echo 'User Updated Successfuly';
            $_SESSION['currentUserName'] = $user['userName'];
            createNotification($user['userName'], "Your Account Details Were Recently Updated");

            header("location: ../views/user.php");

        }else{
            echo 'User Update Unsuccessful!';
        }


    }


?>