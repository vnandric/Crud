<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "config.php";

session_start();

//lees de waarde uit en stop de waarden in variabelen
$ond = strip_tags($_POST['onderwerpVeld']);
$inh = strip_tags($_POST['inhoudVeld']);
$begin = strip_tags($_POST['begindatumVeld']);
$eind = strip_tags($_POST['einddatumVeld']);
$prior = strip_tags($_POST['prioritreitVeld']);
$stat = strip_tags($_POST['statusVeld']);

$datumb = strtotime($begin);
$gdatumb = date('Y-m-d', $datumb);

$datume = strtotime($eind);
$gdatume = date('Y-m-d', $datume);

// is er een formulier verstuurd?
// -> check of de knop is verstuurd:
if (isset($_SESSION["token"]) && $_SESSION["token"] == $_POST["csrf_token"]) {
    if (isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"] == "https://87788.stu.sd-lab.nl/crud/toevoegForm.php") {
    
        if (isset($_POST['verzend']) &&
            !empty($_POST['onderwerpVeld']) &&
            !empty($_POST['inhoudVeld']) &&
            !empty($_POST['begindatumVeld']) &&
            !empty($_POST['einddatumVeld']) &&
            isset($_POST['prioritreitVeld']) &&
            isset($_POST['statusVeld'])) {
        
            if (trim($_POST['onderwerpVeld']) && trim($_POST['inhoudVeld'])) {
                
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
                        echo "Het formulier is niet (goed) verstuurd<br/>";
                        echo "<a href='toevoegForm.php'>Terug</a>";
                    }
                } else {
                    echo "Het formulier is niet (goed) verstuurd<br/>";
                    echo "<a href='toevoegForm.php'>Terug</a>";
                }
            } else {
                echo "Het formulier is niet (goed) verstuurd4<br/>";
                echo "<a href='toevoegForm.php'>Terug</a>";
            }
        } else {
            echo "Het formulier is niet (goed) verstuurd<br/>";
            echo "<a href='toevoegForm.php'>Terug</a>";
        }
    } else {
        echo "Het formulier is niet (goed) verstuurd<br/>";
        echo "<a href='toevoegForm.php'>Terug</a>";
    }
} else {
    echo "Het formulier is niet (goed) verstuurd<br/>";
    echo "<a href='toevoegForm.php'>Terug</a>";
}