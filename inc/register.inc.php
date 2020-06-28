<?php
use function PHPSTORM_META\exitPoint;
if(isset($_POST["create"])){
   $usr=$_POST["uname"];
   $psw=$_POST["psw"]; 
$regquery="INSERT INTO tbluser (usrname, psw, adminstatus) VALUES ('$usr', '$psw',0)";
$con=@mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die (mysqli_connect_error());
mysqli_query($con,$regquery);
header('Location: index.php?page=login');
}
if(isset($_POST["cancel"])){
    header('Location: index.php?page=login');
}


registerForm();


?>
