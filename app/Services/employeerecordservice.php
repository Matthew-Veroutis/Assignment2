<?php

namespace services;

class EmployeeRecordService {
    public function validateEmployeeRecord($firstName, $departmentID, $title) {
        if (empty($firstName) || empty($departmentID) || empty($title) || !$this->isValidTitle($title)) {
            return false; 
        }
        return true;
    }

    //Rule 5: Ensure all employee records have the title only containing alphabetical characters.
    public function isValidTitle($title) {
        if (empty($title)) {
            return false;
        }
        return ctype_alpha(str_replace(' ', '', $title));
    }

    public function validateInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}

//testing:

$employeeRecordService = new EmployeeRecordService();

echo "first test: ";
echo $employeeRecordService->validateEmployeeRecord("Matthew", 5, "") ? 'Valid Input' : 'Invalid Input';
echo "<br>";

echo "second test: ";
echo $employeeRecordService->validateEmployeeRecord("Matthew", 5, "Manager") ? 'Valid Input' : 'Invalid Input';
echo "<br>";

echo "third test: ";
echo $employeeRecordService->validateEmployeeRecord("", 5, "Manager") ? 'Valid Input' : 'Invalid Input';
echo "<br>";

echo "fourth test: ";
echo $employeeRecordService->validateEmployeeRecord("Matthew", "", "Manager") ? 'Valid Input' : 'Invalid Input';
echo "<br>";

echo "fourth test: ";
echo $employeeRecordService->validateEmployeeRecord("Matthew", "", "Manager52") ? 'Valid Input' : 'Invalid Input';
echo "<br>";

//Valid because title contains only alphabetical letters
echo "fifth test: ";
echo $employeeRecordService->isValidTitle("Manager") ? 'Valid Input' : 'Invalid Input';
echo "<br>";

//Invalid because title contains numbers
echo "sixth test: ";
echo $employeeRecordService->isValidTitle("Manager1") ? 'Valid Input' : 'Invalid Input';
echo "<br>";