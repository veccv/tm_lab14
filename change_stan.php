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

</head>

<body onload="myLoadHeader()">
<div id='myHeader'></div>
<main>
    <section class="sekcja1">
        <div class="container-fluid p-4 text-center">
            <?php
            if ($session) {
                include 'Database.php';
                $email = $_SESSION['email'];
                $rekord = mysqli_fetch_array(Database::getConnection()->query("SELECT * FROM pracownik WHERE email='$email'"));
                ?>
                <div class="d-flex">
                    <form method="POST" class="needs-validation" novalidate action="change_employee_stan.php"
                          enctype="multipart/form-data">
                        <h2>Zmień stan pracownika</h2>
                        <select name="pracownikId" id="pracownikId" class="form-select">
                            <?php
                            $srodki = mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM pracownik"));
                            foreach ($srodki as $typ) {
                                echo '<option value="' . $typ[0] . '">' . $typ[4] . '</option>';
                            }
                            ?>
                        </select>
                        <select name="stan" id="stan" class="form-select">
                        <option value="0">Brak</option>
                        <option value="1">Praca lokalna</option>
                        <option value="2">Praca zdalna online</option>
                        <option value="3">Dyżur pod telefonem</option>
                        <option value="4">Praca lokalna u klienta</option>
                        <option value="5">Po pracy</option>
                        <option value="6">Urlop</option>
                        <option value="7">L4</option>
                        </select>
                        <?php
                        ?>
                        <button class="w-40 btn btn-success btn-lg mt-10" style="margin-top: 5%" type="submit">Zmień stan
                        </button>
                    </form>
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