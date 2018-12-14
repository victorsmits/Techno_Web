// Affichage
function display(sData) {
    let cp = document.getElementById('CP');
    console.log(cp.value);

    let jsonObj = JSON.parse(sData);
    document.getElementById("Cities").innerHTML = "";
    for (i = 0; i < jsonObj.length; i++) {
        if (jsonObj[i]["zip"] === cp.value) {
            console.log(jsonObj[i]);
            document.getElementById("Zip").innerHTML = cp.value + " :";
            document.getElementById("Cities").innerHTML += "<li>" + jsonObj[i]["name"] + "</li>";
        }
    }
}
// Communication serveur
function request(appel) {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            appel(xhr.responseText);
        }
    };

    xhr.open("GET", "cities.json", true);
    xhr.send();
}