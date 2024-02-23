<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");
// include main configuration file 
require_once PROJECT_ROOT_PATH . "/includes/config.php";
// include the use infrastructure files
require_once PROJECT_ROOT_PATH . "/infrastructure/UserRepository.php";
// include the application files 
require_once PROJECT_ROOT_PATH . "/application/BaseController.php";
// include the use domain files
require_once PROJECT_ROOT_PATH . "/domain/User.php";
?>