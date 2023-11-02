<?php

    require_once('db.php');



    function getUserArtworks($ownerName){
        $con = getConnection();
        $sql = "select * from Artworks where ownerName='{$ownerName}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        return $result;
    }
    
    


?>