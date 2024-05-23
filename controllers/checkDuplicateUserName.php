<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/userModel.php');

    $userName = $_REQUEST['userName'];
    $status = checkDuplicateUserName($userName);
    if($status){
        echo json_encode(['message' => 'True']); 
    }else{
        echo json_encode(['message' => 'False']); 
    }



?>