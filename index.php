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
            echo "<table id='table1'>";
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
         
         function logTableDemande(int $nb): void {
             try {
                $dbh = new PDO('mysql:host=localhost;dbname=exercicephp', "root", "");

                $dbh->query("INSERT INTO `logs` (`Nb`) VALUES ('$nb');");

                $dbh = null;
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
         }
         
         function createTable(): void {
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=exercicephp', "root", "");

                $dbh->query("CREATE TABLE `exercicephp`.`logs` ( `Horodatage` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `Nb` TINYINT NOT NULL ) ENGINE = MyISAM;");

                $dbh = null;
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
         }
         
         function getTables(): void {
                        //Connect to MySQL using the PDO object.
            $pdo = new PDO('mysql:host=localhost;dbname=exercicephp', 'root', '');

            //Our SQL statement, which will select a list of tables from the current MySQL database.
            $sql = "select nb, count(*) as nbdemandes from logs group by nb order by nbdemandes";

            //Prepare our SQL statement,
            $statement = $pdo->query($sql);

            //Fetch the rows from our statement.
            $tables = $statement->fetchAll();

            //Loop through our table names.
            foreach($tables as $table){
                //Print the table name out onto the page.
                // echo $table[0], ' | ', $table[1], '<br>';
                echo "<table><tbody><tr><td>", $table[0], "</td><td>", $table[1],"</tr></tbody></table>";
              
            }
            
         }
     ?>
    
    <body>
        <form method="GET">
             <?php
                #createTable();
                
                getListInt($nb, 50);
                
                logTableDemande($_GET['nb']);
                
                
             ?>
        </form> 
        <?php
            if (isset($_GET['nb']) & $_GET['nb'] > 0 & $_GET['nb'] < 50){
                getTableDeNb($_GET['nb']);
            }
            
            echo '<br>';
            
            getTables();
        ?>
    </body>
</html>
