
//Zadanie B1
//
//Stwórz tablicę z listą swoich ulubionych owoców.
//        Następnie: 
//        1. Wypisz pierwszy owoc w konsoli. 
//        2. Wypisz ostatni owoc w konsoli (skorzystaj z atrybutu length). 
//        3. W pętli wypisz wszystkie owoce (skorzystaj z atrybutu length).

    var fruits = ["jablko", "banan", "gruszka"];
    console.log(fruits[0]);
    console.log(fruits[fruits.length - 1]);
    for (var i = 0; i < fruits.length; i++) {
        console.log(fruits[i]);
    }