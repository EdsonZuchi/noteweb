<?php
    
    session_start();

    $email = "";
    $password = ""; 

    if(isset($_GET['email'])){
        $email = $_GET['email']; 
        $password = $_GET['password'];

        if($email === ''){
            echo "<script>alert('E-mail não informado!');$('#email').focus();</script>";
        }

        if($password === ''){
            echo "<script>alert('Senha não informada!');$('#password').focus();</script>"; 
        }
    }

    if($email !== '' && $password !== ''){
        include("../connection/SearchConnection.php");

        $sql = "select * from tb_user where email = '$email'";
        $result = mysqli_query($connection, $sql); 

        if($row = mysqli_fetch_array($result)){
            if($row['password'] === $password){
                $_SESSION['id_user'] = $row['id'];
                header("Location: ../index.php");
            }else{
                echo "<script>alert('Senha incorreta!');$('#password').focus();</script>"; 
            }
        }else{  
            echo "<script>alert('E-mail não cadastrado!');$('#email').focus();</script>";
        }
        mysqli_close($connection);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../resources/css/reset.css">
    <link rel="stylesheet" href="../resources/css/style.css">
    <script src="../resources/js/jquery-3.6.3.min.js"></script>
</head>
<body>
    <div class="corps">
        <div class="form">
            <form action="/controller/login.php" method="get">
                <p class="title">Acessar</p>
                <hr>
                <input type="email" name="email" id="email" placeholder="E-mail" value=<?php echo $email; ?>>
                <br><br>
                <input type="password" name="password" id="password" placeholder="Senha">
                <br><br>
                <input type="submit" value="Logar">
                <br><br>
                <a href="">Cadastre-se aqui</a>
                <br><br>
            </form>
        </div>
    </div>
</body>
</html>