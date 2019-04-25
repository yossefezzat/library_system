<?php 
    session_start(); // start session
    
    session_unset(); // unset data

    session_destroy(); // Destory my session


    header ('Location: login.php');
    
    exit();
    
?>