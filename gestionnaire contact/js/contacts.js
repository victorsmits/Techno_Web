function logcontact() {
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
}
class NewContact {
	init(Lname, Fname) {
		this.Nom = Lname;
		this.Prenom = Fname;
	}

	decrire() {
		return "Nom : " + this.Nom + ", Prenom : " + this.Prenom;
	}

	add(ContactList) {
		let Lname = document.getElementById("Lname").value;
		let Fname = document.getElementById("Fname").value;

		this.init(Lname, Fname);
		ContactList.push(this);
	}
}

let ContactList = [];

function displaycontact() {
	document.getElementById("contact").innerHTML = "";
	if (ContactList.length === 0) {
		document.getElementById("contact").innerHTML += "<div>vous n'avez pas de contact.</div>";
	} else {
		document.getElementById("contact").innerHTML += "<div> Voici la liste de vos contacts : </div>";
		let i;
		for (i = 0; i < ContactList.length; i++) {
			let liste = ContactList[i].decrire();
			document.getElementById("contact").innerHTML += "<li>" + liste + "</li>";
		}
	}
}

function AddNewContact() {
	document.getElementById("contact").innerHTML = "";
	document.getElementById("contact").innerHTML += "<input type='text' id='Fname'></br>";
	document.getElementById("contact").innerHTML += "<input type='text' id='Lname'></br>";
	document.getElementById("contact").innerHTML += "<input type='submit' onclick='addcontact()'>";
}

function addcontact(){
	let Contact = new NewContact();
	Contact.add(ContactList);
	document.getElementById("contact").innerHTML = ""
}