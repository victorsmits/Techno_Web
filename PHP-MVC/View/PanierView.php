
<h1>Panier</h1>
<ul>Vous avez choisi les formations : </ul>
<?php
$shop = $shopcart->CartArray;
for ($i=0; $i<count($shop); $i++) {
    $elem = $shop[$i];
    echo "<ul>".$elem->Title."</ul>";
}
?>
<ul>Pour un total de <?php echo $shopcart->Count?> €</ul>
<form method="post"><input type="submit" value="empty" name="empty"></form>