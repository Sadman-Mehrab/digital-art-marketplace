function retrieveNotifications(){
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controllers/retrieveNotifications.php', true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let notifications =  JSON.parse(this.responseText);
            let notificationContent = "";
            for(let i=0;i<notifications.length;i++){
                notificationContent += `<b> ${notifications[i].description} </b> | ${notifications[i].time}  | <button id='${notifications[i].id}' onclick='deleteNotification(event)'>Delete</button> <hr>`;
            }
            document.getElementById('notifications').innerHTML = notificationContent;
        }
    }

    xhttp.send();
}

function deleteNotification(event){
    let notificationId = event.target.id;

    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controllers/deleteNotification.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            retrieveNotifications(); 
        }

    }

    xhttp.send('id=' + notificationId);
}

retrieveNotifications();