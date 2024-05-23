<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/artworkModel.php');
    require_once('../models/userModel.php');

    $currentUserName = $_SESSION['currentUserName'];
    $currentUser = getUser($currentUserName);

    $artworkId = $_REQUEST['id'];
    $artwork = getArtwork($artworkId);

    if(!$artwork) {
        echo "Artwork Id: {$artworkId} not found!";
        return;
    }

    if($artwork['ownerName'] == $currentUserName){
        echo "You Cannot Buy Your Own Artwork!";
        return;  
    }

    if($artwork['purchaseAble'] != "Yes"){
        echo "Artwork Not Available For Purchase!";
        return;  
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Artwork</title>
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


        <h2>Buy Artwork</h2>
        <img class="artwork" src="<?php echo $artwork['image']?>" alt="" width="350px">
        <table class="generalText">
            <tr>
                <td><b>Name</b></td>
                <td>:<?php echo $artwork['artworkName'] ?></td>
            </tr>
            <tr>
                <td><b>Owner</b></td>
                <td>:<?php echo $artwork['ownerName'] ?></td>
            </tr>
            <tr>
                <td><b>Price</b></td>
                <td>:<?php echo $artwork['price'] ?> ArtCoin</td>
            </tr>
            <tr>
                <td><b>Your Balance</b></td>
                <td>:<?php echo $currentUser['balance'] ?> ArtCoin</td>
            </tr>
        </table>

        <?php
            if($artwork['price'] > $currentUser['balance']){
                echo "<b>You Do Not Have Sufficient Balance To Buy This Artwork!<b>";
            }else{
                $transactionResult = $currentUser['balance'] - $artwork['price'];
                echo "<a href='../controllers/buyArtworkCheck.php?id={$artworkId}'><button>Confirm Purchase</button></a>";
                echo "<br>Balance After Purchase: {$transactionResult} ArtCoin";
            }
        ?>
        
    </center>
    
</body>
</html>