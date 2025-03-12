<?php
require_once('db.php');
$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];

if(empty($login) || empty($pass) || empty($repeatpass) || empty($email)){
  echo  "Заполните все поля";
}
else 
{
        if($pass != $repeatpass){
        echo    "Пароль не совпадает"; 
    } else {
        $sql = "INSERT INTO `Users` (login, pass, email) VALUES ('$login', '$pass', '$email')";
        if ($conn -> query($sql) === TRUE){
           echo "Успех";
        }
        else {
           echo "Давай по новой" .$conn -> error;
        }

    }
} 
?>