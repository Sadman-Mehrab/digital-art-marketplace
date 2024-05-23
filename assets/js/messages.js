
function sendMessage() {
    let receiver = document.getElementById('receiver').value;
    let message = document.getElementById('message').value;

    if (message == "") {
        alert("You Cannot Send An Empty Message!");
        return false;
    }

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controllers/sendMessage.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            retrieveMessages();
            document.getElementById('message').value = "";
        }
    }

    xhttp.send('receiver=' + receiver + '&message=' + message);

}

function retrieveMessages() {
    let receiver = document.getElementById('receiver').value;

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controllers/retrieveMessages.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let messages = JSON.parse(this.responseText);
            let messageContent = "";
            for (let i = 0; i < messages.length; i++) {
                messageContent += `<tr >
                                        <td><img src="${messages[i].profilePicture}" class="messageProfilePicture"></td>
                                        <td><b> ${messages[i].userName}: </b></td> 
                                        <td>${messages[i].message}</td> 
                                  </tr>`;
            }

            document.getElementById('messages').innerHTML = messageContent;
        }
    }

    xhttp.send('receiver=' + receiver);

}

retrieveMessages();