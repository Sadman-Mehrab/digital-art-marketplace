<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/notificationModel.php');
    $userName = $_SESSION['currentUserName'];
    $notifications = getUserNotifications($userName);

    $notificationsResults = [];

    while($notification = mysqli_fetch_assoc($notifications)){ 
        array_push($notificationsResults, $notification);
    }

    echo json_encode($notificationsResults);
?>