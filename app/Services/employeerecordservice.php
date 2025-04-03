<?php

namespace services;

class EmployeeRecordService {
    public function validateEmployeeRecord($firstName, $departmentID, $title) {
        if (empty($firstName) || empty($departmentID) || empty($title)) {
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
