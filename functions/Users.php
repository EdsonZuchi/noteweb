<?php
    
    public function save($user){

        include("../connection/SearchConnection.php");

        $sql = "insert into tb_user(name, email, password, birth) values ('.$user->name.', '.$user->email.', '.$user->password.', '.$user->birth.');";
        if(mysqli_query($connection, $sql)){
            echo "Cadastrado com sucesso"; 
        } else{
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }

        mysqli_close($connection);
    }
?>