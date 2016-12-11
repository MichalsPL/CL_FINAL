<?php

    $a = "0";
    echo(strlen($a)); // 1 liczy długość i ją wyświetla 1 znak więc 1
    echo(empty($a) ? $a : 5); // 0empty sprawdza czy to co w środku  jest puste
// zgodnie z http://php.net/manual/en/function.empty.php
// "0" da true więc $a 
    echo($a ? : 5); // $a jest fałzem więc skoro fałsz 5

/*
Co zostanie wyświetlone przez funkcję?
a. 105,
b. 100,
c. 050,
d. 005,
e. 150.


Prawidłowa odpowiedź:A
Uzasadnienie:
w komentarzach przy poszczególnych liniach
 */
