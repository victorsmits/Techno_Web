<div class="body">
    <div class="col1">
    <h1 class="table-title" ;">My Cart</h1>
        <?php
            $Shop_Cart = unserialize($_SESSION['Cart']);
            if (!empty($Shop_Cart)) {
                $shop = $Shop_Cart->CartArray;
                $Amount = $Shop_Cart->AmountArray;
            }
            if(empty($Shop_Cart)|empty($shop)){
                echo "<div><h2>CART EMPTY</h2></div>";
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
                        echo "<div><form method='get'>"
                            ."<input type='hidden' name='Selected' value=".$elem->Title.">"
                            ."<input list='qty' class='list' onchange='this.form.submit()' name='qty' placeholder=".$Amount[$elem->Title].">"
                                ."<datalist id='qty'>"
                                    ."<option value='1'>"
                                    ."<option value='2'>"
                                    ."<option value='3'>"
                                    ."<option value='4'>"
                                    ."<option value='5'>"
                                ."</datalist>"
                            ."</form></div>";

                        echo "<div>".$elem->Price."€</div>";

                        //insert delete button
                        echo "<div class='del-button'>"
                                ."<form method=\"get\">"
                                    ."<button type='submit' name='del' class='del' value=".$elem->Title.">"
                                        ."<b>X</b>"
                                    ."</button>"
                                ."</form>"
                            ."</div>";

                        echo "<div></div>";
                        echo "<div><b>SUB-TOTAL</b></div>";
                        echo "<div class=\"total\">".$elem->Price * $Amount[$elem->Title]. "€</div></div>";
                    }
                }
            }
        ?>
    </div>
    <div class="col2">
        <div class="table2">
            <h1 class="table2-title">TOTAL</h1>
            <?php
            if($Shop_Cart->Cost>0) {
                echo "<div>" . $Shop_Cart->Cost . "€</div>";
                echo "<div><b>SUB-TOTAL</b></div>";
            }
            ?>
            <form method="get" class="action-button">
                <div><input type="submit" value="empty" name="empty"></div>
                <div><input type="submit" value="Close"></div>
            </form>
        </div>
    </div>
</div>
