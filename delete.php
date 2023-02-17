<?php

require_once "database.php";

$id = $_GET["id"] ?? "";

if (!$id) {
    header("Location: /read.php");
    die();
}

$stmt = $pdo->prepare("DELETE FROM achtbaan WHERE id = ?");
$stmt->bindValue(1, $id);

$stmt->execute();

header("Refresh: 2; url=/read.php");
die("De achtbaan is verwijderd.");
