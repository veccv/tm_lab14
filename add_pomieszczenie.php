<?php
include "Database.php";

$nazwaPomieszczenia = $_POST['nazwaPomieszczenia'];
$id = $_POST['id'];

$target_dir = "images";
$target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
$file_name = basename($_FILES["fileToUpload"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " uploaded.";
} else {
    echo "Error uploading file.";
}

Database::getConnection()->query("INSERT INTO pomieszczenie (nazwa, idpod) VALUES ('$nazwaPomieszczenia', $id)");
Database::getConnection()->close();

header('Location: podklad.php?id=' . $id);