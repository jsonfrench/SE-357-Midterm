<?php
class CoursesModel {
  public $courses = array();
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localhost:8889;dbname=midterm_se357;charset=UTF8','root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }

  public function listCourses () {

    try {
        $stmt = $this->db->query('SELECT * FROM courses ORDER BY id');
        $this->courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $this->courses;
  }

  // Add courses method 
  public function add_course($course_number, $course_description, $semester, $year) {

    try {
        $stmt = $this->db->prepare("INSERT INTO courses(course_number,course_description,semester,year) VALUES(:course_number,:course_description,:semester,:year)");
  
        $stmt->bindParam(':course_number', $course_number, PDO::PARAM_STR);
        $stmt->bindParam(':course_description', $course_description, PDO::PARAM_STR);
        $stmt->bindParam(':semester', $semester, PDO::PARAM_STR);
        $stmt->bindParam(':year', $year, PDO::PARAM_STR);
  
        $stmt->execute();
        $courses_id = $this->db->lastInsertId();
    
      } catch(PDOException $ex) {	  
        var_dump($ex->getMessage());
      }	  
    }
}

// $class_levels_model = new ClassLevelsModel();

// $cl = $class_levels_model->listClassLevels();
// var_dump($cl);

?>