<a href="index.php">wróć na stronę główną</a>
<form method="POST">
    <h4> DODAJ BILET</h4>
    <label>Cena<input type="number" name="price"></label>
    <label>Ilość<input type="number" name="quantity"></label>
    <input type="submit" name="addTicket"> 
</form>
<?php
    include_once 'src/print.php';
    include_once 'src/add.php';
    include_once 'src/delete.php';
    include_once 'src/connect.php';
    $conn = connect();

    if (isset($_POST['addTicket'])) {
        addTicket($conn, $_POST);
    }
    if (isset($_GET['delete']) && isset($_GET['id'])) {
        delete($conn, $_GET['delete'], $_GET['id']);
    }
    $sql = "SELECT * FROM Tickets";
    $result = $conn->query($sql);
    if ($result) {
        $message = "Widzisz wszystkie Bilety";
    } else {
        $message = "Wystąpił błąd wróć na stronę główną";
    }
    echo $message;

    printTickets($result);
?>