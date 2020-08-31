<?php
    
    $database_name = "flight";
    $con = mysqli_connect("localhost","root","",$database_name);
    if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
session_start();
    $var=$_POST['origini'];
    $set=$_POST['destinationi'];
    $k=$_POST['datei'];
    $_SESSION['date']=$k;
    $_SESSION['origin']=$var;
    $_SESSION['destination']=$set;
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FLIGHT</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
        div.a{
            text-align: left;
        }
    </style>
</head>
<body >

    <div class="container" style="width: 100%">
    <form method="POST" action="user.php">
        <h2>HOME PAGE </h2>
        <?php
            $query = "SELECT * FROM plane where origin ='$var' and destination = '$set' ORDER BY departure_time ASC ";
            $result = mysqli_query($con,$query);
            if($k<date("Y-m-d"))
            {
                echo "<h2>Enter a valid date</h2>";
            }
            else
            {
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    
                    ?>
                    <div class="col-md-8">

                        <form method="POST" action="user.php">
                        
                            <div class="product">
                                <h5 class="text-info">FLIGHT_NO:<?php echo $row["flight_id"]; ?></h5>
                                <h5 class="text-danger">PRICE:<?php echo $row["fare"]; ?></h5>
                                <h5 class="text-danger">DEPARTURE TIME:<?php echo $row["departure_time"]; ?></h5>
                                <h5 class="text-danger"> ARRIVAL TIME:<?php echo $row["arrival_time"]; ?></h5>
                                <h5 class="text-danger">DURATION:<?php echo $row["duration"]; ?></h5>
                               
                                <input type="hidden" name="fid" value="<?php echo $row["flight_id"]; ?>">
                                <input type="hidden" name="fare" value="<?php echo $row["fare"]; ?>">
                                <input type="hidden" name="dpt" value="<?php echo $row["departure_time"]; ?>">
                                <input type="hidden" name="arrt" value="<?php echo $row["arrival_time"]; ?>">
                                <input type="hidden" name="dur" value="<?php echo $row["duration"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="BOOK" >
                                 
                            
                            </div>
                           
                        </form>
                    </div>
                    <?php
                }
               
            }
            else 
            {
                echo "<h2>Sorry No flights Available</h2>";
            }
        }
            
        ?>
    
    </form>   
</body>
</html>
<?php
  

