function addNewUser() {
    var name = encodeURIComponent(document.getElementById('name').value);
    var sex = encodeURIComponent(document.getElementById('sex').value);
    var age = encodeURIComponent(document.getElementById('age').value);
    var address = encodeURIComponent(document.getElementById('address').value);
    var dateOfBirth = encodeURIComponent(document.getElementById('dateOfBirth').value);

    if (!name || !sex || !age || !address || !dateOfBirth){
        alert('Fill in all required fields!');
    }else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                if (xhr.status == 200) {
                    if (response.success) {
                        showNewUsers(response.user);
                        alert('Succsess: ' + response.message);
                    }else {
                        alert('Error: ' + response.message);
                    }
                }
            }
        };

        xhr.open('GET', '/newUser?name=' + name + '&sex=' + sex + '&age=' + age + '&address=' + address + '&dateOfBirth=' + dateOfBirth, true);
        xhr.send();
    }

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

function searchUser() {
    var searchInput = encodeURIComponent(document.getElementById('searchInput').value);
    console.log(searchInput);
    var xhr = new XMLHttpRequest();

    if (!searchInput){
        alert('Search input is empty!')
    }
    else{
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                    var response = JSON.parse(xhr.responseText);
                    if (xhr.status == 200 && response.success) {
                        document.getElementById("usersTable").innerHTML = response.html;
                        alert('Succsess: ' + response.message);
                    } else {
                        alert('Error: ' + response.message);
                    }
            }
        };
    
        xhr.open('GET', '/searchUser?searchInput=' + searchInput, true);
        xhr.send();
    }
}