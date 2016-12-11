<?php

    include_once 'Connect.php';
    $conn = getDbConnection();

    class Book implements JsonSerializable {

        private $id;
        private $name;
        private $author;
        private $description;

        public function __construct() {
            $this->id = -1;
            $this->name = "";
            $this->author = "";
            $this->description = "";
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getAuthor() {
            return $this->author;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setAuthor($author) {
            $this->author = $author;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public static function loadFromDB($conn, $id) {
            $sql = "SELECT * FROM Books WHERE id = $id";
            $result = $conn->query($sql);

            if ($result != FALSE && $result->num_rows == 1) {
                while ($row = $result->fetch_assoc()) {

                    $book = new Book();
                    $book->id = $row['id'];
                    $book->name = $row['name'];
                    $book->author = $row['author'];
                    $book->description = $row['description'];
                }
                return $book;
            }
        }

// koniec loadFromBD

        public function create($conn, $name, $author, $description) {


            $sql = 'INSERT INTO Books(name, author, description) VALUES ("' . $name 
                    . '","' . $author . '","' . $description . '")';
            $result = $conn->query($sql);
            if ($result) {
                return "udalo się";
            }
        }

// koniec Create

        public function modify($conn, $id, $name, $author, $description) {

            $sql = "UPDATE `Books` SET `name` = '$name', `author` = '$author',
                  `description` = '$description' WHERE `Books`.`id` = " . $id;
            
            $result = $conn->query($sql);
            if ($result) {
                return "udalo sie ";
            }
        }

// koniec Modify

        public static function delete($conn, $id) {

            $sql = 'DELETE FROM Books WHERE id =' . $id;
            $result = $conn->query($sql);

            if ($result) {
                return "udalo sie ";
            }
        }

// koniec delete

        public function jsonSerialize() {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'author' => $this->author,
                'description' => $this->description
            ];
        }

    }
    