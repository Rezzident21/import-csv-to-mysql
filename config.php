<?php

session_start();
define("ROOT", 'C:\xampp\htdocs\import-csv-to-mysql');
const CONTROLLER_PATH = ROOT . '/controllers/';
const MODEL_PATH = ROOT . "/models/";
const VIEW_PATH = ROOT . "/views/";
require_once("db.php");
require_once("route.php");

require_once MODEL_PATH . 'Model.php';
require_once VIEW_PATH . 'View.php';
require_once CONTROLLER_PATH . 'Controller.php';
Routing::buildRoute();