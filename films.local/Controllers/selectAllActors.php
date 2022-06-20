<?php
require_once '..\db\selectAllActorsFromDb.php';
function selectAllActors(){
    $selectAllActors = new selectAllActorsFromDb;
    return $selectAllActors->selectAllActors();
}
