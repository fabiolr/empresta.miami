<html>
<body>
<?php

session_start();
$_SESSION["user"] = "fabio";


require 'medoo.php';
require 'database.php';

$users = $database->select("users",["name","email","password"]);


		foreach($users as $user) {
		echo "<h4>".$user["name"] . "</h4>";
		echo "<h4>".$user["email"] . "</h4>";
		echo "<h4>".$user["password"] . "</h4>";
		}



?>

</body>
</html>