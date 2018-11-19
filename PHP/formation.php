<!--PHP-->
<?php
    Session_start();
    if(isset($_POST['NPage'])){
        $_SESSION['checked'] = $_POST['check_list'];
        header('Location: recap.php');
    }
    if(isset($_POST['LPage'])){
        header('Location: Index.php');
    }
    if(isset($_POST['Cancel'])){
        header('Location: formation.php');
    }

?>
<!--HTML-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="PStyle.css">
</head>

<body>
<form method="post">
    <h1>Sélection des formations</h1>
        <input type="checkbox" name="check_list[]" value="PHP"><label>PHP 250€</label><br/>
        <input type="checkbox" name="check_list[]" value="XML"><label>XML 350€</label><br/>
        <input type="checkbox" name="check_list[]" value="JAVA"><label>JAVA 450€</label><br/>
        <input type="checkbox" name="check_list[]" value="C++"><label>C++ 550€</label><br/>
        <p><input type="submit" name="NPage" value="Page suivante" />
             <input type="submit" name="LPage" value="Page précédente" >
            <input type="submit" name="Cancel" value="Annuler"  >
        </p>
</form>

</body>

</html>
