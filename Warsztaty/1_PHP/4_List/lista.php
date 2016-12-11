<?php
    session_start();

    $zadania = [];

    if (isset($_SESSION['zadania'])) {
        $zadania = unserialize($_SESSION['zadania']);
    }

    if (
            $_SERVER['REQUEST_METHOD'] == "POST" &&
            isset($_POST['zadanie']) &&
            $_POST['zadanie'] != ""
    ) {

        $zadania[] = $_POST['zadanie'];
        $_SESSION['zadania'] = serialize($zadania);
    }
    print "<table border=1><th>ZADANIA DO WYKONANIA</th>";
    foreach ($zadania as $zadanie) {
        print "<tr><td>" . $zadanie . "</td></tr>";
    }
    print "</table>";
?>


<form method="POST">
    <label>wpisz zadanie
        <input type="text" name="zadanie" ></label>
    <input type="submit">
</form>

