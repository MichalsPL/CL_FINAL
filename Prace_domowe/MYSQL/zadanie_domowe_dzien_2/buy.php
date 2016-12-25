<?php
    include_once 'src/connect.php';
    $conn = connect();
    $message = "";

    if (isset($_POST['quantity']) && $_POST['quantity'] > 0 &&
            isset($_POST['seans']) && $_POST['seans'] > 0) {
        $sql = "INSERT INTO Tickets (quantity, price, seans_id) VALUES 
                (" . $_POST['quantity'] . ", 12, " . $_POST['seans'] . ")";
        $result = $conn->query($sql);

        if ($result) {
            $last_id = $conn->insert_id;
            $message = "bilet dodano" . '<a href="pay.php?pay=' . trim($last_id) . '">zaplac za bilet</a>';
        } else {
            $message = "wystąpił błąd " . $conn->error;
        }
    }

    function ShowOptions($conn, $seansId = 0, &$message) {
        if ($seansId > 0) {
            print '<input type="hidden" name="seans" value="' . $seansId . '">';
            print 'kupujesz bilet na wybrany wcześniej seans';
        } else {
            $sql = "SELECT Cinemas.name as kino, Movies.name as film, seans.id as seans from seans
                            LEFT JOIN Movies ON seans.movie_id = Movies.id 
                            LEFT JOIN Cinemas ON seans.cinema_id = Cinemas.id";
            $result = $conn->query($sql);
            if ($result) {
                $previous = null;
                print '<label>Wybierz seans<select name="seans">';
                while ($row = $result->fetch_assoc()) {
                    foreach ($row as $k => $v) {
                        if ($row != $previous) {
                            print '<option value = "' . $row['seans'] . '">'
                                    . $row['kino'] . " " . $row['film'] . '</option>';
                            $previous = $row;
                        }
                    }
                }
                print "</select></label>";
            } else {
                $message = "wystąpił błąd " . $conn->error;
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

        <form method="POST">
            <label>podaj ilość biletów
                <input type="number" name="quantity"></label><br>
            <?php
                if (isset($_GET['seans'])) {
                    $seans = $_GET['seans'];
                } else {
                    $seans = null;
                }
                ShowOptions($conn, $seans, $message);
                $conn->close();
                $conn = null;
            ?>
            <br>
            <input type="submit">
        </form>
        <?php print $message; ?>
    </body>	
</html>

