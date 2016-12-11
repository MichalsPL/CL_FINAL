//Komentarze do kodu umieśc bezpośrednio pod linią w której znaleziono błąd

var i = 1;
// przy zerze mnożenie przez 2 jest bez sensu
while (i < 100) {
    //jak porownac true do 100
    console.log('Aktualna wartość zmiennej i to: ' + i);
    i = i * 2;
}

var year = 2016;
if(year %4 == 0) {
    // blad logiczny bez sensu poza tym przypisanie zamiast porownania 
    console.log('Rok przestępny');}
////brak klamerki zamykającej 
    else{
        //// brak klamerki otwierajacej
    console.log('Rok nieprzestępny');
}


console.log('Błędy poprawione, więc ten tekst będę widzieć w konsoli po uruchomieniu skryptu'+'HURRRA!!!');
// kropka nie działa zamiast niej musi być +
