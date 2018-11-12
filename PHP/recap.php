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
<h1> Récapitulatif</h1>
<ul>
    <ul>Nom: <?php echo $_SESSION["LastName"];?></ul>
    <ul>Prénom: <?php echo $_SESSION["FirstName"];?></ul>
    </br>
    <ul>Vous avez choisi les formations : </ul>
    <?php
    for ($i=0; $i<count($_SESSION['checked']); $i++) {
        echo "<ul>".$_SESSION['checked'][$i]."</ul>";
    }
    ?>
    </br>
    <ul>Pour un total de <?php $total = total($_SESSION['checked']);
        echo $total ;?> €
    </ul>
</ul>
</body>
    <?php
        function total($liste){
            $total = 0;
            $data = array(
                "PHP" => 250,
                "XML" => 350,
                "JAVA" => 450,
                "C++" => 550
            );
            for($i=0;$i<count($liste);$i++){
                $elem = $liste[$i];
                $total += $data[$elem];
            }
            return $total;
        }
    ?>
</html>