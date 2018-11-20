<?php
Session_start();
require_once ('init.php');

if(empty($_SESSION['Cart'])){
    $Session_cart = new Cart();
    $_SESSION['Cart'] = serialize($Session_cart);
}

if(!isset($_POST["Course"])& !isset($_POST['Cart'])){
require_once('View/CatalogView.php');
}

if(isset($_POST["Course"])) {
    switch ($_POST["Course"]){
        case 'PHP':
            $Formation = $FormaPHP;
            break;
        case 'JAVA':
            $Formation = $FormaJAVA;
            break;
        case 'AJAX':
            $Formation = $FormaAJAX;
            break;
    }
    $_SESSION['Forms'] = serialize($Formation);
    $vars = (array)$Formation;
    require('View/CourseView.php');
}
if(isset($_POST['add'])) {
    if ($_POST['add'] == 'Buy') {
        $Session_Course = unserialize($_SESSION['Forms']);
        $cart = unserialize($_SESSION['Cart']);
        $cart->AddToCart($Session_Course);
        $_SESSION['Cart'] = serialize($cart);
    }
}
if(isset($_POST['Cart'])){
    if($_POST['Cart']=='Cart') {
        $Shop_Cart = unserialize($_SESSION['Cart']);
        require('View/CartView.php');
    }
}
if(isset($_POST['empty'])){
    if($_POST['empty'] == 'empty'){
        $Session_cart = new Cart();
        $_SESSION['Cart'] = serialize($Session_cart);
    }
}
require_once('View/Footer.php');