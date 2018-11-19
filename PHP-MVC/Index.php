
<?php
Session_start();
require_once ('Model/PanierModel.php');
require_once ('Model/FormaModel.php');
require_once ('init.php');

$cart = new Cart();
$_SESSION['cart'] = serialize($cart);


if(!isset($_GET['forma'])){
require('View/CatalogView.php');
}

if(isset($_GET['forma'])) {
    switch ($_GET['forma']){
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

if(isset($_GET['add'])){
    if($_GET['add']=='add'){
        $session_cart = unserialize($_SESSION['cart']);
        $session_forma = unserialize($_SESSION['Forma']);

        $session_cart->AddToCart($session_forma);

        $var = (array)$session_forma;
        $price = (int)$var['Price'];
        $session_cart->TotalCount($price);
        $_SESSION['cart'] = serialize($session_cart);
    }
}

$session_cart = unserialize($_SESSION['cart']);
print_r($session_cart);

if(isset($_GET['cart'])){
    if($_GET['cart']=='cart') {
        $shopcart = unserialize($_SESSION['cart']);
        // TODO unserialize cart
        require('View/PanierView.php');
    }
}
