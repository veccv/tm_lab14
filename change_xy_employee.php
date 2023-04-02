<?php
include "Database.php";

$x = $_POST['x'];
$y = $_POST['y'];
$id = $_POST['id'];
$idp = $_POST['idp'];

Database::getConnection()->query("UPDATE podklady_pracownika SET x='$x', y='$y' WHERE idp=$idp AND idpod=$id");
Database::getConnection()->close();

header('Location: podklad.php?id=' . $id);