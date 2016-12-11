<?php
include 'src/Book.php';


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id']) && trim($_GET['id']) != "" && is_numeric($_GET['id'])) {
            $sql="SELECT id FROM Books WHERE id= ".$_GET['id'];
            $result=$conn->query($sql);
            if($result !=FALSE &&$result->num_rows!=0){
                $books=[];
                while ( $row=$result->fetch_assoc()){
                    $book = Book::loadFromDB($conn, $row['id']);
                    $books[]=$book;     
                }
            }
        }else{
            $sql="SELECT id FROM Books";
            $result=$conn->query($sql);

            if($result !=FALSE &&$result->num_rows!=0){
                $books=[];

                while ( $row=$result->fetch_assoc()){
                    $book = Book::loadFromDB($conn, $row['id']);
                    $books[]=$book;
                }
            }
        } 
            $serialData = json_encode($books);
            echo $serialData;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $conn->real_escape_string($_POST['name']);
        $author = $conn->real_escape_string($_POST['author']);
        $description = $conn->real_escape_string($_POST['description']);
        $book = new Book();
        $book = $book->create($conn, $name, $author, $description);
        echo json_encode($book);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        parse_str(file_get_contents("php://input"), $del_vars);
        $book=Book::delete($conn, $del_vars['id']);
        echo json_encode($book);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        parse_str(file_get_contents("php://input"), $put_vars);
        $id = $conn->real_escape_string($put_vars['id']);
        $name = $conn->real_escape_string($put_vars['name']);
        $author = $conn->real_escape_string($put_vars['author']);
        $description = $conn->real_escape_string($put_vars['description']);
        $book = new Book();
        $book = $book->modify($conn, $id,  $name, $author, $description);
        echo json_encode($book);
    }

    $conn->close();
    $conn = null;
