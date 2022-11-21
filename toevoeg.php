<?php
require "config.php";

$query = "INSERT INTO crud_agenda (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status)
        VALUES ('Proces2', 'ERD Opdrachten afronden', '2022-10-20', '2022-10-27', 2, 'b')";

$result = mysqli_query($mysqli, $query);

if ($result) {
    echo "Het item is toegevoegd<br/>";
} else {
    echo "FOUT bij toevoegen<br/>";
    echo mysqli_error($mysqli);
}

echo "<a href='toonagenda.php'>OVERZICHT</a>";
