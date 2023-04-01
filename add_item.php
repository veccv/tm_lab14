<?php
include "Database.php";
session_start();

$nazwaPrzedmiotu = $_POST['nazwaPrzedmiotu'];
$pomieszczenie = $_POST['pomieszczenie'];
$typ = $_POST['typ'];
$nazwaSrodka = $_POST['nazwaSrodka'];
$identyfikator = $_POST['identyfikator'];
$koszt = $_POST['koszt'];
$x = $_POST['x'];
$y = $_POST['y'];
$uwagi = $_POST['uwagi'];
$id = $_POST['id'];

$email = $_SESSION['email'];
$idp = mysqli_fetch_array(Database::getConnection()->query("SELECT * FROM pracownik WHERE email='$email'"))[0];

$target_dir = "images";
$target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
$file_name = basename($_FILES["fileToUpload"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " uploaded.";
} else {
    echo "Error uploading file.";
}

Database::getConnection()->query("INSERT INTO srodek (idp, idpod, idpom, idtyp, idnazwa, nazwa, identyfikator, koszt, X_srodka, Y_srodka, uwagi) VALUES ($idp, $id, $pomieszczenie, $typ, $nazwaSrodka, '$nazwaPrzedmiotu', '$identyfikator', '$koszt', '$x', '$y', '$uwagi')");
Database::getConnection()->close();

header('Location: podklad.php?id=' . $id);