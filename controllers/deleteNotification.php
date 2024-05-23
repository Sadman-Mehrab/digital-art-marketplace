<?php
    // session_start();
    require_once('sessionCheck.php');
    require_once('../models/notificationModel.php');
    $id = $_REQUEST['id'];



    if(!$id){
        echo "Empty ID!";
    }
    else{
        $status = deleteNotification($id);
        if(!$status){
            echo "Notification Delete Fail!";
        }
        else{
            echo "Notification Deleted!";
            // header("location: ../views/notifications.php");
        }

    }
?>