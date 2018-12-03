<?php
require ('init.php');
require ('View/Header.php');
require ('Model/CartModel.php');
require ('Model/CourseModel.php');

function Home(){
    require('View/CatalogView.php');
}

function Cart(){
    require('View/CartView.php');
}

function NewShopCart(){
    $Session_cart = new Cart();
    $_SESSION['Cart'] = serialize($Session_cart);
}

function ShowClasses(){
    $init = new init();
    // check which formation has been clicked on
    switch ($_POST["Course"]){
        case 'PHP':
            $Formation = $init->FormaPHP;
            break;
        case 'JAVA':
            $Formation = $init->FormaJAVA;
            break;
        case 'AJAX':
            $Formation = $init->FormaAJAX;
            break;
    }
    $_SESSION['Forms'] = serialize($Formation); // Stock the selected formation in session
    require('View/CourseView.php'); // display the selected formation
}

function BuyClasse()
{
    $Session_Course = unserialize($_SESSION['Forms']);
    $cart = unserialize($_SESSION['Cart']);
    $cart->AddToCart($Session_Course);
    $_SESSION['Cart'] = serialize($cart);
    Home();
    echo "<div>".$Session_Course->Title." has been added to the shopping cart</div>";
}

function DelClasse(){
    $Shop_Cart = unserialize($_SESSION['Cart']);
    $Shop_Cart->DelFormation($_POST['del']);
    if($Shop_Cart->Cost<0){
        $_SESSION['Cart'] = serialize(new Cart());
    }
    else {
        $_SESSION['Cart'] = serialize($Shop_Cart);

    }
    Home();
}

function UpdateQty(){
    $Shop_Cart = unserialize($_SESSION['Cart']);
    $Shop_Cart->ChangeQty($_POST['Selected'],$_POST['qty']);
    $_SESSION['Cart'] = serialize($Shop_Cart);
    Cart();

}

function EmptyCart(){
    $Session_cart = new Cart();
    $_SESSION['Cart'] = serialize($Session_cart);
    Home();
}