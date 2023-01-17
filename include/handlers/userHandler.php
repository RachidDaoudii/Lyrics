<?php
session_start();

include_once ('../../Models/user.model.php');
include_once ('../../Class/Users.php');




if(isset($_POST["login"]))
{
   $email = $_POST["loginEmail"]; 
   $password = $_POST["loginPassword"]; 

   if(empty($email) || empty($password)){

    $_SESSION['erreur']="Error email or password";
    header('Location: ../../login.php');

   }else{
    $user = new usersModel();
    $user->login(new Users(null,null,$email,$password));
   }

   

}


?>