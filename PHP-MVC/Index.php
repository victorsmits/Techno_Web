<?php
Session_start();
// import init.php --> initialize formation and global import of php file
require ('Controller.php');

// check if cart already exist in the current session
if(empty($_SESSION['Cart'])){
    NewShopCart();
}

// import the view of the ca
if(empty($_POST)& empty($_GET) | isset($_POST['back'])){
    Home();
}

// if Course --> Select the Formation depending on the clicked button
if(isset($_POST["Course"])) {
    ShowClasses();
}

// if add button clicked --> add de current display formation to the session's cart
if(isset($_POST['add'])) {
    if ($_POST['add'] == 'Buy') {
        BuyClasse();
    }
}

// if cart button clicked --> display the session's cart
if(isset($_POST['Cart'])){
    if($_POST['Cart']=='Cart') {
        Cart();
    }
}

// if del --> use DelFormation from cart object to erase it from the session cart
if(isset($_POST['del'])){
    DelClasse();
}

// if selected and qty --> use ChangeQty from the cart object to change de qty of formation
if(isset($_POST ['Selected']) & isset($_POST['qty'])){
    UpdateQty();
}

// if empty button clicked --> empty the session's cart
if(isset($_POST['empty'])){
    if($_POST['empty'] == 'empty'){
        EmptyCart();
    }
}

// insert footer
require_once('View/Footer.php');