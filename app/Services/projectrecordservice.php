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
