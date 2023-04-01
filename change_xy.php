<?php
include "Database.php";

$x = $_POST['x'];
$y = $_POST['y'];
$id = $_POST['id'];
$ids = $_POST['ids'];

Database::getConnection()->query("UPDATE srodek SET X_srodka='$x', Y_srodka='$y' WHERE ids=$ids");
Database::getConnection()->close();

header('Location: podklad.php?id=' . $id);