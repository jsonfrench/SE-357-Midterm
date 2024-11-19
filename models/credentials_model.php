<?php
class CredentialsModel {
  public $credentials = array();
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localhost:8889;dbname=midterm_se357;charset=UTF8','root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }

  // Add student method 
  public function add_credential($email, $password, $students_id) {

    $stmt = $this->db->prepare("INSERT INTO credentials(email, password, students_id) VALUES(:email, :password, :students_id)");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':students_id', $students_id, PDO::PARAM_STR);

    $stmt->execute();

  }


public function verify_login($email, $password) {
	try {
		$stmt = $this->db->prepare('SELECT * FROM credentials where email =:email AND password =:password');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
	  	$stmt->execute();

        $found_student = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return sizeof($found_student) > 0;

    } catch(PDOException $ex) {
		 var_dump($ex->getMessage());
	  }
}

  public function listCredentials () {

    try {
        $stmt = $this->db->query('SELECT * FROM credentials ORDER BY id');
        $this->class_levels = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $this->class_levels;
  }
}

?>