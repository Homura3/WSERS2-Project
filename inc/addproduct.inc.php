<?php

use function PHPSTORM_META\exitPoint;


if (isset($_POST["addprod"])) {
    $proname = $_POST["proname"];
    $descr = $_POST["descr"];
    $price = $_POST["price"];
    $link = $_POST["link"];
    $con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
    $addproduct_query = "INSERT INTO tblproducts (itmname, itmdescr, itmprice, ItmLink) VALUES ('$proname', '$descr', '$price', '$link')";
    mysqli_query($con, $addproduct_query);
}
addprod();

?>
