<?php
    // session_start();
    require_once('sessionCheck.php');
    require_once('../models/artworkModel.php');
    require_once('../models/notificationModel.php');
    $currentUserName = $_SESSION['currentUserName'];
    
    $artworkName = $_REQUEST['artworkName'];
    $artworkDescription = $_REQUEST['artworkDescription'];
    $artworkPrice = $_REQUEST['artworkPrice'];
    $artworkPurchaseable = $_REQUEST['artworkPurchaseable'];
    $artworkId = uniqid();
    $artworkArtistName = $currentUserName;
    $artworkOwnerName = $currentUserName;
    $artworkFileName = "";
    $artworkAddingDate = date("Y-m-d");
    $artworkViews = 0;

    
    $imageSource = $_FILES['uploadedImage']['tmp_name'];
    $imageDestination = "../assets/artworks/".$_FILES['uploadedImage']['name'];

    if(!$imageSource){
        echo 'Please Add An Image!';
        return;
    }

    $isArtworkUploadValid = false;
    $isArtworkNameValid = true;
    $isArtworkDescriptionValid = true;
    $isArtworkPriceValid = true;
    $isArtworkPurchaseableValid = true;
    
    if($artworkPrice <= 0){
        echo 'Price Must Be Greater Than 0!';
        $isArtworkPriceValid = false;
    }
    
    if($artworkName == ""){
        echo 'Arwork Name Cannot Be Empty!';
        $isArtworkNameValid = false;
    }
    
    if($artworkDescription == ""){
        echo 'Arwork Description Cannot Be Empty!';
        $artworkDescription = false;
    }
    if($artworkPurchaseable != "Yes" && $artworkPurchaseable != "No"){
        
        echo 'Must Select Purchaesable: Yes or Purchaseable: No!';
        $isArtworkPurchaseableValid = false;
    }
    
    
    if(move_uploaded_file($imageSource, $imageDestination)){
        $artworkExtension = pathinfo($imageDestination)['extension'];
        $artworkFileName = "../assets/artworks/".$artworkId.".".$artworkExtension;
        
        if(rename($imageDestination,$artworkFileName)){
            $isArtworkUploadValid = true;
        }
        else{
            echo 'Arwork Upload Error!';         
        }
    }
    else{
        echo 'Arwork Upload Error!';         
    }
        

    if($isArtworkUploadValid && $isArtworkNameValid && $isArtworkPriceValid && $isArtworkDescriptionValid && $isArtworkPurchaseableValid){
        $artwork = [
                    'addingDate' => $artworkAddingDate,
                    'artistName' => $artworkArtistName,
                    'artworkName' => $artworkName,
                    'description' => $artworkDescription,
                    'id' => $artworkId,
                    'image' => $artworkFileName,
                    'views' => $artworkViews,
                    'ownerName' => $artworkOwnerName,
                    'price' => $artworkPrice,
                    'purchaseAble' => $artworkPurchaseable
                   ];
        $status = addArtwork($artwork);
        if($status){
            echo 'Artwork Successfuly Added!';
            createNotification($currentUserName, "Artwork: {$artwork['artworkName']} Added With Price: {$artwork['price']} ArtCoin");
            header("location: ../views/user.php");
        }else{
            echo 'Artwork Add Unsuccessful!';
        }
    }
?>