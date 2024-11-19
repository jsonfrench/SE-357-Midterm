<?php

class StudentsModel {
  public $students = array();
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localhost:8889;dbname=midterm_se357;charset=UTF8','root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }

  // Add student method 
  public function add_student($first_name, $last_name, $classOf, $email, $password) {

	try {
			$stmt = $this->db->prepare("INSERT INTO students(first_name,last_name,classOf) VALUES(:first_name,:last_name,:classOf)");

			$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
			$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
			$stmt->bindParam(':classOf', $classOf, PDO::PARAM_STR);

			$stmt->execute();
			$students_id = $this->db->lastInsertId();

			$credentials_model = new CredentialsModel();
			$credentials_model->add_credential($email, $password, $students_id);

		} catch(PDOException $ex) {	  
			var_dump($ex->getMessage());
	  	}	
  }


public function verify_login($email, $pwd) {
	try {
		$stmt = $this->db->prepare('SELECT * FROM students where email =:email AND pwd=CONCAT("*", UPPER(SHA1(UNHEX(SHA1(:pwd))))) ');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':pwd', $pwd, PDO::PARAM_STR);
	  	$stmt->execute();
	  	$found_student = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return true;
		// return sizeof($found_student);
	  } catch(PDOException $ex) {
		 var_dump($ex->getMessage());
	  }

}

public function listStudents () {

  try {
//    $stmt = $this->db->query('SELECT s.*, cl.class_level as class_level_desc FROM students s JOIN class_levels cl on s.class_level=cl.id');

    $stmt = $this->db->query('SELECT *  FROM students');


	$this->students = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) {
     var_dump($ex->getMessage());
   }
 
   return $this->students;
}
    
public function find_student_by_id($id) {
	try {
	 $stmt = $this->db->prepare('SELECT * FROM students where id=:id');
	 $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	 $stmt->execute();
	 $student = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 return $student;
   }
	catch(PDOException $ex) {
	  var_dump($ex->getMessage());
	}
}

// public function find_classes_by_id($id) {
// 	try {
// 	 $stmt = $this->db->prepare('SELECT c.id, c.course_number, c.course_description 
// 	 							FROM registrations r
// 								JOIN courses c ON r.courses_id = c.id
// 								WHERE r.students_id = :students_id');
// 	 $stmt->bindParam(':id', $id, PDO::PARAM_INT);
// 	 $stmt->execute();
// 	 $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	 return $course;
//    }
// 	catch(PDOException $ex) {
// 	  var_dump($ex->getMessage());
// 	}
// }


public function search_courses_by_student_id ($student_id) {
	
	try {

	  $stmt = $this->db->prepare('SELECT 
									c.id AS course_id, 
									c.course_number, 
									c.course_description
								FROM 
									registrations r
								JOIN 
									courses c ON r.courses_id = c.id
								WHERE 
									r.students_id = :student_id;
								');
	  $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
	  $stmt->execute();
	  $found_courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  return $found_courses;
	
	} catch(PDOException $ex) {
	  
	  var_dump($ex->getMessage());
	}
  
}

}

//  $model = new StudentsModel();

//  $verify_login = $model->verify_login("csayer0@fema.gov", "SayerALLLL");
//  var_dump($verify_login);

// $model->listStudents();
 
//  $myStudents = $model->listStudents();
//  var_dump($myStudents);


//                       
// $findStudent = $model->find_student_by_id(222);
// var_dump($findStudent);

//   $search_students = $model->search_students ("Comp", "AL", "masters");
//   var_dump($search_students);

//  $new_student = $model->add_student ("Jennifer", "Greene", "jenng@gmail.com", "100 Main St", "West Long Branch", "NJ", "Computer Science", "Junior");
//  var_dump($new_student);

?>
