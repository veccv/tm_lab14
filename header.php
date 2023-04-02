<?php declare(strict_types=1);
session_start();
$session = $_SESSION['loggedin'];

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top mt-0 mb-0 ms-0 me-0 pt-0 pb-0 ps-0 pe-0">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Konto</a>
                            <ul class="dropdown-menu">
                                <?php
                                if ($session) {
                                    echo '<li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Wyloguj się </a></li>';
                                } else {
                                    echo '<li><a class="dropdown-item" href="login.php"> Logowanie </a></li>';
                                    echo '<li><a class="dropdown-item" href="register.php"> Rejestracja </a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        if ($session) {
                            echo '<li class="nav-item dropdown">';
                            echo '<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Zarządzanie</a>';
                            echo '<ul class="dropdown-menu">';
                            echo '<li><a class="dropdown-item" href="podklady.php"> Podkłady budowlane </a></li>';
                            echo '<li><a class="dropdown-item" href="pracownicy.php"> Pracownicy </a></li>';
                            echo '</ul>';
                            echo '</li>';
                        }
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Podgląd</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="filmy.php"> Filmy </a></li>
                                <li><a class="dropdown-item" href="podklady.php"> Wizualizacje </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

    </div>
</header>