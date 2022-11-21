<?php
//lees het id uit de url
$id = $_GET['id'];
$onderwerp = $_GET['onderwerp'];
$inhoud = $_GET['inhoud'];
//als er een id is...
if ($id !="") {
    //toon het id op het scherm
    echo "Verwijder item: " . $onderwerp . " " .  $inhoud . " met id: " . $id . "<br/>";
    //voor de zekerheid vragen
    echo "<p>Weet je het zeker?</p>";
    //bij JA: verwijder het item (op een nieuwe pagina)
    echo "<a href='verwijder_verwerk.php?id={$id}'> Ja </a> <br/><br/>";
} else {
    echo "Geen ID gevonden<br/>";
}