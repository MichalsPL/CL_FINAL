
<?php

    $podane = array(56, 563, 9, 854, 14, 11, 792, 13, 1, 4);
    $licznik = 0;

//

    function bubbleSort($dane, &$licznik) { //pocztek funkcji
        $zmiany = true; 
        while ($zmiany) { 
            $zmiany = false; 
            for ($i = 0; $i < count($dane) - 1; $i++) { 
                if ($dane[$i] > $dane[$i + 1]) { 
                    $wieksza = $dane[$i];
                    $mniejsza = $dane[$i + 1];
                    $dane[$i] = $mniejsza;
                    $dane[$i + 1] = $wieksza;
                    $zmiany = true;
                } 
            } 
            $licznik++;
            if (!$zmiany) {
                return $dane;
            }
        } // koniec pętli czy trzeba szukać dalej
    }

//koniec funkcji

