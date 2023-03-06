<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Users</title>
    <link rel="stylesheet" href="../resources/css/reset.css">
    <link rel="stylesheet" href="../resources/css/style.css">
    <script src="../resources/js/jquery-3.6.3.min.js"></script>
</head>
<body>
    <div class="corps">
        <div class="list">
            <?php
                include("../connection/SearchConnection.php");
                include("../functions/Users.php"); 

                $users = new Users(); 
                $result = $users->findAll();

                foreach ($result as $row){

                    if($row['id'] == $_SESSION['id_user']){
                        echo '<div class="one" style="border: 1px solid gold">'; 
                        echo '  <p class="title">'.$row['name'].'</p>';
                        echo '  <hr>'; 
                        echo '  <p class="text">Email: '.$row['email'].'</p>'; 
                        echo '  <p class="text">Nascimento: '.$row['birth'].'</p>'; 
                        echo '</div>'; 
                    }else{
                        echo '<div class="one">'; 
                        echo '  <p class="title">'.$row['name'].'</p>';
                        echo '  <hr>'; 
                        echo '  <p class="text">Email: '.$row['email'].'</p>'; 
                        echo '  <p class="text">Nascimento: '.$row['birth'].'</p>'; 
                        echo '</div>'; 
                    }
                }
            ?>
            <div class="back">
                <p class="title">Voltar</p>
            </div>
        </div>
    </div>
</body>
</html>