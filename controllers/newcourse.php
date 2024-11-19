<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require_once '../models/courses_model.php';
require_once '../models/credentials_model.php';

$courses_model = new CoursesModel();

// var_dump($class_levels);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $getvars = $_GET;
   if (isset($getvars["action"]) && $getvars["action"] == 'add') {

        //print_r($_POST);  // print what got added to database
        // call the model method to insert the course
        $course_number = $_POST['course_number'];
        $course_description = $_POST['course_description'];
        $semester = $_POST['semester'];
        $year = $_POST['year'];

        $added_course = $courses_model->add_course($course_number, $course_description, $semester, $year);

        //print_r($added_course);
        echo "added course";
    }
} 

include '../views/newcourse_view.php'
?>