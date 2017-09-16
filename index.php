<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once "common_functions.php";
include_once "db.class.php";
include_once "mdl_properties.php";

// Define DB connection string
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "evltd_property";

// Initialize DB connection
$db = new MysqliDb ($db_host, $db_user, $db_pass, $db_name);
$obj_prop = new Mdl_Properties();


$page = isset($_REQUEST['req_page']) ? $_REQUEST['req_page'] : 'dashboard';
switch($page)
{
    case 'dashboard':
        include_once('dashboard.php');
        break;
    case 'get_properties':
        include_once('get_properties.php');
        break;
    case 'get_map_data':
        include_once('get_map_data.php');
        break;
    default:
        include_once('dashboard.php');
}