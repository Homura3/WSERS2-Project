<?php
if (!isset($_SESSION["ID"])) {
    header('Location: index.php?page=login');
};
if(isset($_POST["deleteitm"])){
    $con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
    $itmID= $_POST["itmID"];
    $itmdeletequery="DELETE FROM tblproducts WHERE ID=$itmID";
    mysqli_query($con,$itmdeletequery);
}
if (isset($_POST["add"])) {
    
   
    if (isset($_SESSION["basket"])) {
        $basket=$_SESSION["basket"];
        
    } else {
        
        $basket = [];
        
    }
    $basket[] .= $_POST["itmID"];
    $_SESSION["basket"]=$basket;
}

$con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
$query_select = "SELECT * FROM tblproducts";
echo "<table>";
if ($result = mysqli_query($con, $query_select)) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<form method="post">';
        echo '<tr><td><img src="Pictures/' . $row["ItmLink"] . '" width="150px" height="150px"></td><td>' . $row["itmname"] . '</td><td>' . $row["itmdescr"] . '</td><td>' . $row["itmprice"] . '€</td><td><input type="hidden" name= "itmID" value="' . $row["ID"] . '" ><input type="submit" value="Add to Basket" name="add"><input type="submit" name="deleteitm" value="Delete Product"></td></tr>';
        echo '</form>';
    }
}
echo "</table>";
?>