<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "config.php";
//is er een formulier verstuurd?
// -> check of de knop is verstuurd:
if (isset($_POST['verzend'])) {
    //lees de waarde uit en stop de waarden in variabelen
    $ond = $_POST['onderwerpVeld'];
    $inh = $_POST['inhoudVeld'];
    $begin = $_POST['begindatumVeld'];
    $eind = $_POST['einddatumVeld'];
    $prior = $_POST['prioritreitVeld'];
    $stat = $_POST['statusVeld'];

    //maak een toevoeg-query
    $query = "INSERT INTO crud_agenda";
    $query .= " (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status)";
    $query .= " VALUES ('{$ond}', '{$inh}', '{$begin}', '{$eind}', {$prior}, '{$stat}')";

    $result = mysqli_query($mysqli, $query);

    if ($result) {
        echo "Het item is toegevoegd<br/>";
    } else {
        echo "FOUT bij toevoegen<br/>";
        echo mysqli_error($mysqli);
    }

    echo "<a href='toonagenda.php'>OVERZICHT</a>";
} else {
    echo "Het formulier is niet (goed) verstuurd<br/>";
}