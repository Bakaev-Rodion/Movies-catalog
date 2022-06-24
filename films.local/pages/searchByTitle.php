<?php
require_once '..\Controllers\searchTitle.php';

?>
<form method="get">
    Input title:
    <input type="text" name="title" value="<?php if(isset($_GET['title'])) echo htmlentities($_GET['title']); ?>">
    <input type="submit" value="Search">
</form>
<?php
if(isset($_GET['title'])){
    $title = preg_replace("/\s+/", " ", $_GET['title']);
    if($title != " ") {
        $searchTitle = searchTitle(htmlentities($title));

        $preFilm = null;
        while ($row = $searchTitle->fetch(PDO::FETCH_ASSOC)) {
            if ($row['title'] != $preFilm) {
                echo "<hr>";
                echo $row['title'] . "<br>";
                echo $row['year'] . "<br>";
                $preFilm = $row['title'];

            }


            echo $row['actor_name'] . "<br>";

        }
        echo "<hr>";
    }
    else echo "Error! Input part of title, not spaces or space! <br>";
}
?>
<a href="main.php">Main</a>