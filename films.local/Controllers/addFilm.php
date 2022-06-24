<?php
require_once 'selectAllActors.php';
require_once '..\db\addFilmToDb.php';
require_once '..\db\checkTitleInDb.php';
$actors = selectAllActors();
$actorsInFilm=[];
if(isset($_POST['addFilm'])){
    $title = preg_replace("/\s+/", " ", $_POST['title']);
    if($title!=" ") {
        foreach ($actors as $actor) {
            if (isset($_POST['actor' . $actor['actor_id']])) {
                array_push($actorsInFilm, htmlentities($actor['actor_id']));
            }
        }
        $addFilm = new addFilmToDb;
        $checkTitle = new checkTitleInDb;
        $check = $checkTitle->checkTitle(htmlentities($_POST['title']));
        $addFilm->addFilmToDb(htmlentities($_POST['title']), htmlentities($_POST['year']), htmlentities($_POST['format']), $check);
        $addFilm->addRelation(htmlentities($_POST['title']), $actorsInFilm, $check);

    }
    else echo "Error! Dont input only spaces!";
foreach($_POST as $post){
    unset($post);
}
}