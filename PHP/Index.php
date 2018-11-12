<?php
Session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="PStyle.css">
</head>

<body>
	<form method="post">
		<h1> Donnée Personnelles</h1>
		<p>Nom <input type="text" class="box" name="LN"></p>
		<p>Prénom <input type="text" class="box" name='FN'></p>
		<p><input type="submit" name="NPage" value="Page suivante">
			<input type="submit" name="Cancel" value="Annuler"  ></p>

	</form>
    <?php
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
        }


    ?>
</body>

</html>
