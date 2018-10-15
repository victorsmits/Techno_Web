var NewContact = {
    init: function (Lname, Fname) {
        this.Nom = Lname;
        this.Prenom = Fname;
    },

    decrire: function () {
        var description = "Nom : " + this.Nom + ", Prenom : " + this.Prenom;
        return description;
    }
};

var ContactList = [];

var info = "1 : afficher la liste de contact" + "\n" + "2 : ajouter à la liste de contact" + "\n" + "0 : quitter";
console.log(info);
while (true) {
    var choix = Number(prompt("introduire choix"));
    if (choix === 1) {
        console.log("Voici la liste de vos contacts : ");
        if (ContactList.length === 0) {
            console.log("vous n'avez pas de contact.")
        } else {
            for (var i = 0; i < ContactList.length; i++) {
                var liste = ContactList[i].decrire();
                console.log("   " + liste);
            }
        }
    } else if (choix === 2) {
        var Lname = prompt("Name");
        var Fname = prompt("Firstname");
        var Contact = Object.create(NewContact);
        Contact.init(Lname, Fname);
        ContactList.push(Contact)

    } else if (choix === 0) {
        break;
    }
    console.log(info);
}
