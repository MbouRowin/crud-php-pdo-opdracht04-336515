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
    <title>Bling Bling Nagelstudio Chantal</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div>
            <h1>Bling Bling Nagelstudio Chantal</h1>
            <a href="read.php">Read</a>

            <form method="post" class="mt-1">
                <div>
                    Kies 4 basiskleuren voor uw nagels:
                    <div class="row mt-1">
                        <input type="color" name="kleur-1" value="#ff0000">
                        <input type="color" name="kleur-2" value="#ffffff">
                        <input type="color" name="kleur-3" value="#0000ff">
                        <input type="color" name="kleur-4" value="#ffa500">
                    </div>
                </div>

                <div class="mt-1">
                    <label for="tel" class="block">Uw telefoonnummer:</label>
                    <input type="tel" name="tel" id="tel" class="input" pattern="[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}" required>
                </div>

                <div class="mt-1">
                    <label for="email" class="block">Uw e-mailadres:</label>
                    <input type="email" name="email" id="email" class="input" required>
                </div>

                <div class="mt-1">
                    <label for="land" class="block">Afspraak datum:</label>
                    <input type="datetime-local" name="datum" id="datum" class="input" required>
                </div>

                <div class="mt-1">
                    Soort behandeling:

                    <div class="mt-1">
                        <input type="checkbox" name="nagelbijt" id="nagelbijt">
                        <label for="nagelbijt" class="">Nagelbijt arrangement (termijnbetaling mogelijk) $180</label>
                    </div>

                    <div class="mt-1">
                        <input type="checkbox" name="manicure" id="manicure">
                        <label for="manicure" class="">Luxe manicure (massage en handpakking) $30</label>
                    </div>

                    <div class="mt-1">
                        <input type="checkbox" name="reparatie" id="reparatie">
                        <label for="reparatie" class="">Nagelreparatie per nagel (in eerste week gratis) $5</label>
                    </div>
                </div>

                <input type="hidden" name="now" value="123456">

                <div class="row mt-1">
                    <button class="button">Sla op</button>
                    <button type="reset" class="button">Reset</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>