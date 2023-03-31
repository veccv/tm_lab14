<?php
include "Database.php";

$nazwaPodkladu = $_POST['nazwaPodkladu'];

$target_dir = "images";
$target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
$file_name = basename($_FILES["fileToUpload"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " uploaded.";
} else {
    echo "Error uploading file.";
}

Database::getConnection()->query("INSERT INTO podklad (nazwa, nazwa_pliku) VALUES ('$nazwaPodkladu', '$file_name')");
Database::getConnection()->close();

header('Location: podklady.php');