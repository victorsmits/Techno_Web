
<h1 class="table-title" ;">My Cart</h1>
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
                        echo "<div class=\"table\">"
                            ."<div><b>Formation</b></div>"
                            ."<div><b>Quantity</b></div>"
                            ."<div><b>Cost</b></div>"
                            ."<div></br></div>";

                        echo "<div>".$elem->Title."</div>";
                        echo "<div>".$Amount[$elem->Title]."</div>";
                        echo "<div>".$elem->Price."€</div>";
                        echo "<div class='del-button'><form method=\"post\"><button type='submit' name='del' class='del' 
                                            value=".$elem->Title."> <b>X</b></input></form></div>";
                        echo "<div></div>";
                        echo "<div><b>SUB-TOTAL</b></div>";
                        echo "<div class=\"total\">".$Shop_Cart->Cost. "€</div></div>";
//                            echo "<div></div>";
                }
            }
        }
    ?>

<div class="table2">
    <h2>TOTAL</h2>
    <form method="post" class="action-button">
        <div><input type="submit" value="empty" name="empty"></div>
        <div><input type="submit" value="Close"></div>
    </form>
</div>

<?php //print_r($Shop_Cart->CartArray);?>