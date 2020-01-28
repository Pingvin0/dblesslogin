<?php
require_once "common_funcs.php";

$forLoggedIn = Array(
Array("settings.php", "Beállítások"),
Array("logout.php", "Kijelentkezés")
);

$forLoggedOut = Array(
Array("register.php", "Regisztrálás"),
Array("login.php", "Bejelentkezés")
);

$forAll = Array(
Array("index.php", "Kezdőlap"),
Array("tags.php", "HTML Tagek"),
);
$currentf = basename($_SERVER["SCRIPT_FILENAME"]);

?>

<!DOCTYPE HTML>

<html>

<head>
<link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
</head>


<body>
<ul>
<?php
foreach($forAll as $s) {
$active = "";
if($currentf == $s[0]) {
$active = "active";
}
echo '<li><a href="'.$s[0].'" class="'.$active.'">'.$s[1].'</a></li>';
}
if(!sessionCheck())
foreach($forLoggedOut as $s) {
$active = "";
if($currentf == $s[0]) {
$active = "active";
}
echo '<li style="float:right;"><a href="'.$s[0].'" class="'.$active.'">'.$s[1].'</a></li>';
}

if(sessionCheck())
foreach($forLoggedIn as $s) {
$active = "";
if($currentf == $s[0]) {
$active = "active";
}
echo '<li style="float:right;"><a href="'.$s[0].'" class="'.$active.'" >'.$s[1].'</a></li>';
}
?>
</ul>
</body>
</html>