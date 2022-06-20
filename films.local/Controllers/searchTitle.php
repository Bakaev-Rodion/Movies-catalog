<?php
require_once '..\db\searchByTitleFromDB.php';
function searchTitle($title){
    $searchTitle = new searchByTitleFromDB;
    return $searchTitle->searchByTitle($title);
}
