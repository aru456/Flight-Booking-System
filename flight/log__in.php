
<?php
session_start();
    $database_name = "flight";
    $con = mysqli_connect("localhost","root","",$database_name);
    $login;
if(isset($_POST['ad'])&&isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $_SESSION['uname']=$uname;
    $sqli="select * from login where email='".$uname."'AND password='".$password."' limit 1";
    $resultii=mysqli_query($con,$sqli);
    $sql1="select login_id from login where email='".$uname."'";
    
    $resulti=mysqli_query($con,$sql1);
    if(mysqli_num_rows($resulti)==1){
        while($ko=mysqli_fetch_array($resulti))
        {
            $login= $ko["login_id"];
        }
      
    }
    $_SESSION['login']=$login;
    if(mysqli_num_rows($resultii)==1){
      echo ' <script>window.location="details.html"</script>';
        
    }
    else{
        echo " You Have Entered Incorrect Password";
     echo ' <script>window.location="log_in.html"</script>';
    }
        
}
if(isset($_POST['cartad'])){
    echo '<script>window.location="sign_up.html"</script>';
}
?>
