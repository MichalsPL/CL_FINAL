
<?php

    function czyWtablicy($szukana, $tablica, &$licznik = 0) {
        foreach ($tablica as $indeks => $wartosc) {
            if ($wartosc == $szukana) {
                return true;
            } else {
                $licznik++;
            }
        }
        if ($licznik == count($tablica)) {
            $licznik = 0;
            return FALSE;
        }
    }

    $szukam = "zenek";
    $dane = ["kamil", "zenek", "krzysiek", "f"];
    czyWtablicy($szukam, $dane, $licznik);
    print $licznik; // licznik liczy tak jak tablice czyli zaczyna od 0
// bez referencji zmienna nie będzie widoczna na zewnątrz funkcji
?>
