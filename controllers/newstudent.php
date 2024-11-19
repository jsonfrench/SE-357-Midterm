<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require_once '../models/students_model.php';
require_once '../models/credentials_model.php';

$students_model = new StudentsModel();
$credentials_model = new CredentialsModel();

// var_dump($class_levels);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $getvars = $_GET;
   if (isset($getvars["action"]) && $getvars["action"] == 'add') {

        //print_r($_POST);  // print what got added to database
        // call the model method to insert the student
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $classOf = $_POST['classOf'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $added_student = $students_model->add_student($first_name, $last_name, $classOf, $email, $password);

        //print_r($added_student);
        echo "added student";
    }
} 

include '../views/newstudent_view.php'
?>