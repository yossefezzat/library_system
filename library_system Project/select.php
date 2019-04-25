<?php
    $pageTitle="Category "; // in Header.php
    session_start();
    
    if(!isset($_SESSION['Username'])){
        header ('Location: login.php');
        exit();
    }

    include 'connection.php';
    include 'templates/header.php';
    include 'templates/navbar.php';



    
    $selection = $_POST['category'];
     
    $stmt = $con->prepare("SELECT * FROM books where type = "."'".$selection."'");
    $stmt ->execute();



 echo'
    <div class="home">
    <div class="container">
        <div class="view">
            <div class="row">
            
    ' ;

                while($row = $stmt ->fetch(PDO::FETCH_ASSOC))
                      {
                            echo'   <div class="col-2">
                                    <div class = "item" > 
                                        <a href="view-item.php?id='. $row['BookId'].'" </a>
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
