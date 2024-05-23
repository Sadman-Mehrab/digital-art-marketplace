<?php
    // session_start();
    require_once('sessionCheck.php');
    require_once("../models/artworkModel.php");
    
    $currentUserName = $_SESSION['currentUserName'];
    

    $artworkName = $_REQUEST['artworkName'];
    $description = $_REQUEST['description'];
    $price = $_REQUEST['price'];
    $purchaseAble = $_REQUEST['purchaseAble'];
    $id = $_REQUEST['id'];
    $artwork = getArtwork($id);

    if($artworkName == ''){
        echo 'Artwork Name field is Empty!';
        return;
    }
    if($description == ''){
        echo 'Description field is Empty!';
        return;
    }
    if($price == ''){
        echo 'Price field is Empty!';
        return;
    }
    if($purchaseAble == ''){
        echo 'Purchaseable field is Empty!';
        return;
    }

    $artwork['artworkName']= $artworkName;
    $artwork['description']= $description;
    $artwork['price']= $price; 
    $artwork['purchaseAble']= $purchaseAble;

    $up = updateArtwork($artwork);
    if($up == True) {
        echo 'Artwork has been Updated!';
    }


?>
