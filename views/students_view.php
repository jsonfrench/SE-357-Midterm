<html>
<head>Students List</head>
<body>
<p><a href="newstudent.php">Add New Student</a>
    <table border="1">
    <tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Graduation Year</th></tr>
<?php

  foreach ($students_list as $student) {
    $id = $student['id'];
    echo '<tr><td><a href="student.php?id='. $id . '">' . $student['id'] . '</a></td><td>' . $student['first_name'] . '</td>';
    echo '<td>' . $student['last_name'] . '</td><td>' . $student['classOf'] . '</td></tr>';
  }
?>
</table>
<p><a href="courses.php">Courses List</a><br>
<a href="login.php">Log Out</a>
</body>
</hmtl>