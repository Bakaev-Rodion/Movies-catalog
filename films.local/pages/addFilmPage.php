<?php
require_once '..\Controllers\addFilm.php';


?>
<form method="post">
    Title:
    <input type="text" name="title" autocomplete="on" required><br>
    Year:
    <input type="number" name ="year"  autocomplete="on" maxlength="4" required><br>
    Format:
    <select name="format" autocomplete="on">
        <option value="DVD" selected>DVD</option>
        <option value="VHS">VHS</option>
        <option value="Blue-Ray">Blue-Ray</option>
    </select>
    <br>

    Actors:<br>
    <?php

    foreach($actors as $actor)
        echo "<input type=checkbox name='actor".$actor['actor_id']."'id='actors' >"."<label for='actors'>".$actor['actor_name']."</label><br>"
    ?>
    <input type="submit" name="addFilm" Value="Add Film">

</form>
<a href="main.php">Main</a>