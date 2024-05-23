<?php 
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/artworkModel.php');
    $userName = $_SESSION['currentUserName'];
    $artId = $_REQUEST['id'];
    $result = getArtworkWithId($artId);
    $art = mysqli_fetch_assoc($result);

    $art['views'] = $art['views']+1;
    updateArtwork($art) ;

    if(!$art) {
        echo "Artwork not found!";
        return;
    }
?>
<html>
<header>
    <title>Artwork</title>
</header>

<body>
    <center>
        
        <form method="post" action="" enctype="">
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
        </form> 

        <h2>Artwork</h2><br>
        <img src="<?php echo $art['image'] ?>" width="600px"><br>
        <table>
            <tr>
                <td><b>Name:</b></td>
                <td><?php echo $art['artworkName']  ?></td>
            </tr>
            <tr>
                <td><b>Description:</b></td>
                <td><?php echo $art['description']  ?></td>
            </tr>
            <tr>
                <td><b>Artist:</b></td>
                    <td><a href="profile.php?userName=<?php echo $art['artistName'] ?>"><?php echo $art['artistName'] ?></a></td>
            </tr>
            <tr>
                <td><b>Owner:</b></td>
                <td><a href="profile.php?userName=<?php echo $art['ownerName'] ?>"><?php echo $art['ownerName'] ?></a></td>
            </tr>
            <tr>
                <td><b>Current Price:</b></td>
                <td><?php echo $art['price'] ?></td>
            </tr>
            <?php if($art['purchaseAble'] == 'Yes' && $art['ownerName'] != $userName ) { ?>
            <tr>
                <td>
                    <b><a href="buyArtwork.php?id=<?php echo $art['id'] ?>">BUY</a></b>
                </td>
            </tr>
            <?php } ?>

            <?php if($_SESSION['currentUserName'] == $art['ownerName']) { ?> 
            <tr>
                <td>
                    <b><a href="editArtwork.php?id=<?php echo $art['id'] ?>">EDIT</a></b>
                </td>
            </tr>
            <?php } ?>
        </table>

    </center>
</body>

</html>