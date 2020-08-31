<?php
$NAME=filter_input(INPUT_POST,'username');
$PASSWORD = filter_input(INPUT_POST, 'password');
$email=filter_input(INPUT_POST,'emailaddress');
$ADDRESS=filter_input(INPUT_POST,'address');
$dob=filter_input(INPUT_POST,'bday');
$PHONE_NO=filter_input(INPUT_POST,'phoneno');
$GENDER=filter_input(INPUT_POST,'gender');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "flight";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO login (email,password,dob,phone_no,name)
values ('$email','$PASSWORD','$dob','$PHONE_NO','$NAME')";
if ($conn->query($sql)){
    echo ' <script>window.location="log_in.html"</script>';
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}

?>
