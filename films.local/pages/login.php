<?php
session_start();
$error=null;
$md5 = hash('md5', 'XyZzy12*_php123');
$hashPass=NULL;
$passCheck=false;
$logInfo = false;
if(isset($_POST['cancel'])) header("Location: pages/main.php");
if((empty($_POST['who'])||empty($_POST['pass']))&&(array_key_exists('pass', $_POST)&&array_key_exists('who',$_POST)))
    $error='User name and password are required';
else{$logInfo=true;}
if(array_key_exists('pass',$_POST)) $hashPass=hash('md5','XyZzy12*_'.$_POST['pass']);
if($md5!=$hashPass&&!empty($_POST['pass'])&&array_key_exists('who',$_POST))
    $error='Incorrect password';
else{$passCheck=true;
    if(isset($_POST['who'])) {
        $_SESSION['name'] = $_POST['who'];
        $_SESSION['login'] = true;
    }
}
if($passCheck&&$logInfo&&isset($_POST['log_in']))
    header('Location: main.php?name='.$_POST['who']);
?>
<h1>Please Log In</h1>
<p style="color:red"><?=$error?></p>
<form method="post">
    <label for="login">User Name</label>
    <input type="text" name="who" id="login"><br/>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass"><br/>
    <input type="submit" name='log_in'value="Log In">
    <input type="submit" name='cancel'value="Cancel">
</form>
