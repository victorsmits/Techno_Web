<?php
Session_start();
// import init.php --> initialize formation and global import of php file
require_once ('init.php');

// check if cart already exist in the current session
if(empty($_SESSION['Cart'])){
    $Session_cart = new Cart();
    $_SESSION['Cart'] = serialize($Session_cart);
}

// import the view of the ca
if(empty($_POST)& empty($_GET) | isset($_POST['back'])){
    require('View/CatalogView.php');
}

// if Course --> Select the Formation depending on the clicked button
if(isset($_POST["Course"])) {
    // check wich formation has been clicked on
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
    $_SESSION['Forms'] = serialize($Formation); // Stock the selected formation in session
    require('View/CourseView.php'); // display the selected formation
}

// if add button clicked --> add de current display formation to the session's cart
if(isset($_POST['add'])) {
    if ($_POST['add'] == 'Buy') {
        $Session_Course = unserialize($_SESSION['Forms']);
        $cart = unserialize($_SESSION['Cart']);
        $cart->AddToCart($Session_Course);
        $_SESSION['Cart'] = serialize($cart);
        require('View/CatalogView.php');
    }
}

// if cart button clicked --> display the session's cart
if(isset($_POST['Cart'])){
    if($_POST['Cart']=='Cart') {
        require('View/CartView.php');
    }
}

// if del --> use DelFormation from cart object to erase it from the session cart
if(isset($_POST['del'])){
    $Shop_Cart = unserialize($_SESSION['Cart']);
    $Shop_Cart->DelFormation($_POST['del']);
    if($Shop_Cart->Cost<0){
        $_SESSION['Cart'] = serialize(new Cart());
    }
    else {
        $_SESSION['Cart'] = serialize($Shop_Cart);
    }
    require('View/CartView.php');
}

// if selescted and qty --> use ChangeQty from the cart object to change de qty of formation
if(isset($_POST ['Selected']) & isset($_POST['qty'])){
    $Shop_Cart = unserialize($_SESSION['Cart']);
    $Shop_Cart->ChangeQty($_POST['Selected'],$_POST['qty']);
    $_SESSION['Cart'] = serialize($Shop_Cart);
    require('View/CartView.php');
}

// if empty button clicked --> empty the session's cart
if(isset($_POST['empty'])){
    if($_POST['empty'] == 'empty'){
        $Session_cart = new Cart();
        $_SESSION['Cart'] = serialize($Session_cart);
        require ('View/CatalogView.php');
    }
}

// insert footer
require_once('View/Footer.php');