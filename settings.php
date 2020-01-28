<?php

require_once 'common_funcs.php';
require_once 'navbar.php';
blockNotLoggedIn();


?>

<!DOCTYPE HTML>

<html>

<head>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
</head>


<body>


<div style="text-align:center;">
<h1 style="margin-bottom:4px;">Beállítások!</h1>
<hr>
<?php
echo '<h2>Email: '.htmlspecialchars(getUserEmail()).'</h2>';
?>

</div>
</body>

</html>