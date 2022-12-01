<?php
// voeg database verbinding toe
require 'config.php';

// maak query
$query = "SELECT * FROM crud_agenda";
// voer de query uit en vang he resultaat op
$result = mysqli_query($mysqli, $query);
// als er geen resultaat is dan is er iets fout gegaan
if (!$result) {
    echo "<p>FOUT!</p>";
    echo "<p>" . $query . "</p>";
    echo "<p>" . mysqli_error($mysqli) . "</p>";
    exit;
}
// als er records zijn
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1px'>";

    echo "<tr><th>ID</th><th>Onderwerp</th><th>Inhoud</th><th>Verwijder</th><th>Pas aan</th></tr>";
    // zolang er items uit te lezen zijn...
    while ($item = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
            // toon de gegevens van het item
            echo "<td>" . $item['Onderwerp'] . "</td>";
            echo "<td>" . $item['Inhoud'] . "</td>";
            echo "<td><a href='detail.php?id=" . $item['ID'] . "'>detail</a></td>";
            echo "<td><a href='verwijder.php?id=" . $item['ID'] . "&onderwerp=" . $item['Onderwerp'] . "&inhoud=" . $item['Inhoud'] ."'>verwijder</a></td>";
            echo "<td><a href='pasaan.php?id=" . $item['ID'] . "'>Pas aan</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Geen items gevonden!</p>";
}

echo "<a href='toevoegForm.php'>Toevoegen</a>";