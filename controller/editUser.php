<?php

    session_start();

    include("../functions/Users.php");
    include("../model/User.php");

    $id = ""; 
    $name = ""; 
    $email = "";
    $birth = ""; 
    $password = "";

    if(isset($_GET['email']) && isset($_GET['password'])){

        $user = new User(); 

        $id = $_GET['id'];
        $user->id = $_GET['id'];
        $user->name = $_GET['name'];
        $user->email = $_GET['email'];
        $user->birth = $_GET['birth'];
        $user->password = $_GET['password']; 
        $users = new Users(); 

        $user_bank = $users->findById($id); 
        if($user->password === $user_bank->password){
            $users->update($user);
            header("Location: ../controller/listUsers.php");
        }else{
            $name = $user->name;
            $email = $user->email;
            $birth = $user->birth;  
            echo "<script>alert('Senha incorreta')</script>"; 
        }
    }else{
        if(isset($_GET['id'])){

            $id = $_GET['id'];
            $users = new Users(); 
    
            $user = new User(); 
            $user = $users->findById($id); 
            $name = $user->name;
            $email = $user->email;
            $birth = $user->birth; 
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../resources/css/reset.css">
    <link rel="stylesheet" href="../resources/css/style.css">
    <script src="../resources/js/jquery-3.6.3.min.js"></script>
</head>
<body>
    <div class="corps">
        <div class="form">
            <form action="/controller/editUser.php" method="get">
                <p class="title">Editar</p>
                <hr>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="text" name="name" id="name" placeholder="Nome" value="<?php echo $name ?>">
                <br><br>
                <input type="email" name="email" id="email" placeholder="E-mail" disable value="<?php echo $email ?>">
                <br><br>
                <input type="date" name="birth" id="birth" style="width: 155px;" value="<?php echo $birth ?>">
                <br><br>
                <input type="password" name="password" id="password" placeholder="Senha">
                <br><br>
                <input type="submit" value="Enviar">
                <br><br>
            </form>
        </div>
    </div>
</body>
</html>