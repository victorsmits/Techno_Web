<!--PHP-->
<?php
Session_start();
if(empty($_POST)){
    require ('Home.php');
}
if(isset($_POST['NPage2'])){
    if(isset($_POST['LN'])){
        $_SESSION['LastName'] = $_POST['LN'];
    }
    if(isset($_POST['FN'])) {
        $_SESSION['FirstName'] = $_POST['FN'];
    }
    require('formation.php');
}
if(isset($_POST['Cancel'])){
    require('Home.php');
    session_destroy();
}

if(isset($_POST['NPage3'])){
    $_SESSION['checked'] = $_POST['check_list'];
    require('recap.php');
}
if(isset($_POST['LPage'])){
    require('Home.php');
}
if(isset($_POST['Cancel'])){
    require('formation.php');
}
?>

