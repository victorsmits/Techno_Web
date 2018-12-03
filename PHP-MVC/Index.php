<?php
Session_start();
// import the controller
require ('Controller.php');

// check if cart already exist in the current session
if(empty($_SESSION['Cart'])){
    NewShopCart();
}

// import the view of the ca
if(empty($_POST)& empty($_GET) | isset($_POST['back'])){
    Home();
}

// Select the Formation depending on the clicked button
if(isset($_POST["Course"])) {
    ShowClasses();
}

// add de current display formation to the session's cart
if(isset($_POST['add'])) {
    if ($_POST['add'] == 'Buy') {
        BuyClasse();
    }
}

// display the session's cart
if(isset($_POST['Cart'])){
    if($_POST['Cart']=='Cart') {
        Cart();
    }
}

// Use DelFormation from cart object to erase it from the session cart
if(isset($_POST['del'])){
    DelClasse();
}

// Use ChangeQty from the cart object to change de qty of formation
if(isset($_POST ['Selected']) & isset($_POST['qty'])){
    UpdateQty();
}

// Empty the session's cart
if(isset($_POST['empty'])){
    if($_POST['empty'] == 'empty'){
        EmptyCart();
    }
}

// insert footer
require_once('View/Footer.php');