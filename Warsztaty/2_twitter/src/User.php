<?php

    include_once 'Connect.php';

    class User {

        private $id;
        private $username;
        private $hashedPassword;
        private $email;

        public function __construct() {
            $this->id = -1;
            $this->username = "";
            $this->email = "";
            $this->hashedPassword = "";
        }

        public function getId() {
            return $this->id;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setUsername($username) {
            $this->username = $username;
            return $this;
        }

        public function setEmail($email) {
            $this->email = $email;
            return $this;
        }

        public function setHashedPassword($hashedPassword) {
            $newHashedPassword = password_hash($hashedPassword, PASSWORD_BCRYPT);
            $this->hashedPassword = $newHashedPassword;
            return $this->hashedPassword;
        }

        public function saveToDB(mysqli $conn) {
            if ($this->id == -1) { // zastosowas prepare statements
                $statement = $conn->prepare("INSERT INTO users(username,
                    hashedPassword, email) VALUES (?,?,?)");

                $statement->bind_param
                        (
                        'sss', $this->username, $this->hashedPassword, $this->email
                );

                if ($statement->execute()) {
                    $this->id = $statement->insert_id;

                    print "uzytkownik zostal utworzony ";
                    return true;
                }
                print 'uzytkownik nie zostal utworzony';
                return false;
            }
        }

        public static function loadUserById(mysqli $conn, $id) {
            $sql = "SELECT * FROM users WHERE id = $id";
            $result = $conn->query($sql);

            if ($result != FALSE && $result->num_rows == 1) {

                $row = $result->fetch_assoc();

                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->email = $row['email'];
                $loadedUser = $row['hashedPassword'];
                $loadedUser = $username = $row['username'];

                return $loadedUser;
            }
        }

        public static function addUser($email = "", $login = "", $password = "") {

            $conn = getDbConnection();
            $safemail = filter_var($conn->real_escape_string($email), FILTER_VALIDATE_EMAIL);
            $safeLogin = $conn->real_escape_string($login);
            $message = [];

            if ($safemail == null) {
                $message[] = "niepoprawy e mail ";
            }
            if ($safeLogin == "") {
                $message[] = "brak loginu ";
            }

            if ($password == "") {
                $message[] = "brak  hasła";
            }

            if ($safemail != null && $password != "" && $login != "") {
                
                $sql = 'SELECT email FROM `users` WHERE `email` ="' . $safemail . '"';
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $message [] = "użytkownik już istnieje";
                } elseif (!$result) {
                    $message[] = "błąd " . $conn->errno;
                } else {
                    $user = new User;
                    $user->setUsername($safeLogin);
                    $user->setEmail($safemail);
                    $user->setHashedPassword($password);
                    $user->saveToDB($conn);
                    $page = "index.php";
                    $sec = "4";
                    header("Refresh: $sec; url=$page");
                }
                $conn->close();
                $conn = null;
            }
            foreach ($message as $value) {
                print $value . '<br>';
            }
        }

        public static function checkLoggedUser($conn, $mail = true, $hashedPassword = null) {

            $safeMail = $conn->real_escape_string($mail);
            $sql = 'SELECT * FROM `users` where email="' . $safeMail . '"';
            $result = $conn->query($sql);
            $usr = $result->fetch_assoc();
            if ($hashedPassword == $usr['hashedPassword']) {
                return TRUE;
            } else {
                $page = "index.php";
                $sec = "0.1";
                header("Refresh: $sec; url=$page");
                return false;
            }
        }

        public static function CheckUser($conn, $inputMail, $inputPassword) {

            if (filter_var($inputMail, FILTER_VALIDATE_EMAIL) != null && $inputPassword != "") {
                session_start();
                $safeMail = $conn->real_escape_string($inputMail);
                $sql = 'SELECT * FROM `users` where email="' . $safeMail . '"';
                $result = $conn->query($sql);
                $usr = $result->fetch_assoc();
                if (password_verify($inputPassword, $usr['hashedPassword'])) {
                    $_SESSION['hash'] = $usr['hashedPassword'];
                    $_SESSION['userInputMail'] = $safeMail;
                    $_SESSION['userId'] = $usr['id'];
                    $page = "main.php";
                    $sec = "1";
                    header("Refresh: $sec; url=$page");
                    Print "Dziękujemy za zalogowanie";
                } else {
                    Print "Nie ma takiego użytkownika lub hasło niepoprawne";
                }
            } elseif (filter_var($inputMail, FILTER_VALIDATE_EMAIL) == null && $inputPassword != "") {
                print "podaj prawidłowy email";
            } elseif ($inputPassword == "") {
                print "podaj hasło";
            } else {
                print "podaj email i hasło";
            }
        }

    }
    