<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//lees de waarde uit en stop de waarden in variabelen
$ond = $_POST['onderwerpVeld'];
$inh = $_POST['inhoudVeld'];
$begin = $_POST['begindatumVeld'];
$eind = $_POST['einddatumVeld'];
$prior = $_POST['prioritreitVeld'];
$stat = $_POST['statusVeld'];

$datumb = strtotime($begin);
$gdatumb = date('Y-m-d', $datumb);

$datume = strtotime($eind);
$gdatume = date('Y-m-d', $datume);

require "config.php";
// is er een formulier verstuurd?
// -> check of de knop is verstuurd:
if (isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"] == "https://87788.stu.sd-lab.nl/crud/toevoegForm.html") {
    
    if (isset($_POST['verzend']) &&
    !empty($_POST['onderwerpVeld']) &&
    !empty($_POST['inhoudVeld']) &&
    !empty($_POST['begindatumVeld']) &&
    !empty($_POST['einddatumVeld']) &&
    isset($_POST['prioritreitVeld']) &&
    isset($_POST['statusVeld'])) {
    
        if (is_numeric($prior) && $prior > 1 && $prior <= 5) {
            if ($begin == $gdatumb && $eind == $gdatume) {
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
                echo "Het formulier is niet (goed) verstuurd2<br/>";
                echo "<a href='toevoegForm.html'>Terug</a>";
            }
        } else {
            echo "Het formulier is niet (goed) verstuurd1<br/>";
            echo "<a href='toevoegForm.html'>Terug</a>";
        }
    } else {
        echo "Het formulier is niet (goed) verstuurd3<br/>";
        echo "<a href='toevoegForm.html'>Terug</a>";
    }
} else {
    echo "Het formulier is niet (goed) verstuurd<br/>";
    echo "<a href='toevoegForm.html'>Terug</a>";
}