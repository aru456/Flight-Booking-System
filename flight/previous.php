<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Form Tutorial</title>
		<link rel="stylesheet" href="login.css">
		<style>
			body {background-image: url("background.jpg");
			}
			td{
            width:250px;
			font-size:25px;
			padding:5px ;
			text-align:center;
        }
			h1   {color: black;font-family: verdana;font-size: 200%; }
			</style>
	</head>
	<body>
	</body>
</html>



<?php
session_start();
$login=$_SESSION['login'];

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="flight";
$dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
$sql="select * from ticket where login_id='".$login."'";
$result=mysqli_query($dbconn,$sql);

if(mysqli_num_rows($result)>0){
    echo "<center><h1>Previous Bookings</h1>";
    while($row=mysqli_fetch_array($result))
    {
        echo "<table><tr><td>Ticket ID</td><td>";
        echo $row["ticket_id"];
        echo "</td></tr><tr><td>Flight ID</td><td>";
        echo $row["flight_id"];
        echo "</td></tr><tr><td>Fare</td><td>";
        echo $row["fare"];
        echo "</td></tr><tr><td>Name</td><td>";
        echo $row["name"];  
        echo "</td></tr><tr><td>Gender</td><td>";
        echo $row["gender"];
        echo "</td></tr><tr><td>Phone</td><td>";
        echo $row["phone"];
        echo "</td></tr><tr><td>Email</td><td>";
        echo $row["email"]; 
        echo "</td></tr><tr><td>Date of Travel</td><td>";
        echo $row["date"]; 
        echo "</td></tr><tr><td>Date of Booking</td><td>";
        echo $row["bookeddate"];
        echo "</td></tr></table><br><br><br>";
    }
    echo "</center>";
}
else{
    echo " No previous Bookings ";
}
?>