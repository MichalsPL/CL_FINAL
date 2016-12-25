<?php

    function delete($conn, $type, $id) {
        switch ($type) {
            case ('Kino'): {
                    $choose = "Cinemas";
                    break;
                }
            case ("Film"): {
                    $choose = "Movies";
                    break;
                }
            case("Bilet"): {
                    $choose = "Tickets";
                    break;
                }
            case("Płatność"): {
                    $choose = "Payments";
                    break;
                }
        }
        $sql = "DELETE FROM `" . $choose . "` WHERE id =" . $id;

        $result = false;
        $result = $conn->query($sql);
        if ($result) {
            Print $type . " o ID " . $id . " jest usuniete";
        } else {
            print"WYSTĄPIŁ BŁĄD" . $conn->error;
        }
    }
    