<!DOCTYPE html>
<!-- 
     Page web créé dans le cadre du cours de web Dev le 01/09/2020
     Auteur : José GIL
     Email : jgil83000@gmail.com
-->
<html lang="fr-FR">
    <head>
        <title>Exercice PHP 1 !</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet "type="text/css">
    </head>
    
    <body>
        <?php
            for ($nb = 2; $nb <=12; $nb++) {
                echo "<h1>Exercice Table de ",$nb," PHP</h1>";
                echo "<table>";
                    echo "<tbody>";
                        for ($x = 1; $x <=$nb; $x++) {
                            echo "<tr>";
                            for ($y = 1; $y <=$nb; $y++) {
                                echo "<th>", $x*$y, "</th>";
                            }
                            echo "</tr>";
                        }
                    echo "</tbody>";
                echo "</table>";
            }
        ?>
    </body>
</html>
