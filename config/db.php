<?php
// ini_set("display_errors",0);
// ini_set("log_errors",1);
// ini_set("error_log","debugpms.log");
// date_default_timezone_set("Asia/kolkata");
// error_reporting(E_ALL);


$con = new mysqli("db_server", "root", "", "Pms");

if ($con->connect_error) {
    die("Connection Failed: " . $con->connect_error);
}



