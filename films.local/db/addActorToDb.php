<?php


class addActorToDb
{
    private $pdo;
    function __construct(){
        $this->pdo=null;
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=films','root','root');
    }
    public function addActorToDb($actor,$check){
        if($check) {
            $this->pdo->query(" INSERT INTO actors(actor_name) VALUES ('$actor')");
        }
    }
    function __destroy(){
        $this->pdo=null;
    }
}