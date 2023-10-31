<?php
require_once('../models/userModel.php');
$username = $_REQUEST['username'];
$user = getUser($userName);

$con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
$sql = "select * from users";
$result = mysqli_query($con, $sql);
$users = mysqli_fetch_array($result);


?>

<html>
<header>
    <title>Home</title>
</header>

<body>
    <form method="post" action="" enctype="">
        <table width="100%">
            <tr>
                <td colspan="8"><img src="img/head.PNG"></td>
                <td><input type="submit" name="" value="<? echo $user['userName'] ?>"><input type="submit" name=""
                        value="..."></td>
            </tr>
            <tr>
                <td colspan="8">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Trending Artists</h3>
                </td>
            </tr>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <center><img src="<?php echo $users['profilePicture'] ?>" width="70%" height="70%"><br><input
                                type="submit" name="" value="<?php $users[username] ?>"></center>
                    </td>
                    <td>
                        <center><img src="<?php echo $users['profilePicture'] ?>" width="70%" height="70%"><br><input
                                type="submit" name="" value="<?php $users[username] ?>" </center>
                    </td>
                    <td>
                        <center><img src="<?php echo $users['profilePicture'] ?>" width="70%" height="70%"><br><input
                                type="submit" name="" value="<?php $users[username] ?>" </center>
                    </td>
                    <td>
                        <center><img src="<?php echo $users['profilePicture'] ?>" width="70%" height="70%"><br><input
                                type="submit" name="" value="<?php $users[username] ?>" </center>
                    </td>
                    <td>
                        <center><img src="<?php echo $users['profilePicture'] ?>" width="70%" height="70%"><br><input
                                type="submit" name="" value="<?php $users[username] ?>" </center>
                    </td>
                    <td>
                        <center><img src="<?php echo $users['profilePicture'] ?>" width="70%" height="70%"><br><input
                                type="submit" name="" value="<?php $users[username] ?>" </center>
                    </td>
                    <td>
                        <center><img src="<?php echo $users['profilePicture'] ?>" width="70%" height="70%"><br><input
                                type="submit" name="" value="<?php $users[username] ?>" </center>
                    </td>
                    <td>
                        <center><img src="<?php echo $users['profilePicture'] ?>" width="70%" height="70%"><br><input
                                type="submit" name="" value="<?php $users[username] ?>" </center>
                    </td>


                </tr>
            <?php } ?>

            <tr>
                <td colspan="8">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Trending Arts</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <center><img src="img/art.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist"><br><input type="submit" name="" value="Owner"><br>
                        ArtCoin
                    </center>
                </td>
                <td>
                    <center><img src="img/art.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist"><br><input type="submit" name="" value="Owner"><br>
                        ArtCoin
                    </center>
                </td>
                <td>
                    <center><img src="img/art.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist"><br><input type="submit" name="" value="Owner"><br>
                        ArtCoin
                    </center>
                </td>
                <td>
                    <center><img src="img/art.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist"><br><input type="submit" name="" value="Owner"><br>
                        ArtCoin
                    </center>
                </td>
                <td>
                    <center><img src="img/art.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist"><br><input type="submit" name="" value="Owner"><br>
                        ArtCoin
                    </center>
                </td>
                <td>
                    <center><img src="img/art.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist"><br><input type="submit" name="" value="Owner"><br>
                        ArtCoin
                    </center>
                </td>
                <td>
                    <center><img src="img/art.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist"><br><input type="submit" name="" value="Owner"><br>
                        ArtCoin
                    </center>
                </td>
                <td>
                    <center><img src="img/art.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist"><br><input type="submit" name="" value="Owner"><br>
                        ArtCoin
                    </center>
                </td>
            </tr>

            <tr>
                <td colspan="8">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Newly Uploaded for Auction</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <center><img src="img/newly.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist">
                    </center>
                </td>
                <td>
                    <center><img src="img/newly.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist">
                    </center>
                </td>
                <td>
                    <center><img src="img/newly.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist">
                    </center>
                </td>
                <td>
                    <center><img src="img/newly.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist">
                    </center>
                </td>
                <td>
                    <center><img src="img/newly.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist">
                    </center>
                </td>
                <td>
                    <center><img src="img/newly.PNG" width="70%" height="70%"><br>
                        <input type="submit" name="" value="Artist">
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="9">
                    <center>Copyright 2023</center>
                </td>
            </tr>

    </form>
    </table>
</body>

</html>