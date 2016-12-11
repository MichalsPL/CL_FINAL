
    function factors(number) {
        result = [];
        if (number > 0) {

            for (var i = 0; i < number / 2; i++) {
                if ((number % i) == 0) {
                    result.push(i);
                }
            }
        }
        return result;
    }
    var test = 54;
    console.log(factors(test))