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
if(empty($_GET)& empty($_GET) |isset($_GET['back'])){
    require('View/CatalogView.php');
}

if(isset($_GET["Course"])) {
    // check wich formation has been clicked on
    switch ($_GET["Course"]){
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
    $vars = (array)$Formation;
    require('View/CourseView.php'); // display the selected formation
}

// if add button clicked --> add de current display formation to the session's cart
if(isset($_GET['add'])) {
    if ($_GET['add'] == 'Buy') {
        $Session_Course = unserialize($_SESSION['Forms']);
        $cart = unserialize($_SESSION['Cart']);
        $cart->AddToCart($Session_Course);
        $_SESSION['Cart'] = serialize($cart);
        require('View/CatalogView.php');
    }
}

// if cart button clicked --> display the session's cart
if(isset($_GET['Cart'])){
    if($_GET['Cart']=='Cart') {
        require('View/CartView.php');
    }
}

if(isset($_GET['del'])){
    $Shop_Cart = unserialize($_SESSION['Cart']);
    $Shop_Cart->DelFormation($_GET['del']);
    if($Shop_Cart->Cost<0){
        $_SESSION['Cart'] = serialize(new Cart());
    }
    else {
        $_SESSION['Cart'] = serialize($Shop_Cart);
    }
    require('View/CartView.php');
}


if(isset($_GET ['Selected']) & isset($_GET['qty'])){
    $Shop_Cart = unserialize($_SESSION['Cart']);
    $Shop_Cart->AddAmount($_GET['Selected'],$_GET['qty']);
    $_SESSION['Cart'] = serialize($Shop_Cart);
    require('View/CartView.php');
}

// if empty button clicked --> empty the session's cart
if(isset($_GET['empty'])){
    if($_GET['empty'] == 'empty'){
        $Session_cart = new Cart();
        $_SESSION['Cart'] = serialize($Session_cart);
        require ('View/CatalogView.php');
    }
}
require_once('View/Footer.php');