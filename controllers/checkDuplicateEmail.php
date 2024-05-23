<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/userModel.php');

    $email = $_REQUEST['email'];
    $status = checkDuplicateEmail($email);
    if($status){
        echo json_encode(['message' => 'True']); 
    }else{
        echo json_encode(['message' => 'False']); 
    }



?>