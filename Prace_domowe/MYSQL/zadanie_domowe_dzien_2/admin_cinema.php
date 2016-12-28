<?php
    include_once 'src/print.php';
    include_once 'src/add.php';
    include_once 'src/delete.php';
    include_once 'src/connect.php';
    $conn = connect();

    $sql = "SELECT * FROM Cinemas";
    $message = "Widzisz wszystkie kina";

    if (isset($_POST['serachCinemas'])) {
        $sql = "SELECT * FROM Cinemas WHERE name LIKE " . '"%' . $_POST['serachCinemas'] . '%"';
        $message = "Widzisz wybrane kina";
    }
    $result = $conn->query($sql);
    if (!$result) {
        $message = "Wystąpił błąd wróć na stronę główną" . $conn->errno;
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>start</title>
    </head>
    <body>
        <a href="index.php">wróć na stronę główną</a><br>
        <form method="POST">       
            <h4> DODAJ KINO</h4>
            <label>Nazwa<input name="name"></label>
            <label>Adres<input name="adress"></label>
            <input type="submit" name="addCinema">
        </form>

        <h4>Szukaj Kina</h4>
        <form method="POST">
            <label>podaj nazwę kina <input name="serachCinemas"></label>
            <input name="type" value="Kino" type="hidden">
            <input type="submit">
        </form>  
        <?php
            if (isset($_POST['addCinema'])) {
                addCinema($conn, $_POST);
            }
            if (isset($_GET['delete']) && isset($_GET['id'])) {
                delete($conn, $_GET['delete'], $_GET['id']);
            }

            $conn->close();
            $conn = null;

            echo $message;
            if ($result) {
                printCinemas($result);
            }
        ?>
    </body>	
</html>
