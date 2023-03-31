<?php
include "Database.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$target_dir = "avatars";
$target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
$file_name = basename($_FILES["fileToUpload"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " uploaded.";
} else {
    echo "Error uploading file.";
}

Database::getConnection()->query("INSERT INTO users (firstName, lastName, login, password, email, avatar) VALUES ('$firstName', '$lastName', '$username', '$password', '$email', '$target_file')");
Database::getConnection()->close();

header('Location: login.php');