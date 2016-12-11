/**
 * Created by Jacek on 2016-01-11.
 */
//Zajrzyj do pliku zadanieB2.js. Jest tam napisany szkielet funkcji przyjmującej 
//trzy liczby. Dopisz ciało funkcji tak, żeby zwracać true (wartość booleanowską), 
//jeżeli z podanych liczb można stworzyć trójkąt , a false jeżeli nie. Tę figurę 
//geometryczną można zbudować z trzech linii tylko wtedy, gdy suma długości dwóch z nich jest większa
// niż długość trzeciej linii, czyli:

function canCreateTriagle(a, b, c) {
    if (a + b < c || a + c < b || b + c < a)
        return false;
    else
        return true;
}

console.log("z liczb 5, 6, 4 można stworzyć trójkąt (powinno zwrócić true) " + canCreateTriagle(5, 6, 4));
console.log("z liczb 100, 3, 6 nie można stworzyć trójkąta (powinno zwrócić false) " + canCreateTriagle(100, 3, 6));
console.log("z liczb 12, 14, 9 można stworzyć trójkąt (powinno zwrócić true) " + canCreateTriagle(12, 14, 9));
console.log("z liczb 3, 6, 200 nie można stworzyć trójkąta (powinno zwrócić false) " + canCreateTriagle(3, 6, 200));
console.log("z liczb 65, 53, 74 można stworzyć trójkąt (powinno zwrócić true) " + canCreateTriagle(65, 53, 74));
console.log("z liczb 600, 800, 1 nie można stworzyć trójkąta (powinno zwrócić false) " + canCreateTriagle(600, 800, 1));
