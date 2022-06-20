<?php
require_once '..\db\showAllFilmsFromDB.php';
function showAllFilms($order)
{
    $getAllFilms = new showAllFilmsFromDB;
    return $getAllFilms->showAllFilms($order);
}