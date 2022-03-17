<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>Exercice PHP 1 !</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet "type="text/css">
    </head>
    
    <body>
        <form method="GET">
            <!---<label for="nb"> Nombre : </label>
            <input type="number" name="nb" id="nb" required>
            <input type="submit">-->
             <?php
                echo "<select name='nb'>";
                for ($x = 1; $x <=50; $x++) {
                    if ($nb = $_GET['nb'] == $x)
                    {
                        echo "<option value='",$x,"' selected>",$x,"</option>";
                    } else {
                        echo "<option value='",$x,"'>",$x,"</option>";
                    }
                }
                echo "</select>";
             ?>
            <input type="submit">
        </form>
        <?php
            $nb = $_GET['nb'];
            
            echo "<h1>Exercice Table de ",$nb," PHP</h1>";
            echo "<table>";
                echo "<tbody>";
                    for ($x = 1; $x <=$nb; $x++) {
                        echo "<tr>";
                        for ($y = 1; $y <=$nb; $y++) {
                            if ($x==1 or $y==1) {
                                    echo "<th class='cont'>", $x*$y, "</th>";
                            } else {
                                    echo "<th>", $x*$y, "</th>";
                            }
                        }
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
        ?>
    </body>
</html>
