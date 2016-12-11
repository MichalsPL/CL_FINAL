<?php

    if (isset($_COOKIE['lastVisit'])) {
        echo "witaj ostatnio byles u nas " . date('r', $_COOKIE['lastVisit']);
        setcookie("lastVisit", time());
    } else {
        echo "witaj jeszcze cię u nas nie było. teraz będziemy cię pamiętać ";
        setcookie("lastVisit", time());
    }

    echo "<br />";
    echo 'nie chcesz zeby strona cie pamietala kliknij <a href="warsztaty3_zapomnij.php">tu</a>';

    