<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/chatModel.php');
    require_once('../models/userModel.php');
    
    $senderUserName = $_SESSION['currentUserName'];
    $receiverUserName = $_REQUEST['userName'];

    if($senderUserName == $receiverUserName){
        echo "You Cannot Send Messages To Yourself!";
        return;
    }
    
    $sender = getUser($senderUserName);
    $receiver = getUser($receiverUserName);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Chat With ".$receiver['userName'] ?></title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>
    <center>
        <table width="100%">
                <tr>
                    <td colspan="8"><a href=homepage.php><img src="../assets/head.PNG"></a></td>
                    <td>
                        <a href="user.php" >
                            User
                        </a><br>
                        <a href="menu.html" >
                            Menu
                        </a>
                    </td>
                </tr>
            </table>
        <table>


        <h2><?php echo $receiver['userName'] ?></h2>
        
        <p class="generalText">(This Is The Beginning Of This Conversation)</p>
        <table id="messages" class="generalText"></table>
                
        <input hidden type="text" id="receiver" name="receiver" value="<?php echo $receiver['userName']?>">
        <input hidden type="text" id="sender" name="sender" value="<?php echo $sender['userName']?>">
        <input type="text" name="message" id="message" value="" id="message">
        <input type="button" name="submit" value="Send" onclick="return sendMessage()">
    
        
        </center>
        
        <script src="../assets/js/messages.js"></script>

</body>
</html>