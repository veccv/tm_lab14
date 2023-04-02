<?php declare(strict_types=1);
session_start();
$session = $_SESSION['loggedin'];

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Twój Opis">
    <meta name="author" content="Twoje dane">
    <meta name="keywords" content="Twoje słowa kluczowe">
    <title>Dalmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <style type="text/css" class="init"></style>
    <link rel="stylesheet" type="text/css" href="twoj_css.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="twoj_js.js"></script>

    <style>
        .company-logo {
            display: flex;
            position: relative;
            width: 600px;
            height: 300px;
        }

        #employee-photo {
            position: absolute;
            display: inline-block;
        }
    </style>
</head>

<body onload="myLoadHeader()" style="background-color: rgba(138,142,160,0.32);">
<div id='myHeader'></div>
<main>
    <section class="sekcja1">
        <div class="container-fluid p-4">
            <?php
            if ($session) {
                include 'Database.php';
                $email = $_SESSION['email'];

                echo '<a href="change_stan.php" class="btn btn-primary">Zmień stan pracownika</a>';
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Avatar</th>
                        <th scope="col">Stan</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $pracownicy = mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM pracownik"));
                    foreach ($pracownicy as $pracownik) {
                        echo '<tr>';
                        echo '<td><img src="images/' . $pracownik[9] . '" style="height: 80px; width: 80px;" /></td>';

                        switch ($pracownik[6]) {
                            case "0": {
                                echo '<td>Brak</td>';
                                break;
                            }
                            case "1": {
                                echo '<td>Praca lokalna</td>';
                                break;
                            }
                            case "2": {
                                echo '<td>Praca zdalna online</td>';
                                break;
                            }
                            case "3": {
                                echo '<td>Dyżur pod telefonem</td>';
                                break;
                            }
                            case "4": {
                                echo '<td>Praca lokalna u klienta</td>';
                                break;
                            }
                            case "5": {
                                echo '<td>Po pracy</td>';
                                break;
                            }
                            case "6": {
                                echo '<td>Urlop</td>';
                                break;
                            }
                            case "7": {
                                echo '<td>L4</td>';
                                break;
                            }
                        }
                        echo '<td>' . $pracownik[4] . '</td>';
                        echo '<td>' . $pracownik[3] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>

                <?php
            } else {
                echo "Witaj na stronie głównej, wejdź w zakładkę konto aby się zalogować albo zarejestrować!";
            }
            ?>
        </div>
    </section>
</main>
</body>
</html>