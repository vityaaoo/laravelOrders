function addNewUser() {
    var name = encodeURIComponent(document.getElementById('name').value);
    var sex = encodeURIComponent(document.getElementById('sex').value);
    var age = encodeURIComponent(document.getElementById('age').value);
    var address = encodeURIComponent(document.getElementById('address').value);
    var dateOfBirth = encodeURIComponent(document.getElementById('dateOfBirth').value);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4) {
            if (xhttp.status == 200) {
                showNewUsers();
            } else {
                console.error('Error:', xhttp.status);
            }
        }
    };

    xhttp.open('GET', '/newUser?name=' + name + '&sex=' + sex + '&age=' + age + '&address=' + address + '&dateOfBirth=' + dateOfBirth, true);
    xhttp.send();
}

function showNewUsers(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("usersTable").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "/getUsers"); 
    xhr.send();
}