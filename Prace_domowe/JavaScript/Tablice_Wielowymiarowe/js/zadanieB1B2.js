    /* 
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     * Zadanie B1
     
     Napisz funkcję print2DArray, która jako argument przyjmuje tablicę dwuwymiarową. 
     Następnie funkcja ta ma wypisać w konsoli zawartość tej tablicy.
     
     Zadanie B2
     
     Stwórz ręcznie dwuwymiarową tablicę i przetestuj ją na rozwiązaniu zadania B1.
     */
    var MultiTable = [
        [1, 36, 87, 28, 36],
        [8, 85, 46, 85, 36],
        [7, 45, 36, 47, 54],
        [8, 45, 11, 64, 82]
    ];

    function printMultiTable(table) {
        for (var i = 0; i < table.length; i++) {
            for (j = 0; j < table[i].length; j++) {
                console.log(table[i][j]);
            }
        }


    }

    printMultiTable(MultiTable);
