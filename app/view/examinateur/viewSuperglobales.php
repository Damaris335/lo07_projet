<!-- début viewSuperglobales -->   
<?php require($root . 'app/view/fragment/fragmentBlablacarHeader.html'); ?>

<body>
    <div class="container">
        <?php include $root . 'app/view/fragment/fragmentBlablacarMenu.php';
        include $root . 'app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>

        <div class="row justify-content-center mt-5">
            <div class="col-md-12">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Analyse des superglobales</h4>
                    </div>
                    <div class="card-body">

                            <?php if (isset($erreur) && $erreur): ?>
                            <div class="alert alert-danger">
                            <?php echo $erreur; ?>
                            </div>
                            <?php endif; ?>

                                    <!-- Le cookie _ga est Google analytics, cookie déposé automatiquement si on visite un site qui l'utilise ou si l'environnement de dév est configuré pour-->
                                    <h3 class="mt-4">$_COOKIE</h3>
                                    <table class="table table-bordered mt-2 bg-light">
                                        <thead>
                                            <tr><th>#</th><th>Clé</th><th>Valeur</th></tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $j = 1;
                                            foreach ($_COOKIE as $cle => $valeur) {
                                                if ($cle == "envoi") {
                                                    continue; // On cache le bouton
                                                }
                                                echo "<tr>";
                                                printf("<td><b>%d</b></td>", $j);
                                                printf("<td>%s</td>", htmlspecialchars($cle));
                                                echo "<td>";
                                                if (is_array($valeur)) {
                                                    printf("%s", htmlspecialchars(implode(", ", $valeur)));
                                                } else {
                                                    printf("%s", htmlspecialchars($valeur));
                                                }
                                                echo "</td></tr>";
                                                $j++;
                                            }
                                            if ($j == 1)
                                                echo "<tr><td colspan='3' class='text-center'>Aucune donnée COOKIE reçue</td></tr>";
                                            ?>
                                        </tbody>
                                    </table>

                                    <h3 class="mt-4">$_SESSION</h3>
                                    <table class="table table-bordered mt-2 bg-light">
                                        <thead>
                                            <tr><th>#</th><th>Clé</th><th>Valeur</th></tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $j = 1;
                                            foreach ($_SESSION as $cle => $valeur) {
                                                if ($cle == "envoi") {
                                                    continue; // On cache le bouton
                                                }
                                                echo "<tr>";
                                                printf("<td><b>%d</b></td>", $j);
                                                printf("<td>%s</td>", htmlspecialchars($cle));
                                                echo "<td>";
                                                if (is_array($valeur)) {
                                                    printf("%s", htmlspecialchars(implode(", ", $valeur)));
                                                } else {
                                                    printf("%s", htmlspecialchars($valeur));
                                                }
                                                echo "</td></tr>";
                                                $j++;
                                            }
                                            if ($j == 1)
                                                echo "<tr><td colspan='3' class='text-center'>Aucune donnée SESSION reçue</td></tr>";
                                            ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>

            </div>
        </div>
    </div>
  <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
