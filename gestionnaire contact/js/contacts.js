var NewContact = {
	init: function (Lname, Fname) {
		this.Nom = Lname;
		this.Prenom = Fname;
	},

	decrire: function () {
        return "Nom : " + this.Nom + ", Prenom : " + this.Prenom;
	}
};

var ContactList = [];

var info = "1 : afficher la liste de contact \n" +
	"2 : ajouter à la liste de contact \n" +
	"0 : quitter";

while (true) {
	console.log(info);
	var choix = Number(prompt("introduire choix"));
	if (choix === 1) {
		console.log("Voici la liste de vos contacts : ");

		if (ContactList.length === 0) {
			console.log("vous n'avez pas de contact.");
		} else {
			var i;
			for (i = 0; i < ContactList.length; i++) {
				var liste = ContactList[i].decrire();
				console.log("   " + liste);
			}
		}
	} else if (choix === 2) {
		var Lname = prompt("Name");
		var Fname = prompt("Firstname");
		var Contact = Object.create(NewContact);
		Contact.init(Lname, Fname);
		ContactList.push(Contact);

	} else if (choix === 0) {
		break;
	}
}
