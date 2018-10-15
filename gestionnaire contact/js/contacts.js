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

var Contact1 = Object.create(NewContact);
Contact1.init("Smits", "Victor")

console.log(Contact1.decrire());
