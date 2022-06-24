<?php
require_once '..\db\deleteFilmFromDB.php';
deleteFilm();

function deleteFilm()
{
    if(isset($_GET['id'])) {
        $deleteFilm = new deleteFilmFromDB;
        $deleteFilm->deleteFilm($_GET['id']);
       header('Location: ../pages/main.php');
    }
}?>


