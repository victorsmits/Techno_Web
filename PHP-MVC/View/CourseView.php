<?php
if(!empty($vars)){
    $Course = $vars;
}
?>
<div>
    <h1><?php echo ($Course['Title'])?></h1>
    <div class="Course-Display"><h2>Goal:</h2><?php echo ($Course['Obj'])?></div>
    <div class="Course-Display"><h2>Cost:</h2><?php echo($Course['Price'])?> €</div>
    <div class="Course-Display"><h2>Date:</h2><?php echo ($Course['Time'])?></div>
</div>
<form method="post" class="action-button">
    <input type="submit" value="Buy" name="add">
    <input type="submit" value="Back" name="add">
</form >
