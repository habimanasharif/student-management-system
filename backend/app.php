<?php
declare(strict_types=1);
require_once "backend/db/mysql_connect.php";
global $system_Type;
$system_Type="database";
$st_number=1;
if($system_Type==="database"){
require_once "backend/dbActions.php";
}else{
require_once "backend/actions.php";
}
require_once "backend/routing.php";

if($system_Type==="database"){
 $students=readData("data.json");
}
else{
 $students=readFromJson("data.json");
}
require_once "backend/db/mysql-close.php";
