<?php
    include_once 'src/connect.php';
    $conn = connect();

    function showAll($conn) {
        $sql = "select * FROM Cinemas ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            print "Widzisz wszystkie kina<br>";
            while ($row = $result->fetch_assoc()) {
                print "id kina to " . $row['id'] . "<br>";
                print "nazwa kina to " . $row['name'] . "<br>";
                print "adres kina to " . $row['adress'] . "<br>";
                print '<a href="cinema.php?id=' . $row['id'] . '">zobacz szczegóły kina</a>';
                print '<hr>';
            }
        } elseif ($result->num_rows == 0) {
            print "brak kin w bazie<br>";
        } else {
            print "Wystąpił błąd" . $conn->errno;
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
        <a href="index.php">wróć na stronę główną</a><br>
        <?php
            showAll($conn);
            $conn->close();
            $conn = null;
        ?>
    </body>	
</html>

