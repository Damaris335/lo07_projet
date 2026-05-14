<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo 'Test :';
            
        ?>
        <?php
                        $dsn = 'mysql:dbname=barbotda;host=localhost;charset=utf8';
                        $username = 'barbotda';
                        $password = 'U6SngfE0';
                        $options = array();
                        try {
                            $database = new PDO($dsn, $username, $password, $options);
                        } catch (PDOException $e) {
                            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
                        }
                        ?>

        
        <?php
        $requete2 = "select * from vin where annee = 1976";
        $statement = $database->query($requete2);
        ?>
        <div class="container">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="mt-4 p-2 panel-heading text-white rounded bg-primary">Insertion d'un tuple : query = select * from vin where annee = 1976</div>
                    <div class="panel-body">
                        <?php
                        $i = 1;
                        // On utilise fetch() dans une boucle pour lire chaque ligne
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            echo $i . ". vin (" . $row['id'] . ", " . $row['cru'] . ", " . $row['annee'] . ", " . $row['degre'] . ")<br/>";
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
