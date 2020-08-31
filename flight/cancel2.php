
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

<?php

session_start();

$login=$_SESSION['login'];
$ticket=$_POST['tid'];
$cancel=$_POST['Cancel'];
if($cancel=="Cancel")
{
    
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="flight";
$dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
$sql="DELETE FROM ticket where ticket_id=?";
$stmt=$dbconn->prepare($sql);
$stmt->bind_param('s', $ticket);
$stmt->execute();
$stmt->close();
echo "<center><h2>Ticket cancelled successfully</h2></center>";
$query = "SELECT refund FROM cancellations where ticket_id='".$ticket."' ";
$result = mysqli_query($dbconn,$query);
if(mysqli_num_rows($result) > 0) {

	while ($row = mysqli_fetch_array($result)) {
		echo "<h2>";
		echo $row["refund"];
		echo " Rs refunded</h2>";
	}
	}   
// $sql="DELETE FROM ticket where ticket_id=?";
// $stmt=$dbconn->prepare($sql);
// $stmt->bind_param('s', $ticket);
// $stmt->execute();
// $stmt->close();
}
else 
{
    echo "<center><h1>No cancellation Performed<h1></center>";
}
?>
</html>