<?php
    // session_start();
    require_once('sessionCheck.php');
    require_once('../models/chatModel.php');
    $sender = $_SESSION['currentUserName'];
    $receiver = $_REQUEST['receiver'];
    $message = $_REQUEST['message'];

    if(!$sender || !$receiver){
        echo "Empty Sender Or Receiver!";
    }
    else{
        if($message == ""){
            echo "You Cannot Send An Empty Message!";
        }

        else{
            $status = sendMessage($sender, $receiver, $message);
            
            if(!$status){
                echo "Message Send Fail!";
            }
            else{
                echo "Message Sent!";
            }
        }
    }

    
?>