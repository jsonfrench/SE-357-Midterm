<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>


<html><head><title>Login</title></head>

<form method="post"action="../controllers/login.php?action=login">

<fieldset>
    <legend>Login:</legend>
    <label for="email">EMail: </label>
    <input type="text" id="email" name="email" value="" size="64"><br>
    <label for="password">Password: </label>
    <input type="password" name="password" value=""><br>
    <p><i><?= $message; ?>
    <hr>
    <input type="reset" value="Reset">&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Login">
</fieldset>
</form>

</html>