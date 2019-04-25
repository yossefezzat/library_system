<?php
        
        include 'connection.php';
        
        $id = $_GET['id'];
    

        $book = $_POST['bookname'];
        $type = $_POST['type'];
        $author = $_POST['authorname'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
   
        
        
     $sql = "UPDATE books SET BookName= '$book' , type= '$type' , AuthorName = '$author' ,  Desciption='$desc' , Price='$price' WHERE books.BookId = $id ";
                
        $stmt2 = $con->prepare($sql);
        $stmt2 ->execute();
    
        header('location : home.php');
 



?>