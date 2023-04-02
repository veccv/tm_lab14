<?php
include "Database.php";

$pid = $_POST['pracownikId'];
$stan = $_POST['stan'];

Database::getConnection()->query("UPDATE pracownik SET stan='$stan' WHERE idp=$pid");
Database::getConnection()->close();

header('Location: pracownicy.php');