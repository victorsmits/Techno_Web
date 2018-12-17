<?php
Session_start();
require ("Controller.php");
require ('View/Header.php');

if(empty($_POST)){
    require ('View/NewRoom.php');
}

if(empty($_SESSION['House'])){
    HouseCreation();
}

if(isset($_POST["Enregistrer"])){
    if($_POST["Enregistrer"] == "Enregistrer"){
        RoomCreation();
    }
}

if(isset($_POST["recommencer"])){
    if($_POST["recommencer"] == "recommencer"){
        HouseCreation();
        require ('View/NewRoom.php');

    }
}

if(isset($_POST["terminer"])){
    if($_POST["terminer"] == "terminer"){
        ShowHouse();
    }
}

if(isset($_POST["Back"])){
    if($_POST["Back"] == "Back"){
        require ('View/NewRoom.php');
    }
}