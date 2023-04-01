<?php declare(strict_types=1);
session_start();
$session = $_SESSION['loggedin'];
$podkladId = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dalmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="twoj_css.css">
    <script type="text/javascript" src="twoj_js.js"></script>

    <style>
        body {
            background-color: ghostwhite !important;
        }
    </style>
</head>

<body onload="myLoadHeader()" style="background-color: rgba(138,142,160,0.32);">
<div id='myHeader'></div>
<main>
    <section class="sekcja1">
        <div>
            <a href="podklady.php" class="btn btn-primary my-2 mx-3">Powrót do podkładów</a>
        </div>
        <div class="container-fluid p-4 d-flex">
            <?php
            if ($session) {
                include 'Database.php';
                $rekord = mysqli_fetch_array(Database::getConnection()->query("SELECT * FROM podklad WHERE idpod=$podkladId"));
                echo '<img src="images/' . $rekord['nazwa_pliku'] . '"/>';
                ?>
                <div class="m-4 w-100">
                    <h4>Lista pomieszczeń:</h4>
                    <ul class="list-group">
                        <?php
                        $pomieszczenia = mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM pomieszczenie WHERE idpod=$podkladId"));
                        foreach ($pomieszczenia as $pomieszczenie) {
                            echo '<li class="list-group-item">' . $pomieszczenie[1] . '</li>';
                        }
                        ?>

                        <li class="list-group-item">
                            <?php
                            echo '<a href="new_pomieszczenie.php?id=' . $podkladId . '" class="btn btn-success w-100">Dodaj nowe pomieszczenie</a>'
                            ?>
                        </li>
                    </ul>
                </div>


                <?php
            }
            if (!$session) {
                echo "Witaj na stronie głównej, wejdź w zakładkę konto aby się zalogować albo zarejestrować!";
            }
            ?>
        </div>
    </section>
</main>
</body>
</html>