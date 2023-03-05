<?php
    
    class Notes{

        public function save($note){
            include("../connection/SearchConnection.php");

            $sql = "insert into tb_note(id_user, title, text, date, time) values ('$note->id_user', '$note->title', '$note->text', '$note->date', '$note->time');";
            if(mysqli_query($connection, $sql)){
                $msg = "Cadastrado nota com sucesso"; 
            } else{
                $msg = "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
        }

        public function update($note){
            include("../connection/SearchConnection.php");

            $sql = "update tb_note set title = $note->title, text = $note->text where id = $note->id and id_user = $note->id_user";
            if(mysqli_query($connection, $sql)){
                $msg = "Editado nota com sucesso"; 
            } else{
                $msg = "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
        }

        public function delete($id){
            include("../connection/SearchConnection.php");
        
            $sql = "delete from tb_note where id = $note->id"; 
            if(mysqli_query($connection, $sql)){
                $msg = "Nota deletada com sucesso"; 
            } else{
                $msg = "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
        }

        public function findById($id){
            include("../connection/SearchConnection.php");

            $sql = "select * from tb_note where id = $note->id";
            $result = mysqli_query($connection, $sql); 

            $note = new Note();
            if($row = mysqli_fetch_array($result)){
                $note->id = $row['id']; 
                $note->id_user = $row['id_user']; 
                $note->title = $row['title'];
                $note->text = $row['text'];
                $note->date = $row['date'];
                $note->time = $row['time'];
            }

            mysqli_close($connection);
            return $note;
        }
    }

?>

public $id;
        public $id_user;
        public $title; 
        public $text; 
        public $date; 
        public $time; 