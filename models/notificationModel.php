<?php

    require_once('db.php');
    
    
    function getUserNotifications($userName){
        $con = getConnection();
        $sql = "select * from Notifications where userName='{$userName}' order by time desc";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        return $result;
    }

    function createNotification($userName, $description){
        $con = getConnection();

        $time = date_create()->format('Y-m-d H:i:s');
        $id = uniqid();

        $sql = "insert into Notifications (userName, description, time, id) values ('{$userName}', '{$description}', '{$time}', '{$id}')";

        $result = mysqli_query($con, $sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    function deleteNotification($id){
        $con = getConnection();
        $sql = "delete from Notifications where id = '{$id}'";
        $result = mysqli_query($con, $sql);
        
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

    function deleteNotificationsByUser($userName){
        $con = getConnection();
        $sql = "delete from Notifications where userName = '{$userName}'";
        $result = mysqli_query($con, $sql);
        
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

    function updateNotificationUserName($userName, $userNameNew){
        $con = getConnection();

        $sql = "update Notifications set userName = '{$userNameNew}' where userName = '{$userName}'";
        $result = mysqli_query($con, $sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }


    
?>