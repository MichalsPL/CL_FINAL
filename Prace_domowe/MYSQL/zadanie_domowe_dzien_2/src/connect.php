<?php
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "coderslab";
    $baseName = "cinema_db";

    $conn = new mysqli($servername, $username, $password, $baseName);
    if ($conn->connect_error) {
        print "nieudane polaczenie. blad: kod bedu " . "$conn->connect_errno";
        die();
    }

 return $conn;
}
