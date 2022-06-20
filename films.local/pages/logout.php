<?php
session_start();
session_destroy();
echo "Successfully logout"."<br>";
echo "<a href='main.php'>Main</a>";