<?php
    include_once 'src/print.php';
    include_once 'src/delete.php';
    include_once 'src/add.php';
    include_once 'src/connect.php';
    $conn = connect();

    $sql = "SELECT * FROM Payments";
    $message = "Widzisz wszystkie Płatności";

    if (isset($_POST['PaymentDate']) && $_POST['PaymentDate'] != '') {
        $safePaymentDate = $conn->real_escape_string($_POST['PaymentDate']);
        $message = "Widzisz wybrane płatności";
        $sql = "SELECT * FROM Payments WHERE payment_date between '" . $safePaymentDate
                . "' and '" . $safePaymentDate . " 23:59:59'";
        
    } elseif (isset($_POST['PaymentAfter']) && $_POST['PaymentAfter'] != '') {
        $safePaymentAfter = $conn->real_escape_string($_POST['PaymentAfter']);
        $message = "Widzisz wybrane płatności";
        $sql = "SELECT * FROM Payments WHERE payment_date > '" . $_POST['PaymentAfter'] . "'";
        
    } elseif (isset($_POST['PaymentBefore']) && $_POST['PaymentBefore'] != '') {
        $safePaymentBefore = $conn->real_escape_string($_POST['PaymentBefore']);
        $message = "Widzisz wybrane płatności";
        $sql = "SELECT * FROM Payments WHERE payment_date < '" . $safePaymentBefore . "'";
    }

    $result = $conn->query($sql);
    if (!$result) {
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
            <h4> DODAJ Płatność</h4>
            <label>Typ<select name="payment_type">
                    <option value="cash">gotówka</option>
                    <option value="card">karta</option>
                    <option value="transfer">przelew</option>
                </select>
            </label>
            <label>Id Biletu<input name="ticket_ID"></label>
            <input type="submit" name="addPayment">
        </form>

        <h4>Szukaj Płatności</h4>
        <form method="POST">
            <label>Podaj dokładną date płatności<input type="date"name="PaymentDate">
            </label>
            <input type="submit">
        </form>

        <form method="POST">
            <label>Szukaj płatności do dnia<input type="date"name="PaymentBefore">
            </label>
            <input type="submit">
        </form>

        <form method="POST">
            <label>Szukaj płatności od dnia<input type="date"name="PaymentAfter">
            </label>
            <input type="submit">
        </form>     
        <?PHP
            if (isset($_POST['addPayment'])) {
                addPayment($conn, $_POST);
            }

            if (isset($_GET['delete']) && isset($_GET['id'])) {
                delete($conn, $_GET['delete'], $_GET['id']);
            }

            echo $message;
            if ($result) {
                printPayment($result);
            }
            $conn->close();
            $conn=null;
        ?>
    </body>	
</html>



