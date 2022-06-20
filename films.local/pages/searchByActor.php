<?php
require_once '..\Controllers\searchActor.php';

?>
<form method="get">
    Input actor:
    <input type="text" name="actor">
    <input type="submit" value="Search">
</form>
<?php
if(isset($_GET['actor'])){$searchActor=searchActor(htmlentities($_GET['actor']));
    $check=false;
    while($row=$searchActor->fetch(PDO::FETCH_ASSOC)) {
        if (!$check) {
            echo $row['actor_name']."<br>";
        }
        $check = true;
        echo $row['title']."<br>";
        echo $row['year']."<br>";
    }
}
?>
<a href="main.php">Main</a>
