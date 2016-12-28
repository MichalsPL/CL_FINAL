<?php
    include_once 'src/print.php';
    include_once 'src/add.php';
    include_once 'src/delete.php';
    include_once 'src/connect.php';
    $conn = connect();

    if (!isset($_POST['serachMovies']) && !isset($_POST['serachMoviesRaring'])) {
        $sql = "SELECT * FROM Movies";
        $message = "Widzisz wszystkie Filmy";
    }
    if (isset($_POST['serachMovies'])) {
        $sql = "SELECT * FROM Movies WHERE name LIKE " . '"%' . $_POST['serachMovies'] . '%"';
        $message = "Widzisz wybrane Filmy (WYBÓR PO TYTULE)";
    }
    if (isset($_POST['serachMoviesRaring'])) {
        $sql = "SELECT * FROM Movies WHERE rating = " . $_POST['serachMoviesRaring'];
        $message = "Widzisz wybrane Filmy (WYBÓR PO RATINGU)";
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
        <title>...</title>
    </head>
    <body>
        <a href="index.php">wróć na stronę główną</a>
        <form method="POST">        
            <h4> DODAJ FILM</h4>
            <label>Tytuł<input name="name"></label>
            <label>Opis<textarea name="description"></textarea></label>
            <input type="submit" name="addMovie">
        </form>

        <h4>Szukaj Filmu</h4>
        <form method="POST">
            <label>podaj Tytuł Filmu <input name="serachMovies"></label>
            <input name = "type" value = "Film"type="hidden">
            <input type="submit">
        </form>
        <form method="POST">
            <label>podaj  Rating Filmu<input name="serachMoviesRaring"></label>
            <input name = "type" value = "Film"type="hidden">
            <input type="submit">
        </form>

        <?PHP
            if (isset($_POST['addMovie'])) {
                addMovie($conn, $_POST);
            }
            if (isset($_GET['delete']) && isset($_GET['id'])) {
                delete($conn, $_GET['delete'], $_GET['id']);
            }

            echo $message;
            if ($result) {
                printMovies($result);
            }
            $conn->close();
            $conn == null;
        ?>
    </body>	
</html>



