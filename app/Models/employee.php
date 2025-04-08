<?php

namespace models;

use database\DBConnectionManager;
use services\EmployeeRecordService;

//"../core/db/dbconnectionmanager.php"
// OR
// __DIR__ -> c:\xampp\htdocs\app\Models
// dirname(__DIR__) ->c:\xampp\htdocs\app\
require(dirname(__DIR__)."/core/db/dbconnectionmanager.php");
require(dirname(__DIR__)."/services/employeerecordservice.php");

class Employee{
    private $employeeID;
    private $firstName;
    private $lastName;
    private $title;
    private $departmentID;

    private $dbConnection;
    private $employeeRecordService;

    // Constructor
    public function __construct() {

        $this->dbConnection = (new DBConnectionManager())->getConnection();
        $this->employeeRecordService = new EmployeeRecordService();
    }

    // Getter and setter for firstName
    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    // Getter and setter for lastName
    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    // Getter and setter for title
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    // Set the department for this employee
    public function setDepartmentID(Department $departmentID) {
        $this->departmentID = $departmentID;
    }

    // Get the department for this employee
    public function getDepartmentID() {
        return $this->departmentID;
    }

    // Getter and setter for id (in case you are using a database)
    public function getEmployeeID() {
        return $this->employeeID;
    }

    public function setEmployeeID($id) {
        $this->employeeID = $id;
    }

    // Read all Employees
    public function read() {
        $query = "SELECT * FROM employees";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Read single Employee by ID
    public function readOne() {
        $query = "SELECT * FROM employees WHERE employeeID = :employeeID";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(':employeeID', $this->employeeID);
        echo "ID: ".$this->employeeID;
    //    $stmt ->setFetchMode(\PDO::FETCH_CLASS, 'Employee');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Employee::class);
    }

    public function create() {
        if($this->employeeRecordService->validateEmployeeRecord($this->firstName, $this->departmentID, $this->title)) {
            $query = "INSERT INTO employees VALUES(:employeeID, :firstName, :lastName, :title, :departmentID)";
            $stmt = $this->dbConnection->prepare($query);

            $employeeID = $this->employeeRecordService->validateInput($this->employeeID);
            $firstName = $this->employeeRecordService->validateInput($this->firstName);
            $lastName = $this->employeeRecordService->validateInput($this->lastName);
            $title = $this->employeeRecordService->validateInput($this->title);
            $departmentID = $this->employeeRecordService->validateInput($this->departmentID);

            $stmt->bindParam(':employeeID',$employeeID);
            $stmt->bindParam(':firstName',$firstName);
            $stmt->bindParam(':lastName',$lastName);
            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':departmentID',$departmentID);
            $stmt->execute();
        } else 
            echo "Insert Failed please fill all required fields such as firstName, departmentID and title ";
        
    }

}

/*TEST   
$employee = new Employee();
foreach ($employee->read() as &$value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}
 */