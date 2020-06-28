<?php

use function PHPSTORM_META\exitPoint;

if (isset($_POST["showorder"])) {
    $con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
    $showquery = "SELECT * FROM tblorders INNER JOIN tbluser ON tbluser.ID = tblorders.FIUser INNER JOIN tblproducts ON tblproducts.ID = tblorders.FIitem";
    echo "<table border='1'>";
    echo "<tr><th>Username</th><th>Productname</th><th>Timestamp</th></tr>";
    if ($result = mysqli_query($con, $showquery)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["usrname"]."</td><td>".$row["itmname"]."</td><td>".$row["TimeStamp"]."</td></tr>";
        }
    }
    echo "</table>";
}

showorder();
