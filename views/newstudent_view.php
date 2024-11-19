<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>

<html><head><title>Add a New Students</title></head>
<form method="post" action="../controllers/newstudent.php?action=add">
  <fieldset>
    <legend>New Student:</legend>

    <label for="first_name">First Name: </label>
    <input type="text" id="first_name" name="first_name" value=""><br>
    
    <label for="last_name">Last Name: </label>
    <input type="text" name="last_name" value=""><br>
    
    <label for="email">Email: </label>
    <input type="text" name="email" value=""><br>
    
    <label for="password">Password: </label>
    <input type="password" name="password" value=""><br>

    <label for="classOf">Class Of: </label>
    <input type="number" name="classOf" value=""><br>

    <hr>

    <input type="reset" value="Reset">&nbsp;&nbsp;<input type="submit" value="Add">
  </fieldset>
</form>
<p><a href="students.php">Students List</a><br>
<a href="login.php">Log Out</a>

</html>