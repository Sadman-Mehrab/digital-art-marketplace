<?php
    require_once('../controllers/sessionCheck.php');
    require_once('../models/userModel.php');
    require_once('../models/artworkModel.php');
    $trendingArtist = getTrendingArtist();
    $trendingArtwork = getTrendingArtwork();
    $newArtwork = getNewArtwork();

?>

<html>
<header>
    <title>Home</title>
</header>

<body>
    <form method="post" action="" enctype="">
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
            
                <tr>
                <?php while ($artist = mysqli_fetch_assoc($trendingArtist)) { ?>
                    <td>
                        <center>
                            <a href="profile.php?userName=<?php echo $artist['userName'] ?>"><img src="<?php echo $artist['profilePicture'] ?>" width="100px"><br></a>
                            <a href="profile.php?userName=<?php echo $artist['userName'] ?>"><?php echo $artist['userName'] ?></a>
                        </center>
                    </td>
                    <?php } ?>
                </tr>
            

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
            <?php while ($artwork = mysqli_fetch_assoc($trendingArtwork)) { ?>
                <td>
                    <center>
                    <a href="artwork.php?id=<?php echo $artwork['id']?>"><img src="<?php echo $artwork['image'] ?>" width="100px"></a><br>
                    <b> <?php echo $artwork['artworkName'] ?> </b>
                    <br>
                    Artist: <a href="profile.php?userName=<?php echo $artwork['artistName'] ?>"><?php echo $artwork['artistName'] ?></a><br>
                    Owner:<a href="profile.php?userName=<?php echo $artwork['ownerName'] ?>"><?php echo $artwork['ownerName'] ?></a><br>
                    Price: <?php echo $artwork['price'] ?>
                    </center>
                </td>
            <?php } ?>
            </tr>
            

            <tr>
                <td colspan="8">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Newly Uploaded Artworks</h3>
                </td>
            </tr>
            
            <tr>
            <?php while ($newArt = mysqli_fetch_assoc($newArtwork)) { ?>
                <td>
                    <center>
                    <a href="artwork.php?id=<?php echo $newArt['id']?>"><img src="<?php echo $newArt['image'] ?>" width="100px"></a><br>
                    <b> <?php echo $newArt['artworkName'] ?> </b><br>
                    Artist:<a href="profile.php?userName=<?php echo $newArt['artistName'] ?>"><?php echo $newArt['artistName'] ?></a>
                    </center>
                </td>
            <?php } ?>
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