function Change_Language(sData){

    let doc = JSON.parse(sData);
    let trans = doc["sentences"][0]["trans"];
    let ori = doc["sentences"][0]["orig"];
    let titles = document.getElementById("titleslist").innerHTML.split(",");
    let i =  titles.indexOf(ori).toString();
    console.log(doc);
    document.getElementById(i).innerHTML = trans;

}

function request(appel) {
    let titles = document.getElementById("titleslist").innerHTML.split(",");
    for(i = 0; i<titles.length;i++){
        let xhr = new XMLHttpRequest();
        let url = "http://laboweb.ecam.be/translate/index.php?";
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                appel(xhr.responseText);
            }
        };

        if(titles[i] !=="") {
            let Language = document.getElementById("Language").value;
            url += "target=" + Language;
            url += "&term=" + titles[i];

            xhr.open("GET", url, true);
            xhr.send();
        }
    }
}