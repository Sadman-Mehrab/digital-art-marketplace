function showUpdateProfilePicture(){
    let profilePicture = document.getElementById('profilePicture');
    if(profilePicture.files.length != 0){
        document.getElementById('currentProfilePicture').src = URL.createObjectURL(profilePicture.files[0]);
    }
}

function checkDuplicateUserName(){
    let userName = document.getElementById('userName').value;
    let currentUserName = document.getElementById('currentUserName').value;

    if(userName == currentUserName){
        document.getElementById('isNewUserNameValid').value = "True";
    }
    
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controllers/checkDuplicateUserName.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            if(response.message == 'True'){
                alert(`Username: ${userName} Already Exists`);
                document.getElementById('isNewUserNameValid').value = "False";
            }else{
                document.getElementById('isNewUserNameValid').value = "True";
            }
        }
    }

    xhttp.send('userName=' + userName);
}

function checkDuplicateEmail(){
    let email = document.getElementById('email').value;
    let currentEmail = document.getElementById('currentEmail').value;

    if(email == currentEmail){
        document.getElementById('isNewEmailValid').value = "True";
    }
    
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controllers/checkDuplicateEmail.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            if(response.message == 'True'){
                alert(`Email: ${email} Already Exists`);
                document.getElementById('isNewEmailValid').value = "False";
            }else{
                document.getElementById('isNewEmailValid').value = "True";
            }
        }
    }

    xhttp.send('email=' + email);
}

function validate(){
    let userName = document.getElementById('userName').value;
    let firstName = document.getElementById('firstName').value;
    let lastName = document.getElementById('lastName').value;
    let isNewUserNameValid = document.getElementById('isNewUserNameValid').value;
    let isNewEmailValid = document.getElementById('isNewEmailValid').value;

    let email = document.getElementById('email').value;
    let phoneNumber = document.getElementById('phoneNumber').value;

    let password = document.getElementById('password').value;
    let newPassword = document.getElementById('newPassword').value;
    let retypePassword = document.getElementById('retypePassword').value;
    let currentPassword = document.getElementById('currentPassword').value;

    let isMaleSelected = document.getElementById('Male').checked;
    let isFemaleSelected = document.getElementById('Female').checked;
    let isOtherSelected = document.getElementById('Other').checked;
    
    let isUserSelected = document.getElementById('User').checked;
    let isArtistSelected = document.getElementById('Artist').checked;
    
    if(isNewUserNameValid == "False"){
        alert(`Username: ${userName} Already Exists`);
        return false;
    }

    if(isNewEmailValid == "False"){
        alert(`Email: ${email} Already Exists`);
        return false;
    }

    if(userName.length < 5){
        alert('Username Must Be Atleast 5 Letters Long');
        return false;
    }

    if(firstName.length < 5){
        alert('First Name Must Be Atleast 5 Letters Long');
        return false;
    }

    if(lastName.length < 5){
        alert('Last Name Must Be Atleast 5 Letters Long');
        return false;
    }

    if(email == ""){
        alert("Email Cannot Be Empty");
        return false;

    }

    if(!(email.includes('@') && email.includes('.') &&  email.indexOf('@') + 1 < email.indexOf('.') && email.indexOf('@') != email.length - 1 && email.indexOf('.') != email.length - 1 && email.length >= 4 )){
        alert("Email Must Be Of Valid Format");
        return false;
    }

    if(phoneNumber.length != 11){
        alert('Phone Number Must Be 11 Letters Long');
        return false;
    }


    if(password == ""){
        alert("Please Enter Current Password");
        return false;
    }
    
    
    if(currentPassword != password){
        alert("You Entered The Incorrect Password");
        return false;
    }
    
    if(newPassword != "" || retypePassword != ""){
        
        if(newPassword.length < 8){
            alert("New Password Must Be Atleast 8 Letters Long");
            return false;
        }
           
        if(retypePassword.length < 8){
            alert("Retyped Password Must Be Atleast 8 Letters Long");
            return false;
    
        }
    
        if(newPassword != retypePassword){
            alert("New Password and Retyped Passwords Do Not Match");
            return false;
        }

    }
        
    

    if(!isMaleSelected && !isFemaleSelected && !isOtherSelected){
        alert("Please Select A Gender!");
        return false;
    }

    if(!isUserSelected && !isArtistSelected){
        alert("Please Select A Type!");
        return false;
    }


    return true;

}

    
    