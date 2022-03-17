<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>Exercice PHP 1 !</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet "type="text/css">
    </head>
    
    <?php
        function getListInt(&$arg1, $arg2) {
            echo "<select name='nb' onchange='submit()'>";
            for ($x = 1; $x <=$arg2; $x++) {
                if ($nb = $_GET['nb'] == $x)
                {
                    echo "<option value='",$x,"' selected>",$x,"</option>";
                } else {
                    echo "<option value='",$x,"'>",$x,"</option>";
                }
            }
            echo "</select>";
         }
         
         function getRadioInt(&$arg1, $arg2) {
            echo "<p> Selectionnez la dimension du tableau : </p>";
            for ($x = 1; $x <=50; $x++) {
                echo "<div>";
                if ($nb = $_GET['nb'] === $x)
                {
                    echo "<input type='radio' name='nb' value='",$x,"' checked>";
                } else {
                    echo "<input type='radio' name='nb' value='",$x,"'>";
                }
                echo "<label for='",$x,"'>",$x,"</label>";
                echo "</div>";
            }
            echo "<input type='submit'> ";
         }
         
         function getTableDeNb($nb) {
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
         }
     ?>
    
    <body>
        <form method="GET">
             <?php
                getListInt($nb, 50);

                try {
                    $dbh = new PDO('mysql:host=localhost;dbname=exercicephp', "root", "");
                    
                    $dbh->query('INSERT INTO `statistiques` (`Horodatage`, `Nb`) VALUES (CURRENT_TIME(), "2");');
                    
                    $dbh = null;
                } catch (PDOException $e) {
                    print "Erreur !: " . $e->getMessage() . "<br/>";
                    die();
                }
             ?>
        </form> 
        <?php
            if (isset($_GET['nb']) & $_GET['nb'] > 0 & $_GET['nb'] < 50){
                getTableDeNb($_GET['nb']);
            }
        ?>
    </body>
</html>
