<?php

require 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

//controleer of alle formuliervelden zijn ingevuld
if (strlen($username) > 0 && strlen($password) > 0) {
    //versleutel het wachtwoord
    $password=sha1($password);
    //maak de controlequery
    $query = "SELECT * FROM users ";
    $query .= "WHERE username='$username' AND password='$password'";
    //query uitvoeren
    $result = mysqli_query($mysqli, $query);
    //controleer of de login correct was
    if (mysqli_num_rows($result) == 1) {
        echo "<p>Ingelogd!</p>";

        //start de sessie
        session_start();
        //sla de username op in een sessie
        $_SESSION['username'] = $username;
        //stuur door naar de homepage
        header("location:toonagenda.php");
    } else {
        echo "Naam en/of wachtwoord zijn fout.</p>";
    }
}