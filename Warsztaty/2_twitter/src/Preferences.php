<?php
/// strona wyświetla panel do zmiany preferencji użytkownika pozwala na ich edycje
    include_once 'Connect.php';

    function logout() {
        session_destroy();
        $page = "index.php";
        $sec = "1";
        header("Refresh: $sec; url=$page");
    }

    function changeUserName($conn, $newUserName, $userId) {
        $safeNewUserName = $conn->real_escape_string($newUserName);
        $safeUserId = $conn->real_escape_string($userId);
        $sql = 'UPDATE `users` SET `username` = "' . $safeNewUserName .
                '" WHERE `users`.`id` = ' . $safeUserId;
        $result = $conn->query($sql);
        if ($result) {
            Print "nazwa zmieniona";
        } else {
            print "wystąpił błąd" . $conn->error;
        }
    }

    function changePassword($conn, $newPassword, $userId) {
        include_once 'src/User.php';
        $safeUserId = $conn->real_escape_string($userId);
        $user = new User;
        $sql = 'UPDATE `users` SET `hashedPassword` = "' . ($user->setHashedPassword($newPassword)) .
                '" WHERE `id` = ' . $safeUserId;
        $result = $conn->query($sql);

        if ($result) {
            Print "hasło  zmienione ";
        } else {
            print "hasło nie zostało zmienione wystąpił błąd nr ".$conn->error;
        }
    }

    function delUser($conn, $inputMail) {
        $safeInputMail = $conn->real_escape_string($inputMail);
        $sql = 'DELETE FROM `users` WHERE `email` ="' . $safeInputMail . '"';
        $result = $conn->query($sql);
        if ($result) {
            session_destroy();
            $page = 'index.php';
            $sec = "1";
            header("Refresh: $sec; url=$page");
        } else {
            print
                    '<p class="message" style="font-size: 16px; color:red">
                    Nie udało się usunąć użytkowinka</p>';
        }
    }





    