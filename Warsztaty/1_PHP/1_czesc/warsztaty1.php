<?php

$powitanie="PODAJ IMIE";
if (
        $_SERVER["REQUEST_METHOD"]=="POST"
        && isset($_POST['imie'])
        &&  trim($_POST['imie'])!=""
        &&strlen($_POST['imie'])>3
        )

    $powitanie="Cześć, ".$_POST['imie']." !"
?>
<html>
    <head>
        <title>POWITANIE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1><?=$powitanie?></h1>
        <form method="POST">
            <label>imie:
            <input type="text" name="imie"/></label>
            <input type="submit"/>

        </form>




    </body>
</html>