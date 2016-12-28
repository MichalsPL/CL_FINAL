<?php
    include_once 'src/connect.php';

    $message = "";
    if (isset($_POST['ticket']) && intval($_POST['ticket']) > 0 &&
            $_POST['payment_type'] == ("transfer" || "cash" || "card")) {

        $sql = 'INSERT INTO Payments (id, payment_type) VALUES ('
                . $_POST['ticket'] . ', "' . $_POST['payment_type'] . '")';
        $conn = connect();
        $result = $conn->query($sql);
        if ($result) {
            $message = 'platnosc udana';
        } elseif ($conn->errno == 1062) {
            $message = "bilet zostal wcześniej oplacony";
        } else {
            $message = "wystąpił błąd numer" . $conn->errno;
        }

        $conn->close();
        $conn = null;
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
        <form class="payment_form" method="POST" >
            <?php
                if (isset($_GET['pay']) && $_GET['pay'] > 0) {
                    $safeTicketId = intval($_GET['pay']);
                    print '<input type="hidden" name="ticket" value="' .
                            $safeTicketId . '">';
                } else {
                    print '<label> Podaj ID biletu<input type="number" name="ticket"></label><br>';
                }
            ?>
            <label>Typ platnosci
                <select name="payment_type">
                    <option value="transfer">Przelew</option>
                    <option value="cash">Gotówka</option>
                    <option value="card">Karta</option>
                </select></label><br>
            <button type="submit" name="submit" value="payment">Wyślij</button>
        </form>

        <?php print $message ?>

    </body>	
</html>

