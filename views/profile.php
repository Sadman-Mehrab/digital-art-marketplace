<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/userModel.php');
    require_once('../models/artworkModel.php');

    $currentUserName = $_SESSION['currentUserName'];

    $userName = $_REQUEST['userName'];
    $user = getUser($userName);
    $artworks = getUserArtworks($userName);

    if(!$user) {
        echo "User {$userName} not found!";
        return;
    }
    
    if($userName != $currentUserName && $user['type'] == "Artist"){
        $user['totalViews'] = $user['totalViews'] + 1;
        updateUser($userName, $user);
    }



    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['userName']." Profile"?></title>
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
            <table class="userInfoCard generalText" >
            <tr>
                <td>
                    <img class="profilePicture" src="<?php echo $user['profilePicture'] ?>" alt="" width="150px"> <br>
                </td>

                <td>
                    <table >
                    <tr>
                        <td><b>Username</b></td>
                        <td>:<?php echo $user['userName'] ?></td>
                            
                    </tr>
                    <tr>
                        <td><b>First Name</b></td>
                        <td>:<?php echo $user['firstName'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Last Name</b></td>
                        <td>:<?php echo $user['lastName'] ?></td>
                    </tr>

                    <tr>
                        <td><b>Email</b></td>
                        <td>:<?php echo $user['email'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Gender</b></td>
                        <td>:<?php echo $user['gender'] ?></td>
                    </tr>

                    <tr>
                        <td><b>Joining Date</b></td>
                        <td>:<?php echo $user['joiningDate'] ?></td>
                    </tr>
                    <?php if($user['type'] == "Artist") { ?>
                    <tr>
                        <td><b>Total Views</b></td>
                        <td>:<?php echo $user['totalViews'] ?></td>
                    </tr>
                    <?php }?>  
                    </table>
                </td>
                
                    

                
                    
                </tr>
            </table>

            <table class="buttonsContainer">
                <?php if($user['userName'] != $currentUserName) { ?>
                <tr>
                    <td class="button" >
                            <a href="message.php?userName=<?php echo $user['userName'] ?>#message">
                                Send Message
                            </a>
                        </td>
                        
                        
                    </tr>
                <?php }?>
            </table>
</center>


<center>
    <h2>Artworks</h2>
</center>

<center>

    <table>
        <tr>
            <?php while($artwork = mysqli_fetch_assoc($artworks)){ ?>
            <td class="artworkCard">
                <a href="artwork.php?id=<?php echo $artwork['id']?>">
                    <img class="artwork" src="<?php echo $artwork['image'] ?>" alt="" width="150px">
                    <p><center><b> <?php echo $artwork['artworkName'] ?> </b></center> </p>
                    <p><center> <?php echo $artwork['price'] ?> ArtCoin </center></p>
                    
                </a>
            </td>
            <?php   }?>
        </tr>
    </table>
    
</center>

</body>
</html>