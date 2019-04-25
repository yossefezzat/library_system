<?php
    
include 'connection.php';

/*session_start();
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit();
  }*/

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $fullname = $_POST['FullName'];
                $username = $_POST['Username'];
                $password = $_POST['password'];
                $email = $_POST['Email'];
            
            
                if($fullname=="" || $username =="" || $password==""  || $email ==""){
                    header('location : signup.php');
                }
                else{ 
                
                $stmt = $con->prepare("INSERT INTO users (UserName , FullName , Password ,  Email) VALUES(? , ? , ? , ?)");
                $stmt ->execute(array($username , $fullname ,$password , $email));
                
                    
                $_SESSION['Username'] = $username;
                    
                header('Location: login.php');
                }
            
        }
        
        

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- For Bootstrap -->
    <title>Register</title>
    <link rel="stylesheet" href="../Study/css/log_sign.css">
    <link rel="stylesheet" href="../Study/css/bootstrap.min.css">
  </head>
  <body>

    <div class="access registerPage">
        <div class = "container">

            <form  method="post"  action = "<?php echo $_SERVER['PHP_SELF'] ?>"  method = "POST"   onsubmit = "return (validation() & validation2() & validation3() & validation4() & validation5());">
                
                <p>New Account </p>
                <div class = "form-input form-group">
                    <input class = "form-control" type = "text"  name  = "Username" placeholder = "User Name" id="name">
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
                
                
                
                
                <div class = "form-input form-group">
                    <input class = "form-control" type = "text"  name  = "FullName" placeholder = "Full name" id="full">
                </div>
                
                
                <div id = "resultfull"  class = "valid">
                         <script>
                            function validation2(){
                                var full = document.getElementById('full').value;
                                
                                    if(full == ''){
                                         document.getElementById('resultfull').innerHTML = "fullname Required";
                                        return false;
                                    }
                                    else if(full.length < 4){
                                         document.getElementById('resultfull').innerHTML = "fullname Atleast be more than 4 characters ";
                                         return false;
                                    }
                            }
                        </script>
                    </div>
                
                <div class = "form-input form-group">
                    <input class = "form-control" type = "password"  name  = "password" placeholder = "password" id="pass">
                </div>
                
                    <div id = "resultpass"  class = "valid">
                         <script>
                            function validation3(){
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
                
                
                <div class = "form-input form-group">
                    <input class = "form-control" type = "password"  name  = "password" placeholder = "Enter Password" id = "pass2">
                </div>
                    
                <div id = "resultpass2"  class = "valid">
                         <script>
                            function validation4(){
                                var Password = document.getElementById('pass2').value;
                                
                                    if(Password == ''){
                                         document.getElementById('resultpass2').innerHTML = "password Required";
                                        return false;
                                    }
                                    else if(Password.length < 4){
                                         document.getElementById('resultpass2').innerHTML = "password Atleast be more than 4 characters ";
                                         return false;
                                    }
                            }
                        </script>
                    </div>
                
                
                
                 <div class = "form-input form-group">
                    <input class = "form-control" type = "Email"  name  = "Email" placeholder = "Email" id = "email">
                </div>
                
                     <div id = "mail"  class = "valid">
                         <script>
                            function validation5(){
                                var Password = document.getElementById('email').value;
                                
                                    if(Password == ''){
                                         document.getElementById('mail').innerHTML = "password Required";
                                        return false;
                                    }
                                    else if(Password.length < 4){
                                         document.getElementById('mail').innerHTML = "password Atleast be more than 4 characters ";
                                         return false;
                                    }
                            }
                        </script>
                    </div>
                    
                
                <a href="login.php">
                    login 
                </a>
                <input type = "submit"  name = "submit" 
                value = "Sign Up">
            </form>

        </div>
    </div>
<?php include 'templates/footer.php'?>
