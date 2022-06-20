<?php
function readFromFile($path)
{
    $filmFromFile = [];
    $filmsData=[];
    $content = file_get_contents("$path");
    $lines = explode("\n", $content);
    foreach ($lines as $line) {
        $row = explode(": ", $line);
        if ($row[0] != NUll) {
            array_push($filmFromFile, $row[1]);

        } else {
            if ($filmFromFile != NULL) {
                $filmFromFile[3] = explode(", ", substr($filmFromFile[3], 0, -1));
                //print_r($filmFromFile);

                array_push($filmsData,$filmFromFile);
               //echo "<br>";
                $filmFromFile = [];
            }
        }


    }
    return $filmsData;
}