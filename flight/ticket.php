<?php
$name=$_POST['fname'];
$gender=$_POST['gender'];
$email1=$_POST['email'];
$phone=$_POST['phone'];
session_start();
$fid=$_SESSION['fid'];
$fare=$_SESSION['fare'];
$dpt=$_SESSION['dpt'];
$arr=$_SESSION['arr'];
$dur=$_SESSION['dur'];
$login=$_SESSION['login'];
$date=$_SESSION['date'];

$origin=$_SESSION['origin'];
$destination=$_SESSION['destination'];


$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="flight";
$dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
$sql="INSERT into ticket (flight_id,login_id,fare,name,gender,phone,email,date) values (?,?,?,?,?,?,?,?)";
$stmt=$dbconn->prepare($sql);
$stmt->bind_param('ssssssss', $fid, $login, $fare, $name,$gender,$phone,$email1,$date);
$stmt->execute();
$stmt->close();
// $sql1="UPDATE plane set available=available-1 where flight_id=?";
// $stmt=$dbconn->prepare($sql1);
// $stmt->bind_param('s', $fid);
// $stmt->execute();
// $stmt->close();
$dbconn->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ticket</title>
		<link rel="stylesheet" href="login.css">
		<style>
        td{
            width:200px;
            font-size:25px;
        }
			body {background-image: url("background.jpg");
			}
			h1   {color: black;font-family: verdana;font-size: 200%; }
			</style>
	</head>
	<body>
    <center>
		<div class="login-form">
			<h1>TICKET</h1>
			<table>
                <tr>
                <td >Name :</td>
                <td ><?php echo $name;?></td>
                </tr>
                <tr>
                <td >Flight ID :</td>
                <td ><?php echo $fid;?></td>
                </tr>
                <tr>
                <td >From :</td>
                <td ><?php echo $origin;?></td>
                </tr>
                <tr>
                <td >To:</td>
                <td ><?php echo $destination;?></td>
                </tr>
                <tr>
                <td >Gender :</td>
                <td ><?php echo $gender;?></td>
                </tr>
                <tr>
                <td>Phone number :</td>
                <td ><?php echo $phone;?></td>
                </tr>
                <tr>
                <td >Email Id :</td>
                <td ><?php echo $email1;?></td>
                </tr>
                <tr>
                <td >Total Fare :</td>
                <td><?php echo $fare;?></td>
                </tr>
			</table>
            <h2>Happy journey!</h2>
		</div>
        </center>
	</body>
</html>