<?php

require_once 'session.inc.php';

?>
<html>
    <head>
        <title>Gegevens aanpassen</title>
    </head>
    <body>
    <?php
    //Voeg de dtabase-verbinding toe
    require 'config.php';

    //Lees het id uit de url
    $id = $_GET['id'];
    //toon het id op het scherm
    //echo "ID van het agenda-item is: " . $id . "<br/>";
    //maak de query om de gegevens van het item op te halen
    $query = "SELECT * FROM crud_agenda WHERE ID = " . $id;
    //voer de query uit, en vang het resultaat op
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "<p>FOUT!</p>";
        echo "<p>" . $query . "</p>";
        echo "<p>" . mysqli_error($mysqli) . "</p>";
        exit;
    }

    //als er een record gevonden is
    if (mysqli_num_rows($result) > 0) {
        //er hoeft maar 1 item uitgelezen te worden, dus geen "while"
        $item = mysqli_fetch_assoc($result);
        ?>

        <form name="aanpasFormulier" method="post" action="pasaanVerwerk.php">
            <input type="hidden" name="idVeld" value="<?php echo $item['ID']; ?>"/>
            <table>
                <tr>
                    <td>Onderwerp:</td>
                    <td><input type="text" name="onderwerpVeld" value="<?php echo $item['Onderwerp']; ?>" maxlength="30" required></td>
                </tr>
                <tr>
                    <td>Inhoud:</td>
                    <td><input type="text" name="inhoudVeld" value="<?php echo $item['Inhoud']; ?>" maxlength="100" required></td>
                </tr>
                <tr>
                    <td>Begindatum:</td>
                    <td><input type="date" name="begindatumVeld" value="<?php echo $item['Begindatum']; ?>" required></td>
                </tr>
                <tr>
                    <td>Einddatum:</td>
                    <td><input type="date" name="einddatumVeld" value="<?php echo $item['Einddatum']; ?>" required></td>
                </tr>
                <tr>
                    <td>Prioriteit:</td>
                    <td><input type="number" name="prioritreitVeld" value="<?php echo $item['Prioriteit']; ?>" min="1" max="5" value="3"></td>
                </tr>
                <tr>
                    <td>status:</td>
                    <td><select name="statusVeld">
                        <option value="n">Niet begonnen</option>
                        <option value="b" selected>Bezig</option>
                        <option value="a">Afgerond</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td><input type="submit" name="verzend" value="item aanpassen"></td>
                </tr>
            </table>
        </form>

        <?php
            //toon de gegevens van het item
            echo $item['Onderwerp'] . "<br/>";
            echo $item['Inhoud'] . "<br/>";
            echo $item['Begindatum'] . "<br/>";
            echo $item['Einddatum'] . "<br/>";
            echo $item['Prioriteit'] . "<br/>";
            echo $item['Status'] . "<br/>";
    } else {
        echo "Er is geen record met ID: " . $id . "<br/>";
    }

    //terug naar het overzicht
    echo "<a href='toonagenda.php'>OVERZICHT</a>";
    ?>
    </body>
</html>