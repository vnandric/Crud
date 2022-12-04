<?php

require_once 'session.inc.php';

//Voeg de dtabase-verbinding toe
require 'config.php';

//Lees het id uit de url
$id = $_GET['id'];
//toon het id op het scherm
echo "ID van het agenda-item is: " . $id . "<br/>";
//maak de query om de gegevens van het item op te halen
$query = "SELECT * FROM crud_agenda WHERE ID = " . $id;
//voer de query uit, en vang het resultaat op
$result = mysqli_query($mysqli, $query);

if (!$result)
{
    echo "<p>FOUT!</p>";
    echo "<p>" . $query . "</p>";
    echo "<p>" . mysqli_error($mysqli) . "</p>";
    exit;
}

//als er een record gevonden is
if (mysqli_num_rows($result) > 0)
{
    echo "<table border='1px'>";

    echo "<tr><th>Onderwerp</th><th>Inhoud</th><th>Begindatum</th><th>Einddatum</th><th>Prioriteit</th><th>Status</th><th>Verwijder</th></tr>";
    //er hoeft maar 1 item uitgelezen te worden, dus geen "while"
    $item = mysqli_fetch_assoc($result);

    echo "<tr>";
        //toon de gegevens van het item
        echo "<td>" . $item['Onderwerp'] . "</td>";
        echo "<td>" . $item['Inhoud'] . "</td>";
        echo "<td>" . $item['Begindatum'] . "</td>";
        echo "<td>" . $item['Einddatum'] . "</td>";
        echo "<td>" . $item['Prioriteit'] . "</td>";
        echo "<td>" . $item['Status'] . "</td>";
        echo "<td><a href='verwijder.php?id=" . $item['ID'] . "&onderwerp=" . $item['Onderwerp'] . "&inhoud=" . $item['Inhoud'] ."'>verwijder</a></td>";
    echo "</table>";
} else {
    echo "Er is geen record met ID: " . $id . "<br/>";
}

//terug naar het overzicht
echo "<a href='toonagenda.php'>OVERZICHT</a>";