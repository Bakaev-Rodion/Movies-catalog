<?php require_once '..\Controllers\addFilmFromFile.php';
addFilmFromFile();
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="filmsFile" value="choose .txt file" id='fileToUpload' accept='.txt'>
    <input type="submit" name="submitFile" value="send file to DB">
</form>
<a href="main.php">Main</a>