<?php
    $pageTitle="login"; // in Header.php
    session_start();
    include 'connection.php';
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
                $username = $_POST['Username'];
                $password = $_POST['password'];
            
                $stmt = $con->prepare("SELECT UserName, Password FROM users WHERE UserName = ? AND Password = ? ");
                $stmt ->execute(array($username,$password));
                // Number of elements found
                $count = $stmt ->rowCount();

            if($count > 0){
                
                
                if($username == "admin"){
                    header('Location: admin.php');
                }
                else {
                    header('Location: home.php');
                }
                $_SESSION['Username'] = $username;
                exit();
            }

        }
    
    
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- For Bootstrap -->
    <title>Loginpage</title>
    <link rel="stylesheet" href="../Study/css/log_sign.css">
    <link rel="stylesheet" href="../Study/css/bootstrap.min.css">
  </head>
  <body>

    
    <div class="access loginPage">
        <div class = "container">
                <p style = "    width: 300px;
    font-family: Arial;
    color: #2196f3;
    font-size: 45px;
    height:0px;
    margin-left: 65px; ">Sign in</p>
            <form   action = "<?php echo $_SERVER['PHP_SELF'] ?>"  method = "POST"  onsubmit = "return (validation() & validation2());" >
                 
                <div   class="form-group">
                    <input class = "form-control" type = "text"  name  = "Username" placeholder = "Enter Username" id= "name">
                </div>
                
                <div id = "result" class = "valid">
                <script>
                    function validation(){
                        var name = document.getElementById('name').value;
                            if(name == ''){
                                 document.getElementById('result').innerHTML = " Name Required";
                                return false;
                            }
                            else if(name.length < 4){
                                 document.getElementById('result').innerHTML = "Username Atleast be more than 4 characters ";
                                 return false;
                            }
                    }
                </script>
                </div>
                
                <div  class="form-group">
                    <input class = "form-control" type = "password"  name  = "password" placeholder = "Enter Password" id= pass>
                </div>
                
                
                 <div id = "resultpass"  class = "valid">
                         <script>
                            function validation2(){
                                var Password = document.getElementById('pass').value;
                                
                                    if(Password == ''){
                                         document.getElementById('resultpass').innerHTML = "password Required";
                                        return false;
                                    }
                                    else if(Password.length < 4){
                                         document.getElementById('resultpass').innerHTML = "password Atleast be more than 4 characters ";
                                         return false;
                                    }
                            }
                        </script>
                    </div>
                
        
              
                <input type = "submit"  name = "submit" 
                value = "Sign in">
                
            <div> 
               
                    <p style= "text-align : center; color: black; margin-left: 105px;"> Dont have an  Account ?<a href = "signup.php" > Sign Up</a> </p>
                </div>
            </form>
             

        </div>
       
        
    </div>
<?php include 'templates/footer.php'; ?>