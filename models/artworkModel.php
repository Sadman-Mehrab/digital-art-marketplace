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
        $views = $artwork['views'];
        $ownerName = $artwork['ownerName'];
        $price = $artwork['price'];
        $purchaseAble = $artwork['purchaseAble'];

        $sql = "insert into Artworks (addingDate, artistName, artworkName, description, id, image, views, ownerName, price, purchaseAble) values ('{$addingDate}','{$artistName}', '{$artworkName}', '{$description}', '{$id}', '{$image}', {$views}, '{$ownerName}', {$price}, '{$purchaseAble}')";

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
    
    function getArtwork($id){
        $con = getConnection();
        $sql = "select * from Artworks where id='{$id}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        $artwork = mysqli_fetch_assoc($result);
        return $artwork;
    }

    

    function updateArtwork($artwork){
        $con = getConnection();
        
        $addingDate = $artwork['addingDate'];
        $artistName = $artwork['artistName'];
        $artworkName = $artwork['artworkName'];
        $description = $artwork['description'];
        $id = $artwork['id'];
        $image = $artwork['image'];
        $views = $artwork['views'];
        $ownerName = $artwork['ownerName'];
        $price = $artwork['price'];
        $purchaseAble = $artwork['purchaseAble'];
        
        $sql = "update Artworks set addingDate = '{$addingDate}', artistName = '{$artistName}', artworkName = '{$artworkName}', description = '{$description}', id = '{$id}', image = '{$image}', views = {$views}, ownerName = '{$ownerName}', price = {$price}, purchaseAble = '{$purchaseAble}' where id = '{$id}'";
        $result = mysqli_query($con, $sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }
    
    function updateOwnerName($ownerName, $ownerNameNew){
        $con = getConnection();
        
        $sql = "update Artworks set ownerName = '{$ownerNameNew}' where ownerName = '{$ownerName}'";
        $result = mysqli_query($con, $sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }
    
    function updateArtistName($artistName, $artistNameNew){
        $con = getConnection();

        $sql = "update Artworks set artistName = '{$artistNameNew}' where artistName = '{$artistName}'";
        $result = mysqli_query($con, $sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

    function deleteArtworksByUser($userName){
        $con = getConnection();
        $sql = "delete from Artworks where ownerName = '{$userName}'";
        $result = mysqli_query($con, $sql);
        
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

    function getArtworkWithId($artId){
        $con = getConnection();
        $sql = "select * from Artworks where id='{$artId}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        // $art = mysqli_fetch_assoc($result);
        return $result;
    }

    function getTrendingArtwork(){
        $con = getConnection();
        $sql = "select * from Artworks order by views desc";
        $result = mysqli_query($con, $sql);
        if(!$result) {
            return NULL;
        }
        return $result;
    }

    function getNewArtwork(){
        $con = getConnection();
        $sql = "select * from Artworks order by addingDate desc";
        $result = mysqli_query($con, $sql);
        if(!$result) {
            return NULL;
        }
        return $result;
    }

    function deleteArtwork($id){
        $con = getConnection();
        $sql = "delete from artworks where id='{$id}'";
        $result = mysqli_query($con, $sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
?>