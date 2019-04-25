<?php
    $pageTitle="Home"; // in Header.php
    session_start();
    if(!isset($_SESSION['Username'])){
        header ('Location: login.php');
        exit();
    }
    
    
    include 'connection.php';
    include 'templates/header.php';
    include 'templates/navbar.php';

    if($_SESSION['Username'] == "admin"){
        echo '
            <form class="search adminbutton " action = "admin.php">
             <div class = "search" >
                    <input type="submit" value="Admin" class="button">
                </div>
                </form>
        ';
    }

?>

        <div class="home">
            <form class="search" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                
                <div class = "search">
                    <input type="text" name="name" id="name" placeholder="Search BookName" class="form-control " required> <!-- Bootstrap -->
                    <input type="submit" value="Search" class="button">
                </div>
               
                
              </form>
            
            <form class="search" action="select.php" method="POST">
                
                <div class="select">
                    <input  list="cat" name='category' placeholder="  Category" onchange="submit(this)" >
                    <datalist id="cat" value = "select">
                        <option value="english">
                        <option value="arabic">
                    </datalist>


                </div>
                
              </form>

        </div>

<script language="JavaScript" type="text/javscript">
function getSelectedValue(select) {

    var index = select.selectedIndex;

    if ((index >= 0) && (index < select.length)) {

        return select.options[index].value;

    }

    return '';

}

function submit(select) {

    if (getSelectedValue(select) != '') {
        
        select.form.submit();

    }

}

</script>

<br>
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







