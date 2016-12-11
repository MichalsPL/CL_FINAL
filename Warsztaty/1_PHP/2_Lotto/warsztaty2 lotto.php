<?php
    $komunikat = "";

    function beben($start = 1, $stop = 49) {
        $tablica_1_49 = range($start, $stop);
        shuffle($tablica_1_49);
        $tablica_1_6 = array_slice($tablica_1_49, 0, 6);
        return $tablica_1_6;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($_POST['numbers']) == 6) {
        $losowaneLiczby = beben(1, 49);
        if (in_array($_POST['numbers'], $losowaneLiczby)) {
            $komunikat = "<H2>WYGRAES</h2>";
        } else {
            $komunikat = "<h1>niestety nie wygrales</h1>";
            $komunikat.= "<h3>wylosowane liczby:" . implode(",", $losowaneLiczby) . "</h3>";
            $komunikat.= "<br><h3> Twoje liczby" . implode(",", $_POST['numbers']) . "</h3><br>";
        }
    } else
        $komunikat = "zaznacz 6 pol"
        ?>

<html>
    <body>
        <?= $komunikat ?>
        <form method="POST">
            <label>LICZBY</label>
            <?php
                for ($i = 1; $i <= 49; $i++) {
                    print'<input type="checkbox" name="numbers[]" value="' . $i . '" />' . $i;
                }
            ?>
            <input type="submit"/>
        </form>
    </body>
</html>