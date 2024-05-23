<?php
    // session_start();
    require_once('sessionCheck.php');
    require_once("../models/userModel.php");
    require_once("../models/artworkModel.php");
    $password = $_REQUEST['password'];
    $id = $_REQUEST['id'];
    $currentUserName = $_SESSION['currentUserName'];
    $user=getUser($currentUserName);
    $artwork = getArtwork($id);


    if($password == $user['password'])
    {
        deleteArtwork($id);
        unlink($artwork['image']);
        echo 'Successfully Deleted!';
    }
    else{
        echo 'Wrong Password!';
    }
?>