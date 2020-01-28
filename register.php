<?php

require_once 'common_funcs.php';
require_once 'navbar.php';
blockLoggedIn();

if($_SERVER["REQUEST_METHOD"] == "POST" && checkIssets([$_POST["username"], $_POST["email"], $_POST["password"]])) {
	
	
	
if(checkLength($_POST["username"], 4, 10) && checkLength($_POST["email"],3,20) && checkLength($_POST["password"], 5, 128)) {

	
if(createUser($_POST["username"], $_POST["password"], $_POST["email"])) {
$_SESSION["username"] = $_POST["username"];
$_SESSION["loggedin"] = true;
header("Location: index.php");
die();
} else {
echo "<script>alert('Már létezik ilyen felhasználó!')</script>";
}


} else {
echo "<script>alert('Hibás hossz!')</script>";
}


}
?>

<!DOCTYPE HTML>

<html>

<head>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
</head>


<body>


<div style="text-align:center;">
<h1 style="margin-bottom:4px;">Regisztrációk nyitva!</h1>
<hr>
<form action="register.php" method="POST">
<div style="display:inline-block;">
<div>
<input type="text" placeholder="Felhasználónév" name="username" match="{4,10}" required>
</div>
<div>
<input type="email" placeholder="E-mail cím" name="email" match="{3,}" required>
</div>
<div>
<input type="password" placeholder="Jelszó" name="password" match="{5,}" required>
</div>

<button style="float:left;margin-top:5px;margin-left:8px;" type="submit">Regisztrálj!</button>
</div>
</form>

</div>
</body>

</html>