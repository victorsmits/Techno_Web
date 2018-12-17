<div class="navbar">
    <select onchange="request(Change_Language)" id="Language" name="Language">
        <option value="fr">FR</option>
        <option value="en">EN</option>
    </select>
</div>
<?php
    $House = unserialize($_SESSION['House']);
    if (!empty($House)) {
        $house = $House->RoomsArray;
        $qty = $House->RoomQty;
    }
    if(empty($House)|| empty($house)){
        echo "<div><h2>HOUSE EMPTY</h2></div>";
    }
if (!empty($house)) {
    $i = 0;
    $title = "";
    foreach ($house as $elem) {
        if($house[$elem->Title]>0){

            //title of collumn
            echo "<div class=\"table\">"
                ."<div><b>Piece: </b></div>"
                ."<div><p class='title' id=$i>".$elem->Title."</p> ". $elem->area." m2</div>";

            // insert the formation's title
            echo "<div><b>Largeur: </b></div>"
                ."<div>".$elem->Largeur."m</div>";

            echo "<div><b>Longueur: </b></div>"
                ."<div>".$elem->Longueur."m</div>";

            echo "</div>";
            $i ++;
            $title .= $elem->Title.",";
        }
    }
}
?>
<?php
echo "<div class=\"table2\">"
    ."<div>Surface totale: ".$House->HouseArea." m2</div></div>";
?>
<form method="post">
    <input type="submit" name="recommencer" value="recommencer">
    <input type="submit" name="Back" value="Back">
</form>
<?php
echo "<div id='titleslist' style='visibility:hidden'>".$title."</div>";
?>