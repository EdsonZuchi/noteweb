<?php

    class Users {
        
        public function save($user){

            include("../connection/SearchConnection.php");

            $sql = "insert into tb_user(name, email, password, birth) values ('$user->name', '$user->email', '$user->password', '$user->birth');";
            if(mysqli_query($connection, $sql)){
                $msg = "Cadastrado com sucesso"; 
            } else{
                $msg = "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
        }

        public function update($user){

            include("../connection/SearchConnection.php"); 

            $sql = "update tb_user set name = $user->name, birth = $user->birth where id = $user->id";
            if(mysqli_query($connection, $sql)){
                $msg = "Editado com sucesso"; 
            }else{
                $msg = "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
        }

        private function updatePassword($user){

            include("../connection/SearchConnection.php"); 

            $sql = "update tb_user set password = $user->password where id = $user->id";
            if(mysqli_query($connection, $sql)){
                $msg = "Senha atualizada com sucesso"; 
            }else{
                $msg = "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
        }

        private function delete($id){
            include("../connection/SearchConnection.php"); 

            $sql = "delete from tb_user where id = $id";
            if(mysqli_query($connection, $sql)){
                $msg = "Usuário deletado"; 
            }else{
                $msg = "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
        }

        public function findById($id){

            include("../connection/SearchConnection.php");

            $sql = "select * from tb_user where id = $id"; 
            $result = mysqli_query($connection, $sql); 

            $user = new User();
            if($row = mysqli_fetch_array($result)){
                $user->id = $row['id']; 
                $user->name = $row['name']; 
                $user->password = $row['password'];
                $user->email = $row['email'];
                $user->birth = $row['birth'];
            }

            mysqli_close($connection);
            return $user;
        }

        public function findAll(){

            include("../connection/SearchConnection.php");

            $sql = "select * from tb_user"; 
            $result = mysqli_query($connection, $sql); 

            $user = new User(); 
            $rows = array();
            $i = 0; 
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $user->id = $row['id']; 
                    $user->name = $row['name']; 
                    $user->password = $row['password'];
                    $user->email = $row['email'];
                    $user->birth = $row['birth'];
                    $rows[$i] = $user;
                    $i++; 
                }
            }

            mysqli_close($connection);
            return $rows;
        }
    }
?>