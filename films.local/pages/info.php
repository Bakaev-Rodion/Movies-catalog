<?php
require_once '..\db\showInfoFromDB.php';
$getInfo = new showInfoFromDB;
$filmInfo = $getInfo->showInfo($_GET['id']);
$check=false;

while($row=$filmInfo->fetch(PDO::FETCH_ASSOC)) {
    if (!$check) {
        echo $row['title']."<br>";
        echo $row['year']."<br>";
    }
    $check = true;
    echo $row['actor_name']."<br>";
}
?>
<a href="main.php">Main</a>
