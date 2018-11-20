<?php
Session_start();
require_once ('Model/PanierModel.php');
require_once ('Model/FormaModel.php');
require_once ('init.php');


if($_SESSION['cart'] == null){
    $Session_cart = new Cart();
    $_SESSION['cart'] = serialize($Session_cart);
}

if(!isset($_POST['forma'])){
require_once('View/CatalogView.php');
}

if(isset($_POST['forma'])) {
    switch ($_POST['forma']){
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
    $_SESSION['Forma'] = serialize($Formation);
    $vars = (array)$Formation;
    require ('View/FormaView.php');
}
if(isset($_POST['add'])){
    if($_POST['add']=='add'){
        $session_forma = unserialize($_SESSION['Forma']);
        $cart = unserialize($_SESSION['cart']);
        $cart->AddToCart($session_forma);
        print_r($cart->CartArray);
        $var = (array)$session_forma;
        $price = (int)$var['Price'];
        $cart->TotalCount($price);

        $_SESSION['cart'] = serialize($cart);
    }
//    if($_POST['add']== 'back'){
//        require('View/CatalogView.php');
//    }
}

if(isset($_POST['cart'])){
    if($_POST['cart']=='cart') {
        $shopcart = unserialize($_SESSION['cart']);
        print_r($shopcart);
        // TODO unserialize cart
        require('View/PanierView.php');
    }
}
if(isset($_POST['empty'])){
    if($_POST['empty'] == 'empty'){
        $Session_cart = new Cart();
        $_SESSION['cart'] = serialize($Session_cart);
    }
}
