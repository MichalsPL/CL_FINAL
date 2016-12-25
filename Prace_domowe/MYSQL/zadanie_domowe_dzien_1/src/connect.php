<?php

    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "coderslab";
        $baseName = "cinema_db_day1";

        $conn = new mysqli($servername, $username, $password, $baseName);
        return $conn;
        if ($conn->connect_error) {

            print "nieudane polaczenie. blad:" . $conn->connect_error . "kod bedu " . "$conn->connect_errno";
            die();
        }
    }
    