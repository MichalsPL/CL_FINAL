<?PHP
    include_once 'src/connect.php';
    include_once 'src/add.php';
    $conn = connect();

    function printCinemaOptions() {
        $sql = "SELECT Cinemas.id AS id, Cinemas.name AS name FROM Cinemas";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            print '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    }

    function printMovieOptions() {
        $sql = "SELECT Movies.id AS id, Movies.name AS name FROM Movies";
        $result1 = $conn->query($sql);
        while ($row = $result1->fetch_assoc()) {
            print '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>start</title>
    </head>
    <body>
        <form method="POST">
            <select name="cinema">
                <?PHP
                    printCinemaOptions();
                ?>
            </select>
            <select name="movie">
                <?PHP
                    printMovieOptions();
                ?>
            </select>
            <input type="submit">
        </form>
        <?PHP
            if (isset($_POST['cinema']) && isset($_POST['movie'])) {

                addSeans($_POST['cinema'], $_POST['movie']);

                $conn->close();
                $conn = null;
            } else {
                print "dodaj seans";
            }
        ?>


    </body>	
</html>
