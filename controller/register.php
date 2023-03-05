<?php

    session_start();

    $name = ""; 
    $email = "";
    $birth = ""; 
    $password = "";

    if(isset($_GET['name'])){

        $name = $_GET['name']; 
        $email = $_GET['email'];
        $birth = $_GET['birth'];  
        $password = $_GET['password'];

        if($name === ''){
            echo "<script>alert('Nome não informado!');</script>";
        }

        if($email === ''){
            echo "<script>alert('E-mail não informado!');</script>";
        }

        if($birth === ''){
            echo "<script>alert('Data não informada!');</script>"; 
        }

        if($password === ''){
            echo "<script>alert('Senha não informada!');</script>"; 
        }

        if($email !== "" && $name !== "" && $birth !== "" && $password !== ""){
            include("../connection/SearchConnection.php");

            $sql = "select * from tb_user where email = '$email'";
            $result = mysqli_query($connection, $sql); 

            if($row = mysqli_fetch_array($result)){
                echo "<script>alert('E-mail já cadastrado');</script>"; 
            }else{
                include("../model/User.php"); 
                include("../functions/Users.php");
                $user = new User();
                $users = new Users(); 

                $user->name = $name;
                $user->email = $email;
                $user->birth = $birth;
                $user->password = $password;
                $users->save($user);
                header("Location: ../controller/login.php");
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../resources/css/reset.css">
    <link rel="stylesheet" href="../resources/css/style.css">
    <script src="../resources/js/jquery-3.6.3.min.js"></script>
</head>
<body>
    <div class="corps">
        <div class="form">
            <form action="/controller/register.php" method="get">
                <p class="title">Cadastre-se</p>
                <hr>
                <input type="text" name="name" id="name" placeholder="Nome" value="<?php $name ?>">
                <br><br>
                <input type="email" name="email" id="email" placeholder="E-mail" value="<?php $email ?>">
                <br><br>
                <input type="date" name="birth" id="birth" style="width: 155px;" value="<?php $birth ?>">
                <br><br>
                <input type="password" name="password" id="password" placeholder="Senha">
                <br><br>
                <input type="submit" value="Enviar">
                <br><br>
                <a href="../controller/login.php">Acesse aqui</a>
                <br><br>
            </form>
        </div>
    </div>
</body>
</html>