<?php
    include_once 'src/print.php';
    include_once 'src/add.php';
    include_once 'src/delete.php';
    include_once 'src/connect.php';
    $conn = connect();
    $sql = "SELECT * FROM Tickets";
    $result = $conn->query($sql);
    if ($result) {
        $message = "Widzisz wszystkie Bilety";
    } else {
        $message = "Wystąpił błąd wróć na stronę główną";
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>...</title>
    </head>
    <body>
        <a href="index.php">wróć na stronę główną</a>
        <form method="POST">
            <h4> DODAJ BILET</h4>
            <label>Cena<input type="number" step="0.01" name="price"></label>
            <label>Ilość<input type="number" name="quantity"></label>
            <input type="submit" name="addTicket"> 
        </form>

        <?PHP
            if (isset($_POST['addTicket'])) {
                addTicket($conn, $_POST);
            }
            if (isset($_GET['delete']) && isset($_GET['id'])) {
                delete($conn, $_GET['delete'], $_GET['id']);
            }

            echo $message;
            if ($result) {
                printTickets($result);
            }
            $conn->close();
            $conn = null;
        ?>
    </body>	
</html>