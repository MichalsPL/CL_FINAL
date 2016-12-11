<?php
    $komunikat = "";

    function beben($start, $stop) {
        $tablica = range($start, $stop);
        shuffle($tablica);
        $tablica_1_6 = array_slice($tablica, 0, 6);
        return $tablica_1_6;
    }

    if (        
            isset($_GET['start']) &&
            isset($_GET['stop']) &&
            $_GET['start'] < $_GET['stop'] &&
            $_GET['start'] >= 1 &&
            $_GET['stop'] <= 49 
    ) {
        $start = $_GET['start'];
        $stop = $_GET['stop'];    
    } else {
        $start = 1;
        $stop = 49;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['numbers']) &&
            count($_POST['numbers']) == 6
    ) {
        $losowaneLiczby = beben($start, $stop);
        if (in_array($_POST['numbers'], $losowaneLiczby)) {
            $komunikat = "<H2>WYGRAES</h2>";
        } else {
            $komunikat = "<h1>niestety nie wygrales</h1>";
            $komunikat.= "<h3>Wylosowane liczby:" . implode(",", $losowaneLiczby) . "</h3>";
            $komunikat.= "<br /> <h3>Twoje liczby" . implode(",", $_POST['numbers']) . "</h3><br />";
        }
    } else
        $komunikat = "zaznacz 6 pol";
?>
<html>
    <body>


        <?= $komunikat ?>
        <form method="POST">
            <label>LICZBY</label>
            <?php
                for ($i = $start; $i <= $stop; $i++) {
                    print'<input type="checkbox" name="numbers[]" value="' . $i . '" />' . $i;
                }
            ?>
            <input type="submit"/>
        </form>
        <hr>
        <h3>OGRANICZ ZAKRES</h3>
        <br>
        <h5>start</h5>
        <form method="GET" >
            <select name="start">


                <?php
                    for ($i = 1; $i < 49; $i++) {
                        print
                                '<option value="' . $i . '">' . $i . '</option>';
                    }
                ?>
            </select>
            <h5>stop</h5>
            <select name="stop">

                <?php
                    for ($j = 2; $j <= 49; $j++) {
                        print
                                '<option value="' . $j . '">' . $j . '</option>';
                    }
                ?>
            </select>
            <a href="warsztaty2 lotto_wersjab.php"><input type="submit"></a>
        </form>



    </body>
</html>