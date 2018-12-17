<div class=" table">
    <h1>Encoder les données de la pièce</h1>
    <form method="post">
       <div>
           <label>
               Pièce :
           </label>
       </div>
        <div>
            <input type="text" name="room" >
        </div>
        <div>
            <label>
                Largeur:
            </label>
        </div>
        <div>
            <input list='meter' name='Largeur'>
        </div>
        <div>
            <label>Longueur:</label>
        </div>
        <div>
            <input list='meter' name='Longueur'>
        </div>
        <div style="width: 100%">
            <input type="submit" name="Enregistrer" value="Enregistrer">
        </div>
        <div>
            <input type="submit" name="recommencer" value="recommencer">
            <input type="submit" name="terminer" value="terminer">
        </div>
    </form>
    <datalist id='meter'>
        <?php
        for($i = 0;$i <=10;$i++){
            echo "<option value=$i>";
        }
        ?>
    </datalist>
</div>

