<?php

namespace controllers;

use services\ProjectRecordService;
use models\ProjectService;

require(dirname(__DIR__) . "/services/projectrecordservice.php");
require(dirname(__DIR__) . "/models/projectservice.php");

class ProjectRecordController {
    private $projectrecordservice;
    private $projectService;

    public function __construct() {
        $this->projectrecordservice = new ProjectRecordService();
        $this->projectService = new ProjectService();
    }

    public function readProjects() {
        return $this->projectService->read();
    }

    public function readProjectById($id) {
        $this->projectService->setProjectId($id);
        return $this->projectService->readOne();
    }

    public function createProject($id, $name, $budget) {
        $isValidInput = $this->projectrecordservice->validateProjectRecord($name, $budget);
        $isValidBudget = $this->projectrecordservice->validateBudget($budget);

        if ($isValidInput && $isValidBudget) {
            $this->projectService->setProjectId($id);
            $this->projectService->setName($name);
            $this->projectService->setBudget($budget);
            $this->projectService->create();
        } else {
            echo "Create failed: Name and budget must be valid. Budget must be greater than 0.";
        }
    }
}
