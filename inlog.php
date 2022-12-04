<?php 

require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inlog agenda</title>

</head>
<body>
    <form name="inlogFrom" method="post" action="inlog_verwerk.php">
        <table border="1px">
            <th>Log in</th>
            <tr>
                <td>Gebruiker: </td>
                <td><input type="text" name="username" id="username" required></td>
            </tr>
            <tr>
                <td>Wachtwoord: </td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="inloggen" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>