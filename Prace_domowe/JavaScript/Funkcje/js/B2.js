
    function calculateTip(amount, raiting) {
        var result = 0;
        switch (raiting){
            case "Bardzo dobra obsluga":{
                result = amount * 0.25;
                break;
            }
            case "Dobra obsluga":{
                result = amount * 0.2;
                break;
            }
            case "Srednia obsluga":{
                result = amount * 0.15;
                break;
            }
            case "Zla obsluga":{
                result = 0;
                break;
            }
            default:
                result = "opis nieczytelny";
        }

        return result;
    }
    console.log(calculateTip(100, "Bardzo dobra obsluga"));