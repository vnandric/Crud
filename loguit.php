<?php

//start de sessie
session_start();
//verwijder de sessie
session_destroy();
//ga naar de inlogpagina
header("location:inlog.php");