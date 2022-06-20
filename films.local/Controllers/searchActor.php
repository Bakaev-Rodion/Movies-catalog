<?php

require_once '..\db\searchByActorFromDB.php';
function searchActor($title)
{
    $searchTitle = new searchByActorFromDB;
    return $searchTitle->searchByActor($title);
}