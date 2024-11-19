<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>

<html><head><title>Add a New Courses</title></head>
<form method="post" action="../controllers/newcourse.php?action=add">
  <fieldset>
    <legend>New course:</legend>

    <label for="course_number">Course Number: </label>
    <input type="text" id="course_number" name="course_number" value=""><br>
    
    <label for="course_description">Course Description: </label>
    <input type="text" name="course_description" value=""><br>
    
    <label for="semester">Semester: </label>
    <input type="text" name="semester" value=""><br>
    
    <label for="year">Year: </label>
    <input type="number" name="year" value=""><br>

    <hr>

    <input type="reset" value="Reset">&nbsp;&nbsp;<input type="submit" value="Add">
  </fieldset>
</form>
<p>
<a href="courses.php">Courses List</a><br>
<a href="login.php">Log Out</a>

</html>