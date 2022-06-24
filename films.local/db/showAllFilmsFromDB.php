<?php

class showAllFilmsFromDB
{
    private $pdo;
    function __construct()
    {
        $this->pdo=null;
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=films','root','root');
    }

    function showAllFilms($order){
        $catalog=[];
        switch($order){
            case 'A-Z': $order=" ORDER BY title ASC"; break;
            case 'Z-A': $order=" ORDER BY title DESC"; break;
            default: $order = ""; break;
        }
        $stmt=$this->pdo->query("SELECT * FROM filmscatalog".$order);
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            array_push($catalog,$row);
        return $catalog;
    }
    function __destroy(){
        $this->pdo=null;
    }
}