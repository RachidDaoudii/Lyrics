<?php
include_once ('../../DB/db.php');

class usersModel {

    public function login(Users $user){
        $sql = "SELECT * from users where email = ? and password =?";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($user->getEmail(),$user->getPassword()));
        $res = $statement->fetchAll();
        if($res == null){
            $_SESSION['erreur']="Error";
            header('Location: ../../login.php');
        }else{
            $_SESSION['id']=$res[0]["id"];
            $_SESSION['email']=$res[0]["email"];
            header('Location: ../../index.php');
        }
    }


}