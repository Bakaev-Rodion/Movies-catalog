<?php
class deleteFilmFromDB
{
    private $pdo;
    function __construct(){
        $this->pdo=null;
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=films','root');
    }
    function deleteFilm($id){
        $this->pdo->query("DELETE FROM film_actor_relation WHERE film_id=$id");
        $this->pdo->query("DELETE FROM filmscatalog WHERE filmscatalog.id=$id");
    }
    function __destroy(){
        $this->pdo=null;
    }
}