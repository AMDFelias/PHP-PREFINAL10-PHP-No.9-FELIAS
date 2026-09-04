<?php
require_once 'config/Database.php';
require_once 'models/Faculty.php';

class FacultyController {
    private $db;
    private $faculty;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->faculty = new Faculty($this->db);
    }

    public function index() {
        $stmt = $this->faculty->readAll();
        $faculties = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once 'views/faculty_list.php';
    }

    public function add() {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitizeInput($_POST);
            $errors = $this->validate($data);

            if (empty($errors)) {
                $this->faculty->first_name = $data['first_name'];
                $this->faculty->middle_name = $data['middle_name'];
                $this->faculty->last_name = $data['last_name'];
                $this->faculty->age = $data['age'];
                $this->faculty->gender = $data['gender'];
                $this->faculty->address = $data['address'];
                $this->faculty->position = $data['position'];
                $this->faculty->salary = $data['salary'];

                if ($this->faculty->create()) {
                    header("Location: index.php?status=created");
                    exit;
                } else {
                    $errors[] = "Unable to create record.";
                }
            }
        }
        require_once 'views/faculty_add.php';
    }

    public function edit($id) {
        $errors = [];
        $this->faculty->id = $id;

        if (!$this->faculty->readOne()) {
            header("Location: index.php?status=not_found");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitizeInput($_POST);
            $errors = $this->validate($data);

            if (empty($errors)) {
                $this->faculty->first_name = $data['first_name'];
                $this->faculty->middle_name = $data['middle_name'];
                $this->faculty->last_name = $data['last_name'];
                $this->faculty->age = $data['age'];
                $this->faculty->gender = $data['gender'];
                $this->faculty->address = $data['address'];
                $this->faculty->position = $data['position'];
                $this->faculty->salary = $data['salary'];

                if ($this->faculty->update()) {
                    header("Location: index.php?status=updated");
                    exit;
                } else {
                    $errors[] = "Unable to update record.";
                }
            }
        }
        require_once 'views/faculty_edit.php';
    }

    public function delete($id) {
        $this->faculty->id = $id;
        if ($this->faculty->delete()) {
            header("Location: index.php?status=deleted");
        } else {
            header("Location: index.php?status=error");
        }
        exit;
    }

    private function validate($data) {
        $errors = [];
        if (empty($data['first_name'])) $errors[] = "First Name is required.";
        if (empty($data['last_name'])) $errors[] = "Last Name is required.";
        if (empty($data['age']) || !filter_var($data['age'], FILTER_VALIDATE_INT) || $data['age'] < 18) {
            $errors[] = "Age must be a valid number (18 or older).";
        }
        if (empty($data['gender'])) $errors[] = "Gender is required.";
        if (empty($data['address'])) $errors[] = "Address is required.";
        if (empty($data['position'])) $errors[] = "Position is required.";
        if (empty($data['salary']) || !is_numeric($data['salary']) || $data['salary'] < 0) {
            $errors[] = "Salary must be a positive number.";
        }
        return $errors;
    }

    private function sanitizeInput($data) {
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars(strip_tags(trim($value)));
        }
        return $data;
    }
}
?>