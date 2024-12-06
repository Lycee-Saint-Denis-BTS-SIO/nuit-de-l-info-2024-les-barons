<?php

include_once '/var/www/html/process/connectBdd.php';

class quiz{

    static function addPoint($idUser, $point){
        $bdd = PDOMySQLConnector::getClient();
        $req = $bdd->prepare('UPDATE Score SET score = score + :point WHERE idUser = :idUser');
        $req->execute(array(
            'point' => $point,
            'idUser' => $idUser
        ));
        return "ok";
    }

    static function createPoint($idUsername){
        $bdd = PDOMySQLConnector::getClient();
        $req = $bdd->prepare('INSERT INTO Score(`idUser`, `score`) VALUES(\''.$idUsername.'\', 0)');
        $req->execute();
        return "ok";
    }
}