<?php


class addFilmFromFileToDb
{
    private $pdo;
    function __construct(){
        $this->pdo=null;
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=films','root','root');
    }
    public function addFromFIle(){

    }
    function __destroy(){
        $this->pdo=null;
    }
}