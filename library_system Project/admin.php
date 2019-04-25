
<?php
    $pageTitle="Admin"; // in Header.php
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
    <br>

    
 <div class = "admin">

        <form class="search"  action = "insert.php">
             <input type="submit" value="Insert Book" class="button" >
        </form>
     
        <form class="search" action = "adminupdate.php">
             <input type="submit" value="Update Book" class="button" >
        </form>
     
        <form class="search"  action = "delete.php" >
             <input type="submit" value="Delete Book" class="button" >
        </form>
     
</div>