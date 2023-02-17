<?php

require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $achtbaan = $_POST["achtbaan"] ?? "";
    $pretpark = $_POST["pretpark"] ?? "";
    $land = $_POST["land"] ?? "";
    $topsnelheid = $_POST["topsnelheid"] ?? "";
    $hoogte = $_POST["hoogte"] ?? "";
    $opening = $_POST["opening"] ?? "";
    $cijfer = $_POST["cijfer"] ?? "";

    $stmt = $pdo->prepare("INSERT INTO achtbaan VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindValue(1, $achtbaan);
    $stmt->bindValue(2, $pretpark);
    $stmt->bindValue(3, $land);
    $stmt->bindValue(4, $topsnelheid);
    $stmt->bindValue(5, $hoogte);
    $stmt->bindValue(6, $opening);
    $stmt->bindValue(7, $cijfer);

    $stmt->execute();

    header("Refresh: 2; url=/read.php");
    die("De achtbaan is aangemaakt.");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoer Achtbaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Invoer Achtbaan</h1>
        <a href="read.php">Read</a>

        <form method="post">
            <div class="mb-3">
                <label for="achtbaan" class="form-label">Naam Achtbaan</label>
                <input type="text" name="achtbaan" id="achtbaan" class="form-control">
            </div>

            <div class="mb-3">
                <label for="pretpark" class="form-label">Naam Pretpark</label>
                <input type="text" name="pretpark" id="pretpark" class="form-control">
            </div>

            <div class="mb-3">
                <label for="land" class="form-label">Naam Land</label>
                <input type="text" name="land" id="land" class="form-control">
            </div>

            <div class="mb-3">
                <label for="topsnelheid" class="form-label">Topsnelheid (km/u)</label>
                <input type="number" min="1" max="200" name="topsnelheid" id="topsnelheid" class="form-control">
            </div>

            <div class="mb-3">
                <label for="hoogte" class="form-label">Hoogte</label>
                <input type="number" min="1" max="200" name="hoogte" id="hoogte" class="form-control">
            </div>

            <div class="mb-3">
                <label for="opening" class="form-label">Datum eerste opening</label>
                <input type="date" name="opening" id="opening" class="form-control">
            </div>

            <div class="mb-3">
                <label for="cijfer" class="form-label">Cijfer voor achtbaan</label>
                <input type="range" min="1" max="10" step="0.1" name="cijfer" id="cijfer" class="form-range">
                <p id="cijfer-value"></p>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary">Sla op</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        const cijfer = document.getElementById("cijfer");
        const cijferValue = document.getElementById("cijfer-value");
        cijferValue.innerHTML = cijfer.value;
        cijfer.addEventListener("input", () => cijferValue.innerHTML = cijfer.value);
    </script>
</body>

</html>