<?PHP
    include_once 'src/connect.php';
    $conn = connect();
?>

<form method="POST">
    <select name="cinema">
        <?PHP
            $sql = "SELECT Cinemas.id AS id, Cinemas.name AS name FROM Cinemas";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                print '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
        ?>
    </select>
    <select name="movie">
        <?PHP
            $sql = "SELECT Movies.id AS id, Movies.name AS name FROM Movies";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                print '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
        ?>
    </select>
    <input type="submit">
</form>
<?PHP
    if (isset($_POST['cinema']) && isset($_POST['movie'])) {
        $cinema = intval($_POST['cinema']);
        $movie = intval($_POST['movie']);
        $sql = "INSERT INTO seans (movie_id, cinema_id) VALUES (" . $movie . "," . $cinema . ")";
        $result = $conn->query($sql);
        if ($result) {
            print "seans został dodany";
        } else {
            print "seans nie został dodany " . $conn->errno;
        }
        $conn->close();
        $conn = null;
    } else {
        print "dodaj seans";
    }
?>


