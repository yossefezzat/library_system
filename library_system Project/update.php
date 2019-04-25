
<?php
    include 'connection.php';
    $pageTitle="Update"; // in Header.php
    session_start();
    if(!isset($_SESSION['Username']) || $_SESSION['Username']!="admin"){
        header ('Location: login.php');
        exit();
    }

    include 'templates/header.php';
    include 'templates/navbar.php';
    

  
    $BookId = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM books WHERE BookId ='$BookId'");
    $stmt ->execute();
    $row=$stmt->fetch(); 



?>


<?php 
     echo'
        <div class="view-item">
            <div class="container">
                <div class="content">
                    <div class="image">
                        <img src="images/book/'.$row['Image'].'">
                    </div>
         </div>
             </div>
                </div>
                ';
            ?>


<div class="insert">
    <div class="container">
        <div class="content text-center" style = "margin-top: -196px;">
            <h1>Ubdate a Book</h1>
            <div class="form">
                <form action="doneupdate.php?id=<?php echo $BookId?>" method="POST">
   
                    <div class="form-group"> <!-- Bootstrap -->
                     <input type="text" name="bookname" id="name" class="form-control" value = "<?php echo $row['BookName']; ?>" required> <!-- Bootstrap -->
                    </div>
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="text" name="type" id="name"  class="form-control" value = "<?php echo $row['type']; ?>" required> <!-- Bootstrap -->
                    </div>
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="text" name="authorname" id="name"  class="form-control" value = "<?php echo $row['AuthorName']; ?>" required> <!-- Bootstrap -->
                    </div>
                    
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="text" name="desc" id="name" placeholder="description" style = "height:200px;" class="form-control" value = "<?php echo $row['Desciption']; ?>" required> <!-- Bootstrap -->
                    </div>
                  
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="text" name="price" id="name" placeholder="Price" class="form-control"  value = "<?php echo $row['Price']; ?>"required> <!-- Bootstrap -->
                    </div>
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="submit" value="Add" class="btn btn-info"> <!-- Bootstrap -->
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
</div>



<?php include 'templates/footer.php'?>


