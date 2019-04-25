<?php
    include 'connection.php';
    $pageTitle="Delete"; // in Header.php
    session_start();
    if(!isset($_SESSION['Username']) || $_SESSION['Username']!="admin"){
        header ('Location: login.php');
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
        $name = $_POST['name'];
        
        $stmt = $con->prepare("DELETE FROM books WHERE BookName = '$name' ");
        try{
            $stmt ->execute();
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
            <h1>Delete a Book</h1>
            <div class="form">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group"> <!-- Bootstrap -->
                        <input type="text" name="name" id="name" placeholder="Item Name" class="form-control" required> <!-- Bootstrap -->
                    </div>
                    
                     <div class="form-group"> <!-- Bootstrap -->
                        <input type="submit" value="Delete" class="btn btn-info"> <!-- Bootstrap -->
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'?>


