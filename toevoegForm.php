<?php

session_start();
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form name="agendaFormulier" method="post" action="toevoegVerwerk.php">
        <table>
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
            <tr>
                <td>Onderwerp:</td>
                <td><input type="text" name="onderwerpVeld"></td>
            </tr>
            <tr>
                <td>Inhoud:</td>
                <td><input type="text" name="inhoudVeld"></td>
            </tr>
            <tr>
                <td>Begindatum:</td>
                <td><input type="date" name="begindatumVeld"></td>
            </tr>
            <tr>
                <td>Einddatum:</td>
                <td><input type="date" name="einddatumVeld"></td>
            </tr>
            <tr>
                <td>Prioriteit:</td>
                <td><input type="number" name="prioritreitVeld" min="1" max="5" value="3"></td>
            </tr>
            <tr>
                <td>status:</td>
                <td><select name="statusVeld">
                    <option value="n" selected>Niet begonnen</option>
                    <option value="b">Bezig</option>
                    <option value="a">Afgerond</option>
                </select>
                </td>
            </tr>
            <tr>
                <td> </td>
                <td><input type="submit" name="verzend" value="Voeg toe aan agenda"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>