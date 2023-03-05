<?php
    session_start(); 

    if(isset($_SESSION['id_user'])){
        if($_SESSION['id_user'] == 0){
            header("Location: /controller/login.php");
            exit();
        }
    }else{
        header("Location: /controller/login.php");
        exit();
    }

    
?>  