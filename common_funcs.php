<?php
session_start();

function getUserArray() {

$base_array = json_decode(file_get_contents("dogaphp.users"));
$real_array = Array();

foreach($base_array as $arr) {
$realpush = [base64_decode($arr[0]), base64_decode($arr[1]), base64_decode($arr[2])];
array_push($real_array, $realpush);
}

return $real_array;
}

function userExists($array, $username) {
	
foreach($array as $arr2) {

if($arr2[0] == $username) return true;

}

return false;
}

function getUserIndex($array, $username) {
$i = 0;
foreach($array as $arr2) {
if($username == $arr2[0]) return $i;
$i++;
}
return false;
}

function checkIssets($arr) {

foreach($arr as $ch) {
if(!isset($ch)) return false;
}

return true;

}

function checkLength($str, $min, $max) {
if(strlen($str) > ($min-1) && strlen($str) < $max+1) return true;
return false;
 
}

function saveUserArray($array) {
$base_array = $array;
$real_array = Array();

foreach($base_array as $arr) {
$realpush = [base64_encode($arr[0]), base64_encode($arr[1]), base64_encode($arr[2])];
array_push($real_array, $realpush);
}

echo(file_put_contents("dogaphp.users", json_encode($real_array)));
}

function createUser($username, $password, $email) {
$users = getUserArray();
if(userExists($users, $username)) return false;

array_push($users, [$username, password_hash($password, PASSWORD_DEFAULT), $email]);
saveUserArray($users);
return true;

}

function authUser($username, $password) {
$array = getUserArray();
var_dump($array);
if(!userExists($array, $username)) return false;
if(password_verify($password, $array[getUserIndex($array, $username)][1])) return true;
return false;

}

function sessionCheck() {
if($_SESSION["loggedin"] == true && isset($_SESSION["username"])) return true;
return false;
}

function getUserEmail($username) {
$arr = getUserArray();
return $arr[getUserIndex($username)][2];
}

function blockNotLoggedIn() {
if(!sessionCheck()) {
header("Location: index.php");
die();
}
}
function blockLoggedIn() {
if(sessionCheck()) {
header("Location: index.php");
die();
}
}

?>