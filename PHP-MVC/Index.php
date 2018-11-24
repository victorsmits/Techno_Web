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
if(!isset($_POST["Course"])& !isset($_POST['Cart'])& !isset($_POST['del'])){
require_once('View/CatalogView.php');
}

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
    $vars = (array)$Formation;
    require('View/CourseView.php'); // display the selected formation
}

// if add button clicked --> add de current display formation to the session's cart
if(isset($_POST['add'])) {
    if ($_POST['add'] == 'Buy') {
        $Session_Course = unserialize($_SESSION['Forms']);
        $cart = unserialize($_SESSION['Cart']);
        $cart->AddToCart($Session_Course);
        $_SESSION['Cart'] = serialize($cart);
    }
}

// if cart button clicked --> display the session's cart
if(isset($_POST['Cart'])){
    if($_POST['Cart']=='Cart') {
        require('View/CartView.php');
    }
}

if(isset($_POST['del'])){
    $Shop_Cart = unserialize($_SESSION['Cart']);
    $Shop_Cart->DelFormation($_POST['del']);
    $_SESSION['Cart'] = serialize($Shop_Cart);
    require('View/CartView.php');
}

// if empty button clicked --> empty the session's cart
if(isset($_POST['empty'])){
    if($_POST['empty'] == 'empty'){
        $Session_cart = new Cart();
        $_SESSION['Cart'] = serialize($Session_cart);
    }
}
require_once('View/Footer.php');