var NewContact = {
    Nom: "",
    Prenom: "",
};

var Contact1 = Object.create(NewContact);
Contact1.Nom = "Smits";
Contact1.Prenom = "Victor";

console.log(Contact1.Nom);
