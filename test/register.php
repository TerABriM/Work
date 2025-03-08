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
      $sql = "INSERT INTO `users` (login,pass,email) VALUE ('$login', '$pass', '$repeatpass', '$email')"
      if ($conn -> querry ($sql) === TRUE){
      echo "Этот пароль уже зарегистрирован";
    } else {
      $stmt = $conn -> prepare ("INSERT INTO registerUser (email, pass) VALUES (?, ?)");
      $stmt -> bind_param("ss", $email, $pass );
    }
      if ($conn -> query($sql) === TRUE){
         echo "Успех";
      }
      else {
         echo "Давай по новой" .$conn -> error;
      }
    }
}
?>