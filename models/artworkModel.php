<?php

    require_once('db.php');
    
    
    function addArtwork($artwork){
        $con = getConnection();
        $addingDate = $artwork['addingDate'];
        $artistName = $artwork['artistName'];
        $artworkName = $artwork['artworkName'];
        $description = $artwork['description'];
        $id = $artwork['id'];
        $image = $artwork['image'];
        $likes = $artwork['likes'];
        $ownerName = $artwork['ownerName'];
        $price = $artwork['price'];
        $purchaseAble = $artwork['purchaseAble'];

        $sql = "insert into Artworks (addingDate, artistName, artworkName, description, id, image, likes, ownerName, price, purchaseAble) values ('{$addingDate}','{$artistName}', '{$artworkName}', '{$description}', '{$id}', '{$image}', {$likes}, '{$ownerName}', {$price}, '{$purchaseAble}')";

        $result = mysqli_query($con, $sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    function getUserArtworks($ownerName){
        $con = getConnection();
        $sql = "select * from Artworks where ownerName='{$ownerName}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        return $result;
    }
    
    


?>