<?php
    include_once 'src/connect.php';
    include_once 'src/print.php';
    $conn = connect();

    function showAll($conn) {
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
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>...</title>
    </head>
    <body>
        <?php
            showAll($conn);

            $conn->close();
            $conn = null;
        ?>
    </body>	
</html>

