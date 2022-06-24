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
echo "<button  onclick='deleteAccept(".$_GET['id'].")'>Delete</button>";
?>

<a href="main.php">Main</a>
<script>
    function deleteAccept(id) {
        const x= window.confirm("Are you sure?");
        if (x) location.href="http://films.local/Controllers/deleteFilm.php?id="+id;
    }

</script>