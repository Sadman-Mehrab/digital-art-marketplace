<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/chatModel.php');
    require_once('../models/userModel.php');

    $sender = $_SESSION['currentUserName'];
    $receiver = $_REQUEST['receiver'];

    $messages = getMessages($sender, $receiver);
    $senderUser = getUser($sender);
    $receiverUser = getUser($receiver);
    
    $messagesResult = [];

    while($message = mysqli_fetch_assoc($messages)){ 
        $messageResult = [];
        if($message['sender'] == $receiver){
            $messageResult['profilePicture'] = $receiverUser['profilePicture'];
            $messageResult['userName'] = $receiver;
            $messageResult['message'] = $message['message'];
        }
        else if($message['sender'] == $sender){
            $messageResult['profilePicture'] = $senderUser['profilePicture'];
            $messageResult['userName'] = $sender;
            $messageResult['message'] = $message['message'];
        }

        array_push($messagesResult, $messageResult);

            
    }
    echo json_encode($messagesResult);
?>