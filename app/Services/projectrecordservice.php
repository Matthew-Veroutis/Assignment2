<?php 

namespace services;

class ProjectRecordService {
    public function validateProjectRecord($name, $budget) {
        $name = $this->validateInput($name);
        $budget = $this->validateInput($budget);
        if (empty($name) || empty($budget)) {
            return false; 
        }
        return true;
    }

    public function validateInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // ensure that all project records have a budget amount greate than zero
    public function validateBudget($budget) {
        $budget = $this->validateInput($budget);
        if ($budget <= 0) {
            return false;
        }
        return true;
    }
}

//testing:

$projectrecordservice = new ProjectRecordService();

echo "first test: ";
echo $projectrecordservice->validateProjectRecord("Apple", 10000) ? 'Valid Input' : 'Invalid Input';
echo "<br>";

echo "second test: ";
echo $projectrecordservice->validateProjectRecord("Mango", null) ? 'Valid Input' : 'Invalid Input';
echo "<br>";

echo "third test: ";
echo $projectrecordservice->validateProjectRecord("", 100000) ? 'Valid Input' : 'Invalid Input';
echo "<br>";

echo "fourth test: ";
echo $projectrecordservice->validateProjectRecord("", null) ? 'Valid Input' : 'Invalid Input';
echo "<br>";

echo "fifth test: ";
echo $projectrecordservice->validateBudget(0) ? 'Budget amount valid' : 'Invalid budget amount';
echo "<br>";

echo "sixth test: ";
echo $projectrecordservice->validateBudget(500) ? 'Budget amount valid' : 'Invalid budget amount';
echo "<br>";