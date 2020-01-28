<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "common_funcs.php";

$db = getSqlCon();
$query = $db->exec("CREATE TABLE users (id INTEGER PRIMARY KEY, username STRING, password STRING");
if($query) {
echo "Success";
}

?>