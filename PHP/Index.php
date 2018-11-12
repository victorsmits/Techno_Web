<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="PStyle.css">
</head>

<body>
	<form action="">
		<div> Donnée Personnelles</div>
		<p>Nom <input type="text" class="box" name="UN"></p>
		<p>Prénom <input type="text" class="box"></p>
		<p><input type="submit" value="Page suivant">
			<input type="submit" value="Annuler" onclick="Session_start()"></p>
	</form>

	<?php
	function Session_start(){
		$_Session['Username']= $_GET['UN'];
		echo $_Session;
	}
	    Session_start();
	?>
</body>

</html>
