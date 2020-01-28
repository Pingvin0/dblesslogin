<?php
session_start();
$_SESSION["username"] = null;
$_SESSION["loggedin"] = false;
header("Location: index.php");
die();
?>