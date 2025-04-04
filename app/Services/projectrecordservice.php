<?php 

namespace services;

class ProjectRecordService {
    public function validateProjectRecord($name, $budget) {
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