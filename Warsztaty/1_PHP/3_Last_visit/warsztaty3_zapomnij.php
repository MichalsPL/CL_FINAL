
<?php

    if (isset($_COOKIE['lastVisit'])) { 
        if (isset($_POST)) {
            echo 'twoje ciastko zostalo skasowane';
            setcookie('lastVisit', '', time() - 100);
            echo '<a href="warsztaty3_odwiedziny.php">kliknij tu aby przejśź na'
            . ' strone która zapamieta twoje odwedziny</a>';
        }
    } else {
        echo "nie mam twojego ciacha";
        echo '<a href="warsztaty3_odwiedziny.php">kliknij tu aby przejść na '
        . 'strone która zapamieta twoje odwedziny</a>';
    }



