
<h1>Shopping Cart</h1>
<div class="table">
    <form method="post">
        <div><b>Formation</b></div>
        <div><b>Amount</b></div>
        <div><b>Cost</b></div>
        <div></br></div>
        <?php
            $Shop_Cart = unserialize($_SESSION['Cart']);
            if (!empty($Shop_Cart)) {
                $shop = $Shop_Cart->CartArray;
                $Amount = $Shop_Cart->AmountArray;
            }
            if (!empty($shop)) {
                for ($i=0; $i<count($shop); $i++) {
                        $elem = $shop[$i];
                        if($Amount[$elem->Title]>0){
                        echo "<div>".$elem->Title."</div>";
                        echo "<div>".$Amount[$elem->Title]."</div>";
                        echo "<div>".$elem->Price."€</div>";
                        echo "<div><input type='submit' name='del' class='del' value=".$elem->Title.">del</input></div>";
                    }
                }
            }
        ?>
    </form>
</div>
<div class="table2">
    <div><b>TOTAL</b></div>
    <div class="total"><?php echo $Shop_Cart->Cost?> €</div>
    <form method="post" class="action-button">
        <div><input type="submit" value="empty" name="empty"></div>
        <div><input type="submit" value="Close"></div>
    </form>
</div>

<?php //print_r($Shop_Cart->CartArray);?>