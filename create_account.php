<?php
include "Database.php";

$lastName = $_POST['lastName'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$x = $_POST['x'];
$y = $_POST['y'];

$target_dir = "images";
$target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
$file_name = basename($_FILES["fileToUpload"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " uploaded.";
} else {
    echo "Error uploading file.";
}

Database::getConnection()->query("INSERT INTO pracownik (idpod, login, email, nazwisko, haslo, stan, X_pracownika, Y_pracownika, nazwa_pliku_fotki_pracownika) VALUES (0, '$login', '$email', '$lastName', '$password', '1', $x, $y, '$file_name')");
Database::getConnection()->close();

header('Location: login.php');