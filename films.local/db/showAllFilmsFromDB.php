<?php

class showAllFilmsFromDB
{
    private $pdo;
    function __construct()
    {
        $this->pdo=null;
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=films','root');
    }

    function showAllFilms($order){
        $catalog=[];
        if($order!=null) $order = " ORDER BY title";
        $stmt=$this->pdo->query("SELECT * FROM filmscatalog".$order);
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            array_push($catalog,$row);
        return $catalog;
    }
    function __destroy(){
        $this->pdo=null;
    }
}