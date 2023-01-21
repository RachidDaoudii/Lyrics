<?php
session_start();

include_once ('../../Models/user.model.php');
include_once ('../../Class/Users.php');

//function validation input 
function Validation($input){
   //Supprime les espaces debut et fin 
   $input = trim($input);
   //Supprimer quote string (\n \t \)
   $input = stripcslashes($input);
   //Convertit les balise html en string
   $input = htmlspecialchars($input);
   //Supprime les espaces center
   $input = preg_replace('/\s+/',' ', $input);
   return $input;
}


if(isset($_POST["login"]))
{
   $email = Validation($_POST["loginEmail"]); 
   $password = Validation($_POST["loginPassword"]); 

   if(empty($email) || empty($password)){

    $_SESSION['erreur']="Error email or password";
    header('Location: ../../login.php');

   }else{
    $user = new usersModel();
    $user->login(new Users(null,null,$email,$password));
   }

   

}


?>