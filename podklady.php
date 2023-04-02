<?php declare(strict_types=1);
session_start();
$session = $_SESSION['loggedin'];

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
        <div class="container-fluid p-4 d-flex">
            <?php
            include 'Database.php';
            $email = $_SESSION['email'];
            $rekord = mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM podklad"));
            ?>
            <div class="pe-5 align-self-start">
                <p>Lista dostępnych podkładów budowlanych firmy:</p>
                <?php
                if ($session) {
                    echo '<a href="new_podklad.php" class="btn btn-success" style="width: 100%">Dodaj podkład budowlany</a>';
                }
                ?>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nazwa podkładu</th>
                    <th scope="col">Opcje</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rekord as $podklad) {
                    echo '<tr>';
                    echo '<td>' . $podklad[1] . '</td>';
                    $link = "remove_podklad.php?id=" . $podklad[0];
                    $edit_link = "podklad.php?id=" . $podklad[0];

                    if ($session) {
                        echo '<td class="px-10 d-flex gap-2">' . '<a href="' . $edit_link . '" class="btn btn-primary w-20">Podgląd</a>'
                            . '<a href="' . $link . '" class="btn btn-danger w-20">Usuń</a>'
                            . '</td>';
                    } else {
                        echo '<td class="px-10 d-flex gap-2">' . '<a href="' . $edit_link . '" class="btn btn-primary w-20">Podgląd</a>'
                            . '</td>';
                    }

                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
</body>
</html>