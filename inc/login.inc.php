<?php

use function PHPSTORM_META\exitPoint;
if(isset($_POST["register"])){
    header('Location: index.php?page=register');
};
if (isset($_POST["submit"])){
    $username=$_POST["uname"];
    $pwd=$_POST["psw"];


    $con=@mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die (mysqli_connect_error());
    $query="SELECT ID FROM tbluser WHERE usrname = '$username' AND psw = '$pwd'";

    if($result=mysqli_query($con,$query)){
        $numrows=mysqli_num_rows($result);
        if($numrows==0){
            showLoginForm();
            echo "This User does not exist!";
        }
        else{
            $row=mysqli_fetch_assoc($result);
            $id=$row["ID"];
            $_SESSION["ID"]=$id;
            header('Location: index.php?page=about');
        }
    }
    else{
        mysqli_error($con);
        exit;
    }
}
else{
    showLoginForm();
};
