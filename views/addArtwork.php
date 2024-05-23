<?php
    require_once('../controllers/sessionCheck.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artwork</title>
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


        <h2>Add Artwork</h2>
        
        <form action="../controllers/addArtworkCheck.php" method="post" enctype="multipart/form-data" onsubmit="return validate()">
        <div id="imagePreview" hidden >
            <img class="artwork" id="uploadedImagePreview" src="" alt="" >
        </div>
        <table class="generalText">
            <tr>
                <td>
                    <b>Image</b> 
                </td>
                <td>:
                <input type="file" accept="image/*" id="uploadedImage" name="uploadedImage" onchange="showUploadedPicture()">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Name</b> 
                </td>
                <td>:
                    <input type="text" id="artworkName" name="artworkName" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Description</b> 
                </td>
                <td>:
                    <textarea name="artworkDescription" id="artworkDescription" cols="20" rows="2" ></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Price</b> 
                </td>
                <td>:
                    <input type="number" id="artworkPrice"  name="artworkPrice" value="0">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Purchaseable</b> 
                </td>
                <td>:
                    <input type="radio" name="artworkPurchaseable" id="Yes" value="Yes" > Yes
                    <input type="radio" name="artworkPurchaseable" id="No" value="No"> No
                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="submit" name= "submit" value="Add Artwork">
                </td>
            </tr>
        </table>
    </form>
</center>
<script src="../assets/js/addArtwork.js"></script>
</body>
</html>