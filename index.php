<!DOCTYPE html>
<html>
<head>
<title> </title>
</head>
<body>

<?php


 session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
}
	
	echo file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=London&appid=9075f6a810686222cd39cc2c8ccc08f7"); 

	?>

</body>
</html>