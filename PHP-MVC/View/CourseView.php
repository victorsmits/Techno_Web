
<!--Display the selected formation-->
<div>
    <h1><?php echo ($Formation->Title)?></h1>
    <div class="Course-Display"><h2>Goal:</h2><?php echo ($Formation->Obj)?></div>
    <div class="Course-Display"><h2>Cost:</h2><?php echo($Formation->Price)?> €</div>
    <div class="Course-Display"><h2>Date:</h2><?php echo ($Formation->Time)?></div>
</div>
<form method="post" class="action-button">
    <input type="submit" value="Buy" name="add">
    <input type="submit" value="Back" name="back">
</form >
