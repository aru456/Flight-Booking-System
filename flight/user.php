<?php
session_start();
    $database_name = "flight";
    $con = mysqli_connect("localhost","root","",$database_name);
    $fid=$_POST['fid'];
    $fare=$_POST['fare'];
    $dep=$_POST['dpt'];
    $arr=$_POST['arrt'];
	$dur=$_POST['dur'];
	$_SESSION['fid']=$fid;
    $_SESSION['fare']=$fare;
    $_SESSION['dpt']=$dep;
    $_SESSION['arr']=$arr;
	$_SESSION['dur']=$dur;
	$origin=$_SESSION['origin'];
	$destination=$_SESSION['destination'];
	// echo"<p>Duration : $dur Hrs</p>";
    


?>
<!DOCTYPE html>
<html>
		<head>
				<style>
				body {background-image: url("background.jpg");
				}
				td{
            width:300px;
			font-size:25px;
			padding:5px ;
			text-align:center;
		}
		td.a{
			width:200px;
			font-size:20px;
			padding:2px ;
		}
				h1   {color: black;font-family: verdana;font-size: 200%; }
				</style>
				</head>
	<head>
		<meta charset="utf-8">
		<title>Traveller details</title>
		<link rel="stylesheet" href="login.css">
	</head>
	<body>
		<div class="login-form"><center>
		<h1>Traveller Details</h1>
		
		<h2>Your Flight Details:</h2>
			<table>
					<tr><td class ="a">Flight ID</td><td class ="a"><?php echo $fid ?></td></tr>
					<tr><td class ="a">From</td><td class ="a"><?php echo $origin ?></td></tr>
					<tr><td class ="a">To</td><td class ="a"><?php echo $destination ?></td></tr>
					<tr><td class ="a">Departure Time</td><td class ="a"><?php echo $dep ?></td></tr>
					<tr><td class ="a">Arrival Time</td><td class ="a"><?php echo $arr ?></td></tr>
					<tr><td class ="a">Travel Duration</td><td class ="a"><?php echo $dur ?></td></tr>
				</table>
				<table>
			<form action="ticket.php" method="POST">
				<td>Name:</td><td>
				<input type="text" name="fname" ></td></tr>
				<tr><td>Gender :</td><td> <input type="radio" name="gender" value="male" checked> Male
  				<input type="radio" name="gender" value="female"> Female
  				<input type="radio" name="gender" value="other"> Others</td><tr>
				<td>E-Mail :</td><td>
				<input type="email" name="email" required></td><tr><td>
				Phone no:</td><td>
				<input type="text" name="phone" maxlength="10" required></td><tr>
					<td colspan="2">
				<input type="submit" name="add" style="margin-top: 10px;" class="btn btn-success"
                                       value="Proceed to payment" ></td></tr>
               
			</form>
	</table>
	</center>
		</div>
	</body>
</html>
