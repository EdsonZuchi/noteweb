<?php

    session_start(); 

    if(isset($_GET['option'])){
        $option = $_GET['option'];
        
        if($option == 1){
            header("Location: ../controller/listUsers.php");
        }

        if($option == 2){
            header("Location: ../controller/listNotes.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../resources/css/reset.css">
    <link rel="stylesheet" href="../resources/css/style.css">
    <script src="../resources/js/jquery-3.6.3.min.js"></script>
</head>
<body>
    <div class="corps">
        <div class="grid">
            <div class="button" onclick='click(formMenu, 1);'>
                <p>Usuários</p>
            </div>
            <div class="space"></div>
            <div class="button" onclick='click(formMenu, 2);'>
                <p>Notas</p>
            </div>
        </div>
    </div>
    <form action="../controller/menu.php" method="get" name="formMenu">
        <input type="hidden" name="option">
    </form>
    <script src="../resources/js/script.js"></script>
</body>
</html>