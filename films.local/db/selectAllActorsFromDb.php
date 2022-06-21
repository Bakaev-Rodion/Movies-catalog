<?php


class selectAllActorsFromDb
{
    private $pdo;
    function __construct()
    {
        $this->pdo=null;
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=films','root','root');
    }
    public function selectAllActors(){
        $actors=[];

        $stmt=$this->pdo->query("SELECT * FROM actors");
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            array_push($actors,$row);
        return $actors;
    }
    function __destroy(){
        $this->pdo=null;
    }

}