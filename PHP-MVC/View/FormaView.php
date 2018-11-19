<form method="get">
    <h1><?php echo ($vars['Title'])?></h1>
    <h2>Objectif:</h2>
    <div><?php echo ($vars['Obj'])?></div>
    </br>
    <h2>Coût:</h2>
    <div><?php echo($vars['Price'])?> €</div>
    <h2>Date:</h2>
    <div><?php echo ($vars['Time'])?></div>
    <input type="submit" value="add" name="add">
</form >