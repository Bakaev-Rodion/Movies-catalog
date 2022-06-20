<?php
require_once "readFromFile.php";
require_once "saveFile.php";
require_once '..\db\addFilmToDb.php';
require_once '..\db\checkTitleInDb.php';
require_once '..\db\addActorToDb.php';
require_once '..\db\checkActorInDb.php';
function addFilmFromFile()
{
    if (isset($_POST['submitFile'])) {
        $file = uploadFile();
        if(isset($file)) {
            $filmsData = readFromFile('..\file\\' . $file);
            $addFilm = new addFilmToDb;
            $checkTitle = new checkTitleInDb;
            $addActors = new addActorToDb;
            $checkActor = new checkActorInDb;
            foreach ($filmsData as $film) {
                $actorsInFilm = [];
                $checkedTitle = $checkTitle->checkTitle($film[0]);
                foreach ($film[3] as $actor) {
                    $checkedActor = $checkActor->checkActor($actor);
                    $addActors->addActorToDb($actor, $checkedActor);
                    if (!$checkedActor)
                        array_push($actorsInFilm, $actor);
                }
                //print_r($actorsInFilm);
                $addFilm->addFilmToDb($film[0], $film[1], $film[2], $checkedTitle);
                $addFilm->addRelationFromFIle($film[0], $actorsInFilm, $checkedTitle);
            }
        }
    }
}
