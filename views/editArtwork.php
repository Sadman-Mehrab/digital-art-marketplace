<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/artworkModel.php');
    $userName = $_SESSION['currentUserName'];
    $artId= $_REQUEST['id'];
    
    $art=getArtwork($artId);


    
?>

<html>
    <head>
        <title>Edit Artwork</title>
    </head>
    <body>
        <center>
        <form action="../controllers/editArtworkCheck.php?id=<?php echo $artId ?>" method="post" enctype="">
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
            <h2>Edit Artwork</h2>
                <tr>
                    <td>
                        <b>Name:</b>
                    </td>
                    <td>
                        <input type="text" name="artworkName" value="<?php echo $art['artworkName'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Description:</b>
                    </td>
                    <td>
                        <input type="text" name="description" value="<?php echo $art['description'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Current Price:</b>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $art['price'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Purchaseablity:</b>
                    </td>
                    <?php if($art['purchaseAble'] == 'Yes') {?>
                    <td>
                        <input type="radio" name="purchaseAble" value="Yes" checked> Yes
                         <input type="radio" name="purchaseAble" value="No" > No
                    </td>
                    <?php } else {?>
                    <td>
                        <input type="radio" name="purchaseAble" value="Yes" > Yes
                         <input type="radio" name="purchaseAble" value="No" checked> No
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="submit" name="submit" value="Apply Changes">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="deleteArtwork.php?id=<?php echo $art['id'] ?>">Delete</a>
                    </td>
                </tr>
                
        </table>
    </form>
    </center>
    </body>
</html>