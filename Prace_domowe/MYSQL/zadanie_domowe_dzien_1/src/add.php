<?php

    function addCinema($conn, $recieved) {
        $sql = 'INSERT INTO Cinemas (name, adress) VALUES'
                . ' ("' . $recieved['name'] . '","' . $recieved['adress'] . '")';
        $result = $conn->query($sql);
        if ($result) {
            print "dodano kino o nazwie " . $recieved['name'] . " i adresie" . $recieved['adress'] . " ";
        } else {
            print "Wystąpił błąd " . $conn->errno;
        }
    }

    function addMovie($conn, $recieved) {
        $sql = 'INSERT INTO Movies (name, description) VALUES'
                . ' ("' . $recieved['name'] . '","' . $recieved['description'] . '")';
        $result = $conn->query($sql);
        if ($result) {
            print "dodano Film o tytule " . $recieved['name'] . " i opisie <br>" . $recieved['description'] . " ";
        } else {
            print "Wystąpił błąd " . $conn->errno;
        }
    }

    function addTicket($conn, $recieved) {
        $sql = 'INSERT INTO Tickets (price, quantity) VALUES'
                . ' ("' . $recieved['price'] . '","' . $recieved['quantity'] . '")';
        $result = $conn->query($sql);
        if ($result) {
            print "dodano Bilet o Cenie " . $recieved['price'] .
                    " i w ilości " . $recieved['quantity'] . " sztuk";
        } else {
            print "Wystąpił błąd " . $conn->errno;
        }
    }

    function addPayment($conn, $recieved) {
        $sql = 'INSERT INTO Payments (payment_type, ticket_id, payment_date) VALUES'
                . ' ("' . $recieved['payment_type'] . '","' .
                $recieved['ticket_ID'] . '",NOW())';
        $result = $conn->query($sql);
        if ($result) {
            print "dodano płatność o typie " . $recieved['payment_type'] .
                    " i ID biletu " . $recieved['ticket_ID'] . " sztuk";
        } else {
            print "Wystąpił błąd " . $conn->errno;
        }
    }
    