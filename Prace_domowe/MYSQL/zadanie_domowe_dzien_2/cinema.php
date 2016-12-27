<?php
    include_once 'src/connect.php';
    $conn = connect();

    function showCinemaDetails($conn, $cinemaId = null) {
        $safeCinemaId = intval($cinemaId);
        if ($safeCinemaId > 0) {
            $sql = "SELECT DISTINCT Movies.name, Movies.id FROM seans "
                    . "LEFT JOIN Movies ON Movies.id = seans.movie_id "
                    . "WHERE seans.cinema_id = " . $safeCinemaId;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                print "Widzisz wszystkie Filmy w wybranym kinie<br>";
                while ($row = $result->fetch_assoc()) {
                    print "tytuł filmu : " . $row['name'] . "<br>";
                    $sql2 = "SELECT seans.id FROM seans "
                            . "LEFT JOIN Movies ON Movies.id = seans.movie_id "
                            . "WHERE seans.cinema_id = " . $safeCinemaId . " "
                            . "AND Movies.id =" . $row['id'];
                    
                    $result2 = $conn->query($sql2);
                    if ($result2) {
                        print "poniżej widzisz id seansow filmu<br><br>";
                        while ($row2 = $result2->fetch_assoc()) {
                            print "dostępny seans o id" . $row2['id'] . '<br>';
                            print '<a href="buy.php?seans=' . $row2['id'] .
                                    '">kup bilet na seans</a><br>';
                        }
                    }
                    print '<hr>';
                }
            } elseif ($result->num_rows === 0) {
                print "Kino nie wyświetla teraz filmów<br>";
            } else {
                print "Wystąpił błąd" . $conn->error;
            }
        }
    }
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>...</title>
    </head>
    <body>

        <?php
            showCinemaDetails($conn, $_GET['id']);
            $conn->close();
            $conn = null;
        ?>

    </body>	
</html>

