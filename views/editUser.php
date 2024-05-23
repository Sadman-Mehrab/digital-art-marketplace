<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/userModel.php');
    $userName = $_SESSION['currentUserName'];
    
    $user = getUser($userName);


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Edit ".$user['userName'] ?></title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>
    <center>

        <table width="100%">
                <tr>
                    <td colspan="8"><a href=homepage.php><img src="../assets/head.PNG"></a></td>
                    <td>
                        <a href="user.php" >
                            User
                        </a><br>
                        <a href="menu.html" >
                            Menu
                        </a>
                    </td>
                </tr>
            </table>
        <table>

        
        <h2><?php echo $user['userName'] ?></h2>
    </center>
    
    <center>
        <form action="../controllers/editUserCheck.php" method="post" enctype="multipart/form-data" onsubmit="return validate()">

        
            <table class="generalText userInfoCard">
            <tr>
                <td>
                    <table >
                    <tr>
                        <td><b>Username</b></td>
                        <td>: 
                            <input type="text" name="userName" id="userName" value="<?php echo $user['userName']?>" onchange="checkDuplicateUserName()">
                            <input hidden type="text" name="currentUserName" id="currentUserName" value="<?php echo $user['userName']?>" >
                            <input hidden type="text" name="isNewUserNameValid" id="isNewUserNameValid" value="True" >
                        </td>             
                    </tr>
                    <tr>
                        <td><b>First Name</b></td>
                        <td>: <input type="text" name="firstName" id="firstName" value="<?php echo $user['firstName']?>"></td>
                    </tr>
                    <tr>
                        <td><b>Last Name</b></td>
                        <td>: <input type="text" name="lastName" id="lastName"  value="<?php echo $user['lastName']?>"></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td>: <input type="email" name="email" id="email" value="<?php echo $user['email']?>" onchange="checkDuplicateEmail()"></td>
                        <input hidden type="text" name="currentEmail" id="currentEmail" value="<?php echo $user['email']?>" >
                        <input hidden type="text" name="isNewEmailValid" id="isNewEmailValid" value="True" >
                    </tr>
                    <tr>
                        <td><b>Phone Number</b></td>
                        <td>: <input type="text" name="phoneNumber" id="phoneNumber" value="<?php echo $user['phoneNumber']?>"></td>
                    </tr>
                    <tr>
                        <td><b>Gender</b></td>
                        <td>:
                            <?php if($user['gender'] == 'Male'){ ?>
                                <input type="radio" name="gender" id="Male" value="Male" checked> Male
                                <input type="radio" name="gender" id="Female" value="Female" > Female
                                <input type="radio" name="gender" id="Other" value="Other" > Other
                            <?php }?>
                            <?php if($user['gender'] == 'Female'){ ?>
                                <input type="radio" name="gender" id="Male" value="Male" > Male
                                <input type="radio" name="gender" id="Female" value="Female" checked> Female
                                <input type="radio" name="gender" id="Other" value="Other" > Other
                            <?php }?>
                            <?php if($user['gender'] == 'Other'){ ?>
                                <input type="radio" name="gender" id="Male" value="Male" > Male
                                <input type="radio" name="gender" id="Female" value="Female" > Female
                                <input type="radio" name="gender" id="Other" value="Other" checked> Other
                            <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Type</b></td>
                        <td>:
                            <?php if($user['type'] == 'Artist'){ ?>
                                <input type="radio" name="type" id="Artist" value="Artist" checked> Artist
                                <input type="radio" name="type" id="User" value="User" > User
                            <?php }?>
                            <?php if($user['type'] == 'User'){ ?>
                                <input type="radio" name="type" id="Artist" value="Artist" > Artist
                                <input type="radio" name="type" id="User" value="User" checked> User
                            <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Date Of Birth</b></td>
                        <td>:
                            <input type="date" name="dateOfBirth" >
                        </td>
                    </tr>
                    <tr>
                        <td><b>Current Password</b></td>
                        <td>:
                            <input type="password" id="password" name="password" value="" >
                            <input hidden type="password" id="currentPassword" name="currentPassword" value="<?php echo $user['password']?>" >
                        </td>
                    </tr>
                    <tr>
                        <td><b>New Password</b></td>
                        <td>:
                            <input type="password" id="newPassword" name="newPassword" value="" >
                        </td>
                    </tr>
                    <tr>
                        <td><b>Retype Password</b></td>
                        <td>:
                            <input type="password" id="retypePassword" name="retypePassword" value="" >
                        </td>
                    </tr>
                    <tr>
                        <td><b>Proflie Picture</b></td>
                        <td>:
                        <input type="file" accept="image/*" name="profilePicture" id="profilePicture" onchange="showUpdateProfilePicture()">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Confirm">
                        </td>

                    </tr>
                    

                   

                    

                    </table>
                </td>
                
                    
                    <td >
                        <img class="profilePicture"  src="<?php echo $user['profilePicture'] ?>" id="currentProfilePicture" alt=""> <br>
                    </td>
                    
                </tr>
            </table>

            </form>
</center>



<script src="../assets/js/editUser.js"></script>

</body>
</html>