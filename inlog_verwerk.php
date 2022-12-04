<?php

require 'config.php';

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
    } else {
        echo "Naam en/of wachtwoord zijn fout.</p>";
    }
}