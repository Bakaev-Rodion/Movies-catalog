<?php
class showInfoFromDB
{
    private $pdo;
    function __construct(){
        $this->pdo=null;
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=films','root','root');
    }
    function showInfo($id){
        return $this->pdo->query("SELECT DISTINCT filmscatalog.title,filmscatalog.year, actors.actor_name 
FROM filmscatalog , actors , film_actor_relation 
WHERE film_actor_relation.film_id=filmscatalog.id 
  AND filmscatalog.id=$id AND film_actor_relation.actor_id=actors.actor_id
                                            ");
    }
    function __destroy(){
        $this->pdo=null;
    }
}