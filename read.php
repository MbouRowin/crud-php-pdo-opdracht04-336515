<?php

require_once "database.php";

$stmt = $pdo->query("SELECT * from achtbaan ORDER BY Topsnelheid DESC");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Achtbanen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Achtbanen</h1>
        <a href="index.php">Create</a>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Achtbaan</th>
                <th>Pretpark</th>
                <th>Land</th>
                <th>Topsnelheid</th>
                <th>Hoogte</th>
                <th>Openingsdatum</th>
                <th>Cijfer</th>
            </tr>
            <?php while ($row = $stmt->fetch()) : ?>
                <tr>
                    <td><?= htmlspecialchars($row["Id"]) ?></td>
                    <td><?= htmlspecialchars($row["NaamAchtbaan"]) ?></td>
                    <td><?= htmlspecialchars($row["NaamPretpark"]) ?></td>
                    <td><?= htmlspecialchars($row["Land"]) ?></td>
                    <td><?= htmlspecialchars($row["Topsnelheid"]) ?></td>
                    <td><?= htmlspecialchars($row["Hoogte"]) ?></td>
                    <td><?= htmlspecialchars($row["Datum"]) ?></td>
                    <td><?= htmlspecialchars($row["Cijfer"]) ?></td>
                    <td><a href="update.php?id=<?= $row["Id"] ?>">Update</a></td>
                    <td><a href="delete.php?id=<?= $row["Id"] ?>">Delete</a></td>
                </tr>
            <?php endwhile ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>