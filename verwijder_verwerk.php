<?php

require_once 'session.inc.php';

require 'config.php';

$id = $_GET['id'];
//Toon het id op het scherm
echo "Item met ID " . $id . " word verwijderd<br/>";
//maak een query om het item te verwijderen
$query = "DELETE FROM crud_agenda WHERE ID = " . $id;
//voer de query uit, en vang het 'resultaat' (true/false) op
$result = mysqli_query($mysqli, $query);
//als het gelukt is 

if ($id !="") {
    if ($result) {
        echo "Het item is verwijderd<br/>";
    } else {
        echo "FOUT bij het verwijderen<br/>";
        echo $query . "<br/>";
        echo mysqli_error($mysqli);
    }
} else {
    echo "Geen ID gevonden<br/>";
}

echo "<a href='toonagenda.php'>OVERZICHT</a>";