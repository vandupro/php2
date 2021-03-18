<?php
//admin: email: dunvph10007@fpt.edu.vn, pass: 1
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
$url = isset($_GET['url']) == true ? strtolower($_GET['url']) : '/';
require_once 'commons/utils.php';
require_once './vendor/autoload.php';
require_once 'commons/database-config.php';
require_once 'routing.php';



