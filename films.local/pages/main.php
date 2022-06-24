<?php
//define('PDO_CONFIG', );
session_start();
//require_once '..\Controllers\deleteFilm.php';
require_once '..\Controllers\showAllFilms.php';
$order=null;
if(isset($_GET['order'])) $order=$_GET['order'];
$allFilms = showAllFilms($order);
if(!isset($_SESSION['login'])){
echo "<a href='login.php'> Log In </a><br>";}
else {
    echo "Welcome ".$_SESSION['name']."<br>";
    echo "<a href='addFilmPage.php'>Add film</a><br>";
    echo "<a href='addFilmFromFile.php'>Add film from file</a><br>";
}

if(isset($_SESSION['login'])){
    echo "<a href='logout.php'>Logout</a><br>";
}
echo "<a href='searchByTitle.php'>Search film</a><br>";
echo "<a href='searchByActor.php'>Search actor</a><br>";
echo "<a href='main.php?order=A-Z'>Order by title A-Z</a><br>";
echo "<a href='main.php?order=Z-A'>Order by title Z-A</a><br>";
foreach ($allFilms as $film) {
    echo "<div class='film' style='height:150px; width:150px; margin:2px; display:inline-table; border: solid 2px; border-round:15px;'><a href='info.php?id=" . $film['id'] . "'>" . $film['title'] . "</a>";
    echo "<br>";
    echo "Year: " . $film['year'] . "<br>";
    if (isset($_SESSION['login']))
        echo "<button  onclick='deleteAccept(".$film['id'].")'>Delete</button>";
    echo "<br></div>";
}?>
<script>
    function deleteAccept(id) {
        const x= window.confirm("Are you sure?");
        if (x) location.href="http://films.local/Controllers/deleteFilm.php?id="+id;
    }

</script>