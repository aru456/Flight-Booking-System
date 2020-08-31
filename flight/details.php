
<?php
session_start();
$_SESSION
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Form Tutorial</title>
		<link rel="stylesheet" href="login.css">
		<style>
			body {background-image: url("background.jpg");
			}
			h1   {color: black;font-family: verdana;font-size: 200%; }
			</style>
	</head>
	<body>
		<div class="login-form">
			<h1>FLIGHT</h1>
			<form action="homepage.php" method="POST">
                
				ORIGIN:<input type="text" name="origini" required><br>
				DESTINATION:<input type="text" name="destinationi"  required><br>
				DATE :<input type="date" name="datei" placeholder="DD/MM/YYYY" required><br>
		
			
				<input type="submit" name="addi" style="margin-top: 5px;" class="btn btn-success"
                                       value="Search" >
               
			</form>
		</div>
	</body>
</html>