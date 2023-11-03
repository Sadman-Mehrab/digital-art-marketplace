<?php
    session_start();
    $userName = $_REQUEST['userName'];
    $password = $_REQUEST['password'];

    $_SESSION['currentUserName'] = $userName;
    header('location: ../views/addArtwork.html');
?>