<?php
require_once '..\Controllers\searchActor.php';

?>
<form method="get">
    Input actor:
    <input type="text" name="actor" value="<?php if(isset($_GET['actor'])) echo htmlentities($_GET['actor']); ?>">
    <input type="submit" value="Search">
</form>
<?php
if(isset($_GET['actor'])){
    $actor = preg_replace("/\s+/", " ", $_GET['actor']);
    if($actor != " ") {
        $searchActor=searchActor(htmlentities($actor));
        $preActor=null;

        while ($row = $searchActor->fetch(PDO::FETCH_ASSOC)) {
            if ($row['actor_name'] != $preActor) {
                echo "<hr>";
                echo $row['actor_name'] . "<br>";
                $preActor = $row['actor_name'];
            }
            $check = true;
            echo $row['title'] . "<br>";
            echo $row['year'] . "<br>";
        }
    } else echo "Error! Input part of name, not spaces or space! <br>";
}
echo "<hr>";
?>
<a href="main.php">Main</a>
