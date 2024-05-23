<?php
    require_once('../models/userModel.php');
    require_once('sessionCheck.php');
    $userName = $_REQUEST['userName'];
    $user = getUser($userName);

    if($user == true){
        echo "
        <html>
            <header>
                <title>
                    Search
                </title>
            </header>
            <body>
                <center>
                    <a href='../views/profile.php?userName={$userName}'>{$userName}</a>
                </center>
            </body>
        </html>";
    }
?>