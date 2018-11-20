
<h1>Shopping Cart</h1>

<div class="table">
    <div><b>Formation</b></div>
    <div><b>Cost</b></div>
    <?php
        if (!empty($Shop_Cart)) {
            $shop = $Shop_Cart->CartArray;
        }
        if (!empty($shop)) {
            for ($i=0; $i<count($shop); $i++) {
                $elem = $shop[$i];
                echo "<div class=\"col_1\">".$elem->Title."</div>";
                echo "<div class=\"col_2\">".$elem->Price."€</div>";
            }
        }
    ?>
    <div><b>TOTAL</b></div>
    <div class="total"><?php echo $Shop_Cart->Count?> €</div>
    <form method="post" class="action-button">
        <div><input type="submit" value="empty" name="empty"></div>
        <div><input type="submit" value="Close"></div>
    </form>
</div>

