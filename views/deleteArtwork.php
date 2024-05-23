<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    $user = $_SESSION['currentUserName'];
    $id = $_REQUEST['id'];

?>
<html>
    <head>
        <title>
            Delete Art
        </title>
    </head>
    <body>
        <form method="post" action="../controllers/deleteArtworkCheck.php">
            <center>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                Enter Password to Delete: <input type="password" name="password" value=""><br><input type="submit" name="submit" value="Submit">
            </center>
        </form>  
    </body>
</html>