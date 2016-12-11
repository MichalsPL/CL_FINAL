

    function createMultiTable(rows, columns) {
        var table = [];
        var next = 1;
        for (var i = 0; i < rows; i++) {
            var row = [];
            for (j = 0; j < columns; j++) {
                row[j] = next;
                next++;
            }
            table.push(row);
        }
        return table;
    }

    function printMultiTable(table) {
        for (var i = 0; i < table.length; i++) {
            for (j = 0; j < table[i].length; j++) {
                console.log(table[i][j]);
            }
        }
    }

    var MultiTable = createMultiTable(7, 4);
    printMultiTable(MultiTable);
