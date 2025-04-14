<?php

namespace models;

use database\DBConnectionManager;
use services\ProjectRecordService;

require(dirname(__DIR__)."/core/db/dbconnectionmanager.php");
require(dirname(__DIR__)."/services/projectrecordservice.php");

class ProjectService {
    private $projectId;
    private $name;
    private $budget;

    private $dbConnection;
    private $projectrecordservice;

    public function __construct() {
        $this->dbConnection = (new DBConnectionManager())->getConnection();
        $this->projectrecordservice = new ProjectRecordService();
    }

    public function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    public function getProjectId() {
        return $this->projectId;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setBudget($budget) {
        $this->budget = $budget;
    }

    public function getBudget() {
        return $this->budget;
    }


}