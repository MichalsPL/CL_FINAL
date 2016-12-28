<?php
    include_once 'src/print.php';
    include_once 'src/add.php';
    include_once 'src/delete.php';
    include_once 'src/connect.php';
    $conn = connect();

    $sql = "SELECT Tickets.id AS id, Tickets.price AS price, "
            . "Tickets.quantity AS quantity, Tickets.seans_id AS seans, "
            . "Payments.id as payment FROM Tickets LEFT JOIN Payments ON Tickets.id=Payments.id";
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
        <title>start</title>
    </head>
    <body>
        <a href="index.php">wróć na stronę główną</a><br>
        <?php
            if (isset($_GET['delete']) && isset($_GET['id'])) {
                delete($conn, $_GET['delete'], $_GET['id'], $message);
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
