<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form method="POST" action ="main.php">
                <button type="submit">STRONA GŁÓWNA</button>
            </form>
        </div>
        <div>
            <div class="form">
                <h1>USTAWIENIA</H1>
                <form class="register-form" style="display: block" method="POST">
                    <input type="text" name="newUserName" placeholder="Podaj nową nazwę użytkownika"/>
                    <button type="submit">zmień nazwę użytkownika</button>
                </form>
                <form class="register-form" style="display: block" method="POST">
                    <input type="text" name="NewPassword" placeholder="Podaj nowe Hasło"/>
                    <button type="submit">Zmień hasło</button>
                </form>
                <form method="POST">
                    <button type="submit" name="DelUser" >USUŃ UŻYTKOWNIKA
                    </button>
                </form>

                <?php
                    include_once 'src/Preferences.php';
                    session_start();
                    $conn = getDbConnection();

                    if (isset($_POST['newUserName']) && $_POST['newUserName'] != '') {
                        changeUserName($conn, $_POST['newUserName'], $_SESSION['userId']);
                    }

                    if (isset($_POST['NewPassword'])) {
                        changePassword($conn, $_POST['NewPassword'], $_SESSION['userId']);
                    }

                    if (isset($_POST['DelUser'])) {
                        delUser($conn, $_SESSION['userInputMail']);
                    }

                    if (isset($_POST['logout'])) {
                        logout();
                    }
                    $conn->close();
                    $conn=null;
                ?>
            </div>
        </div>
    </body>
</html>
