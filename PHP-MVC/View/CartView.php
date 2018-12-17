<!--Recap of the shopping-->
<div class="body">
    <div class="col1">
    <h1 class="table-title">My Cart</h1>
        <?php
            $Shop_Cart = unserialize($_SESSION['Cart']);
            if (!empty($Shop_Cart)) {
                $shop = $Shop_Cart->CartArray;
                $Quantity = $Shop_Cart->AmountArray;
            }
            if(empty($Shop_Cart)|| empty($shop)){
                echo "<div><h2>CART EMPTY</h2></div>";
            }if (!empty($shop)) {
                foreach ($shop as $elem) {
                    if($Quantity[$elem->Title]>0){

                        //title of collumn
                        echo "<div class=\"table\">"
                            ."<div><b>Formation</b></div>"
                            ."<div><b>Quantity</b></div>"
                            ."<div><b>Cost</b></div>"
                            ."<div style='width: 10%'></br></div>";

                        // insert the formation's title
                        echo "<div>".$elem->Title."</div>";

                        //insert the quantity menu
                        echo "<div><form method='post'>"
                            ."<input type='hidden' name='Selected' value=".$elem->Title.">"
                            ."<input list='qty' onchange='this.form.submit()' name='qty' placeholder="
                                    .$Quantity[$elem->Title].">"
                                ."<datalist id='qty'>"
                                    ."<option value='1'>"
                                    ."<option value='2'>"
                                    ."<option value='3'>"
                                    ."<option value='4'>"
                                    ."<option value='5'>"
                                ."</datalist>"
                            ."</form></div>";

                        // insert the formation's price
                        echo "<div>".$elem->Price."€</div>";

                        //insert delete button
                        echo "<div class='del-button'>"
                                ."<form method=\"post\">"
                                    ."<button type='submit' name='del' class='del' value=".$elem->Title.">"
                                        ."<b>X</b>"
                                    ."</button>"
                                ."</form>"
                            ."</div>";

                        // insert the formation's price depending of the quantity
                        echo "<div></div>";
                        echo "<div><b class='sub-total'>SUB-TOTAL</b></div>";
                        echo "<div class=\"total\">".$elem->Price * $Quantity[$elem->Title]. "€</div></div>";
                    }
                }
            }
        ?>
    </div>
<!-- Total price to pay-->
    <div class="col2">
        <div class="table2">
            <h1 class="table-title">TOTAL</h1>
            <?php
            if($Shop_Cart->Cost>0) {
                echo "<div>" . $Shop_Cart->Cost . "€</div>";
                echo "<div><b class='sub-total'>SUB-TOTAL</b></div>";
            }
            ?>
            <form method="post" class="action-button">
                <div><input type="submit" value="empty" name="empty"></div>
                <div><input type="submit" value="back" name="back"></div>
            </form>
        </div>
    </div>
</div>
