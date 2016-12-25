<?php
    include_once 'src/connect.php';
    $conn = connect();

    function showMovieDetails($conn, $movieId = null) {
        $safeMovieId = intval($movieId);
        if ($safeMovieId > 0) {
            $sql = "SELECT  * FROM Movies  WHERE id = " . $safeMovieId;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    print "Widzisz szczególy wybranego filmu - "
                            . $row['name'] . "<br>";
                    print "rating filmu : " . $row['rating'] . "<br>";
                    print "opis filmu : " . $row['description'] . "<br>";
                    $sql2 = "SELECT Cinemas.name, Cinemas.id FROM seans "
                            . "LEFT JOIN Cinemas ON Cinemas.id = seans.cinema_id "
                            . "WHERE seans.movie_id = " . $safeMovieId;
                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                        print "poniżej widzisz kina w których grany jest film <br><br>";
                        while ($row2 = $result2->fetch_assoc()) {
                            print "Nazwa kina " . $row2['name'] . '<br>';
                            print '<a href="cinema.php?id=' . $row2['id']
                                    . '">zobacz szczegoly kina</a><br>';
                        }
                    }
                    print '<hr>';
                }
            } elseif ($result2->num_rows === 0) {
                print "Żadne kino nie wyświetla filmu<br>";
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
            showMovieDetails($conn, $_GET['id']);
            $conn->close();
            $conn = null;
        ?>

    </body>	
</html>

