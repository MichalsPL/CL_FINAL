<?php

    $a = 7;
    $b = 4;

    function b($a, $b) {
        global $a, $b;
        $a += 7;
        $a++;
        $b += $a;
        return true;
    }

    echo("$b $a");

    /*
Co zostanie wyświetlone przez funkcję?
a. 1419,
b. 74,
c. 1915,
d. 47,
e. 1519.


Prawidłowa odpowiedź: d 
Uzasadnienie: 
funkcja w tym przypadku nie wpływa na polecenie echo
 
 */
