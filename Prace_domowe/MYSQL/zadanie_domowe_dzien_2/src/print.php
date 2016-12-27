<?php

    function printCinemas($result) {

        echo"<hr><ul>";
        while ($row = $result->fetch_assoc()) {
            print "<li>";
            echo "ID kina " . $row['id'] . "<BR>";
            echo "Nazwa kina " . $row['name'] . "<BR>";
            echo "Aders kina " . $row["adress"] . "<BR>";
            echo '<a href="admin_cinema.php?delete=Kino&id='
            . $row['id'] . '">USUŃ ' . $row['name'] . '</a>' . "<BR>";
            echo"</li>";
        }
        echo"</ul><hr>";
    }

    function printPayment($result) {

        echo"<ul>";
        while ($row = $result->fetch_assoc()) {
            print "<li>";
            echo "ID Płatności " . $row['id'] . "<BR>";
            echo "Data Płatności " . $row['payment_date'] . "<BR>";
            echo "Typ Płatności " . $row['payment_type'] . "<BR>";
            echo '<a href="admin_payment.php?delete=Płatność&id='
            . $row['id'] . '">USUŃ PŁATNOŚĆ' . $row['id'] . '</a>' . "<BR>";
            echo"</li><hr>";
        }
        echo"</ul><hr>";
    }

    function printMovies($result) {

        echo"<ul>";
        while ($row = $result->fetch_assoc()) {
            print "<li>";
            echo "ID filmu " . $row['id'] . "<BR>";
            echo "Tytuł filmu " . $row['name'] . "<BR>";
            echo "Opis filmu " . $row["description"] . "<BR>";
            echo "Rating filmu " . $row["rating"] . "<BR>";
            echo '<a href="admin_movie.php?delete=Film&id='
            . $row['id'] . '">USUŃ ' . $row['name'] . '</a>' . "<BR>";
            echo"</li>";
        }
        echo"</ul><hr>";
    }

    function printTickets($result) {
        echo"<ul>";
        while ($row = $result->fetch_assoc()) {
            print "<li>";
            echo "ID Biletu " . $row['id'] . "<BR>";
            echo "Cena Biletu " . $row['price'] . "<BR>";
            echo "Ilość Biletów " . $row["quantity"] . "<BR>";
            echo "id Seansu " . $row['seans'] . "<BR>";
            if ($row['id'] === $row['payment']) {
                print 'OPŁACONY';
            } else {
                print 'NIE OPŁACONY';
            }
            echo '<br><a href="admin_ticket.php?delete=Bilet&id=' . $row['id'] .
            '">USUŃ BILET ID' . $row['id'] . '</a>' . "<BR>";

            echo"</li><hr>";
        }
        echo"</ul><hr>";
    }

    function showAllmowies($conn) {
        $sql = "select * FROM Movies ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            print "Widzisz wszystkie kina<br>";
            while ($row = $result->fetch_assoc()) {
                print "Tytuł filmu:  " . $row['name'] . "<br>";
                print '<a href="movie.php?id=' . $row['id'] . '">zobacz szczegóły filmu</a>';
                print '<hr>';
            }
        } elseif ($result->num_rows == 0) {
            print "brak kin w bazie<br>";
        } else {
            print "Wystąpił błąd" . $conn->error;
        }
    }
    