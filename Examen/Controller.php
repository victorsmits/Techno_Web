<?php
require ("Model/Room.php");
require ("Model/House.php");

function HouseCreation(){
    $House = new House();
    $_SESSION['House'] = serialize($House);
}
function RoomCreation(){
    if(!empty($_POST["room"]) && !empty($_POST["Longueur"]) && !empty($_POST["Largeur"])){
        $Room = new Room($_POST["room"],$_POST["Longueur"],$_POST["Largeur"]);
        $house = unserialize($_SESSION['House']);
        $house->AddRoom($Room);
        $_SESSION['House'] = serialize($house);
    }
    else{
        echo "<script type='application/javascript'>alert('Missing attribute!')</script>";
    }
    require ('View/NewRoom.php');
}

function ShowHouse(){
    require ("View/HouseView.php");
}