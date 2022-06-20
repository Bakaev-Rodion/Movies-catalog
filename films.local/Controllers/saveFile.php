<?php
function uploadFile()
{
    $filename = $_FILES["filmsFile"]["name"];
    if(move_uploaded_file($_FILES["filmsFile"]["tmp_name"], "../file/" . $filename))
    return basename($filename);
}
