<?php
include '/var/www/html/process/connectBdd.php';

class user{

    static function getUser($username){
        $bdd = PDOMySQLConnector::getClient();
        $req = $bdd->prepare('SELECT * FROM Utilisateur WHERE username = :username');
        $req->execute(array(
            'username' => $username
        ));
        $user = $req->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    static function insertUser($username, $email, $password){
        $bdd = PDOMySQLConnector::getClient();
        $req = $bdd->prepare('INSERT INTO Utilisateur(`username`, `email`, `password`) VALUES(\''.$username.'\',\''.$email.'\',\''.$password.'\')');
        echo print_r($req);
        $req->execute();
        
        return "ok";
    }

    static function loginUser($username, $password){
        $bdd = PDOMySQLConnector::getClient();
        $req = $bdd->prepare('SELECT * FROM Utilisateur WHERE username = \''.$username.'\'');
        $req->execute();
        $user = $req->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    static function getUserPassword($password){
        $bdd = PDOMySQLConnector::getClient();
        $req = $bdd->prepare('SELECT * FROM Utilisateur WHERE password = \''.$password.'\'');
        $req->execute();
        $user = $req->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }
}