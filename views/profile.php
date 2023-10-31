<?php
    require_once('../models/userModel.php');
    require_once('../models/artworkModel.php');
    $userName = $_REQUEST['userName'];
    $user = getUser($userName);
    $artworks = getUserArtworks($userName);

    if(!$user) {
        echo "User {$userName} not found!";
        return;
    }





    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['userName']." Profile"?></title>
</head>
<body>
    <center>
        
        <h2><?php echo $user['userName'] ?></h2>
    </center>
    
    <center>
            <table>
            <tr>
                <td>
                    <table >
                    <tr>
                            <td><b>Username: </b></td>
                            <td><?php echo $user['userName'] ?></td>
                            
                        </tr>
                        <tr>
                            <td><b>First Name: </b></td>
                            <td><?php echo $user['firstName'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Last Name: </b></td>
                            <td><?php echo $user['lastName'] ?></td>
                        </tr>

                        <tr>
                            <td><b>Email : </b></td>
                            <td><?php echo $user['email'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Gender: </b></td>
                            <td><?php echo $user['gender'] ?></td>
                        </tr>

                        <tr>
                            <td><b>Joining Date: </b></td>
                            <td><?php echo $user['joiningDate'] ?></td>
                        </tr>
                        <!-- if Artist -->
                        <tr>
                            <td><b>Total Likes: </b></td>
                            <td><?php echo $user['totalLikes'] ?></td>
                        </tr>
                        
                    </table>
                </td>
                <td>
                    
                    </td>
                    <td >
                        <img src="<?php echo $user['profilePicture'] ?>" alt="" width="150px"> <br>
                        <!-- <input type="submit" name="edit" value="Edit"> -->
                    </td>
                    
                </tr>
            </table>
</center>


<center>
    <h3>Artworks</h3>
</center>

<center>

    <table>
        <tr>
            <?php while($artwork = mysqli_fetch_assoc($artworks)){ ?>
            <td>
                <img src="<?php echo $artwork['image'] ?>" alt="" width="150px">
                <p><b> <?php echo $artwork['artworkName'] ?> </b> </p>
                <p> $<?php echo $artwork['price'] ?> </p>
                View: <input type="submit" name="artworkName" value="<?php echo $artwork['artworkName'] ?>">
                <br>
                <br>
                Buy: <input type="submit" name="artworkName" value="<?php echo $artwork['artworkName'] ?>">
            </td>
            <?php   }?>
        </tr>
    </table>
    
</center>

</body>
</html>