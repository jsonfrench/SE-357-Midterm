<?php
require_once '../models/courses_model.php';

$model = new CoursesModel();

 $courses_list = $model->listCourses();

require_once '../views/courses_view.php';
?>
