<?php
    include 'connection.php';
    $pageTitle="Insert"; // in Header.php
    session_start();
    if(!isset($_SESSION['Username']) || $_SESSION['Username'] != "admin" ){
        header ('Location: login.php');
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
        $name = $_POST['name'];
        $authorname = $_POST['authorname'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        
        $stmt = $con->prepare("INSERT INTO books (BookName , AuthorName , Desciption , Image, Price) VALUES(? , ? , ?, ? , ?)");
        try{
            $stmt ->execute(array($name , $authorname ,$desc , $image, $price));   
        }catch(PDOException $e){
            echo "Error: ".$e;
        }
    }
    include 'templates/header.php';
    include 'templates/navbar.php';
?>

<div class="insert">
    <div class="container">
        <div class="content text-center">
            <h1>Add a Book</h1>
            <div class="form">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="text" name="name" id="name" placeholder="Item Name" class="form-control" required> <!-- Bootstrap -->
                    </div>
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="text" name="authorname" id="name" placeholder="Author Name" class="form-control" required> <!-- Bootstrap -->
                    </div>
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="text" name="desc" id="name" placeholder="Descritpion" class="form-control" required> <!-- Bootstrap -->
                    </div>
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="text" name="price" id="name" placeholder="Item price" class="form-control" required> <!-- Bootstrap -->
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


