<?php

declare(strict_types=1);
require_once "backend/auth/auth.php";
require_once "backend/db/mysql_connect.php";
$url = $_SERVER['REQUEST_URI'];
global $system_Type;
global $message;
$message = [];
$system_Type = "database";
$st_number = 1;
if ($system_Type === "database") {
       
    if ($url === "/classroom.php") {
        require_once "backend/classroomdbActions.php";
        require_once "backend/classroomRouting.php";
    }else if($url === "/report.php"){
        require_once "backend/studentdbActions.php";
        $report =report();
    } else {
        require_once "backend/studentdbActions.php";
        require_once "backend/studentRouting.php";
        $students = readData();
    }
    $classrooms = readDataClassroom();
} else {
    require_once "backend/actions.php";
    $students = readFromJson("data.json");
}
require_once "backend/db/mysql-close.php";
