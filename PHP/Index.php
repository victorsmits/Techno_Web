<!--PHP-->
<?php
Session_start();
if(isset($_POST['NPage'])){
    if(isset($_POST['LN'])){
        $_SESSION['LastName'] = $_POST['LN'];
    }
    if(isset($_POST['FN'])) {
        $_SESSION['FirstName'] = $_POST['FN'];
    }
    header('Location: formation.php');
}
if(isset($_POST['Cancel'])){
    header('Location: index.php');
    session_destroy();
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
		<h1> Donnée Personnelles</h1>
		<div class="row">
            <b >Lastname
            <input type="text"  name="LN" >
            </b>
        </div>
        <div class="row">
		    <b>Firstname
            <input type="text"  name='FN' ></b>
        </div>
        <div class="row">
            <input type="submit" name="NPage" value="Next Page">
            <input type="submit" name="Cancel" value="Cancel" >
        </div>
	</form>
</body>

</html>
