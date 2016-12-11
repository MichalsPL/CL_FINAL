    /* 
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

//apisz funkcję getMissingElement, która ma przyjmować tylko jeden argument – 
//tablicę zawierającą rosnące liczby całkowite. Funkcja ta ma zwracać brakującą liczbę 
//(czyli miejsca, w którym tablica skacze o dwa zamiast o jeden). J
//eżeli w tablicy nie ma brakujących liczb, to funkcja ma zwracać null.
//
//getMissingElement([1,2,3,4,5,6,7]) => null
//getMissingElement([6,7,8,10,11,12,13,14,15]) => 9
//getMissingElement([-4,-3,-2,0,1,2,3,4]]) => -1

    function getMissingElement(array) {
        for (var i = 0; i < array.length; i++) {
            if ((array[i + 1] - array[i]) > 1) {
                var result = array[i] + 1;
            }
        }
        return (result);
    }

    console.log(getMissingElement([-4,-3,-2,0,1,2,3,4]));