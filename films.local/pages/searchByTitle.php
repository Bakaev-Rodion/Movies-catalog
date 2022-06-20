<?php
require_once '..\Controllers\searchTitle.php';

?>
<form method="get">
    Input title:
    <input type="text" name="title">
    <input type="submit" value="Search">
</form>
<?php
if(isset($_GET['title'])){

    $searchTitle=searchTitle(htmlentities($_GET['title']));
    $check=false;
    while($row=$searchTitle->fetch(PDO::FETCH_ASSOC)) {
        if (!$check) {
            echo $row['title']."<br>";
            echo $row['year']."<br>";
        }
        $check = true;
        echo $row['actor_name']."<br>";
    }
}
?>
<a href="main.php">Main</a>