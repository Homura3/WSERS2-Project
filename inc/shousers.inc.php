<?php

use function PHPSTORM_META\exitPoint;
if(isset($_POST["delete"])){
    $con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
    $usrID= $_POST["usrID"];
    $delete_query= "DELETE FROM tbluser WHERE ID=$usrID";
    mysqli_query($con,$delete_query);
}
if (isset($_POST["showusers"])) {
    $con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
    $showquery = "SELECT * FROM tbluser";
   
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Username</th><th></th></tr>";
    if ($result = mysqli_query($con, $showquery)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<form method='post'>";
            echo "<tr><td>".$row["ID"]."</td><td>".$row["usrname"]."</td><td><input type='hidden' name='usrID' value='".$row["ID"]."'><input type='submit' name='delete' value='Delete User'></td></tr>";
            echo "</form>";
        }
    }
    echo "</table>";

}
showuser()
?>