<?php


class checkActorInDb
{
    private $pdo;
    function __construct(){
        $this->pdo=null;
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=films','root');
    }
    function checkActor($actor){
        $stmt=$this->pdo->query("SELECT * FROM actors WHERE actor_name='$actor'");
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            if(isset($row)){ return false;}
        }
        return true;
    }
    function __destroy(){
        $this->pdo=null;
    }

}