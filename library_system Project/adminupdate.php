<?php
    $pageTitle="admin page"; // in Header.php
    session_start();
    if(!isset($_SESSION['Username'])){
        header ('Location: login.php');
        exit();
    }
    include 'connection.php';
    include 'templates/header.php';
    include 'templates/navbar.php';

?>




<br>
<h1 style = " text-align : center ; ">Select Book to Update</h1>
<br>
<br>


<?php

echo'
    <div class="home">
    <div class="container">
        <div class="view">
            <div class="row">
    ' ;
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $bookname = $_POST['name'];
                $sql = "select * from books where BookName LIKE "."'%".$bookname."%'";
                $stmt = $con->prepare($sql);
                $stmt->execute();
            
                $count = $stmt ->rowCount();
                
                if($count == 0 ){
                    echo '
                    <h4>No Item Found</h4>
                    ';
                }

        }
        else {
             $sql = "select * from books" ;  
             $stmt = $con->prepare($sql);
             $stmt->execute();
        }

                while($row = $stmt ->fetch(PDO::FETCH_ASSOC))
                      {
                            echo'   <div class=" hov col-2">
                                    <div class = "item" > 
                                        <a href="update.php?id='. $row['BookId'].'" </a>
                                        <div class="image">
                                            <img src="images/book/'.$row['Image'].'" alt="book">
                                        </div>
                                            <div class="text"> 
                                                <h6>'. $row['BookName'].'</h6>
                                            </div>
                                    </div>
                                </div>   ' ;
                        } 
 

         echo '     </div>
            </div>
        </div>
    </div>    ';

?>




<?php include 'templates/footer.php'?>







