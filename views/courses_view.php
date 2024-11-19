<html>
<head>Courses List</head>
<body>
<p><a href="newcourse.php">Add Course</a>
    <table border="1">
    <tr><th>ID</th><th>Course Number</th><th>Description</th></tr>
<?php
  foreach ($courses_list as $course) {
    $id = $course['id'];
    echo 
    '<tr>' .
    '<td>' . $course['id'] . '</td>' .
    '<td>' . $course['course_number'] . '</td>' .
    '<td>' . $course['course_description'] .  '</td>' . 
    '</tr>'
    ;
  }
?>
</table>
<p><a href="students.php">Students List</a><br>
<a href="login.php">Log Out</a>
</body>
</hmtl>