function validate(){
        
    let artworkName = document.getElementById('artworkName').value;
    let artworkPrice = document.getElementById('artworkPrice').value;
    let artworkDescription = document.getElementById('artworkDescription').value;
    let isYesSelected = document.getElementById('Yes').checked;
    let isNoSelected = document.getElementById('No').checked;
    let uploadedImage = document.getElementById('uploadedImage');
    
    if(uploadedImage.files.length == 0){
        alert("Please Select a Picture!");
        return false;
    }
    
    if(artworkName.length <5){
        alert("Artwork Name Must Be Atleast 5 Letters Long");
        return false;
    }

    if(artworkDescription === ""){
        alert("Artwork Description Cannot Be Empty!");
        return false;
    }

    if(artworkPrice <= 0){
        alert("Artwork Price Must Be Greater Than 0!");
        return false;
    }

    if(!isYesSelected && !isNoSelected){
        alert("Must Select: Purchaseable or Not Purchaseable!");
        return false;
    }
    
    return true;   

}

function showUploadedPicture(){
    let uploadedImage = document.getElementById('uploadedImage');
    if(uploadedImage.files.length != 0){
        document.getElementById('uploadedImagePreview').src = URL.createObjectURL(uploadedImage.files[0]);
        document.getElementById('imagePreview').removeAttribute("hidden");
    }


}