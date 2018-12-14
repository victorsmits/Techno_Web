// Affichage
function display(sData) {
    // Permet d'utiliser les données par la suite
    let doc = sData.documentElement;
    console.log(sData);
    // Récupère les valeurs d'éléments demandés
    let prix = doc.getElementsByTagName("prix")[2];
    let nom = doc.getElementsByTagName("nom")[2];
    let film = doc.getElementsByTagName("film")[2];
    // Affichage
    document.getElementById('Prix').innerHTML = prix.firstChild.nodeValue;
    document.getElementById('Nom').innerHTML = nom.firstChild.nodeValue;
    document.getElementById('Film').innerHTML = film.firstChild.nodeValue;
}

// Communication serveur
function request(appel) {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            appel(xhr.responseXML);
        }
    };

    xhr.open("GET", "cesar.xml", true);
    xhr.send();
}
