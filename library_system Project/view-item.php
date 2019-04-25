<?php
    $pageTitle="View - item"; // in Header.php
    session_start();
    
    if(!isset($_SESSION['Username'])){
        header ('Location: login.php');
        exit();
    }

    include 'connection.php';
    include 'templates/header.php';
    include 'templates/navbar.php';
    $BookId = $_GET['id'];

    $stmt = $con->prepare("SELECT * FROM books WHERE BookId ='$BookId'");
    $stmt ->execute();
    $row=$stmt->fetch();
    
?>

<div class="view-item">
    <div class="container">
        <div class="content">
            <?php 
                echo'
                    <div class="image">
                        <img src="images/book/'.$row['Image'].'">
                    </div>
                    
                    
                    <div class="text"> 
                        <h5><span>Name: </span> <span>'. $row['BookName'].'</span></h5>
                        <h5><span>Author: </span> <span>'. $row['AuthorName'].'</span></h5>
                        <span><span>Price: </span> <span>'. $row['Price'].'</span></span>
                        <p>'. $row['Desciption'].'</p>
                    </div>

                ';
            ?>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'?>


