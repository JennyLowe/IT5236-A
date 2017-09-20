<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	
    $username = "user";
	$password = "password"; 
	
	if ( $_POST['username'] == "user" && $_POST['password'] == "password"){

	session_start();
	$_SESSION['user'] = '';
	header("location: index.php");
		}	else{
   echo 'Incorrect Username or Password';
                             displayForm('','');

 
}
}
else {
	displayForm("","");
}
    function displayForm($username, $password){

?>

<form method= "post" action="login.php"> 

     Username <input type ="text" name="username"/><br/>
     Password <input type="password" name="password" /><br/>
     <input type="submit" name="submit" value="submit" />

</form>
<?php

    }
	
	?>
