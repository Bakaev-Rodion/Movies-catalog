<?php


class addFilmToDb
{
    private $pdo;
    function __construct(){
        $this->pdo=null;
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=films','root','root');
    }
    public function addFilmToDb($title,$year,$format,$check){
        if($check) {
           $this->pdo->query(" INSERT INTO filmscatalog(title,year,format) VALUES ('$title',$year,'$format')");
        }
    }
    public function addRelation($title,$actors,$check){
        if($check) {
            foreach ($actors as $actor) {
               $this->pdo->query("INSERT INTO film_actor_relation(film_id,actor_id) VALUES ((SELECT id FROM filmscatalog WHERE title='$title'),'$actor')");
            }
        }

    }
    public function addRelationFromFile($title,$actors,$check){
        if($check) {
            foreach ($actors as $actor) {
                $this->pdo->query("INSERT INTO film_actor_relation(film_id,actor_id) VALUES ((SELECT id FROM filmscatalog WHERE title='$title'),(SELECT actor_id FROM actors WHERE actor_name='$actor'))");
            }
        }

    }
    function __destroy(){
        $this->pdo=null;
    }

}