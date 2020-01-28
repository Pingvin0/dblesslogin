<?php

require_once 'common_funcs.php';
require_once 'navbar.php';
?>
<!DOCTYPE HTML>

<html>

<head>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
</head>


<body>


<div style="text-align:center;">
<?php
if(!sessionCheck()) {
echo '<h1>Üdv a dolgozat weboldalamon!</h1>';
}
else {
echo '<h1>Üdv, '.$_SESSION["username"].'!';
}
?>
<h2>Ide nem tudom mit írjak még!</h2>
</div>

</body>

</html>