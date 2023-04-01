<?php
include "Database.php";

$nazwaTypu = $_POST['nazwaTypu'];
$id = $_POST['id'];

$target_dir = "images";
$target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
$file_name = basename($_FILES["fileToUpload"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " uploaded.";
} else {
    echo "Error uploading file.";
}

Database::getConnection()->query("INSERT INTO typ_srodka (nazwa) VALUES ('$nazwaTypu')");
Database::getConnection()->close();

header('Location: new_item.php?id=' . $id);