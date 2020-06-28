<?php
if (!isset($_SESSION["ID"])) {
    header('Location: index.php?page=login');
};
if (isset($_POST["add"])) {
    
   
    if (isset($_SESSION["basket"])) {
        $basket=$_SESSION["basket"];
        
    } else {
        //print_r($_POST);
        $basket = [];
        //print_r($basket);  
    }
    $basket[] .= $_POST["itmid"];
    $_SESSION["basket"]=$basket;
}
//print_r($_SESSION["basket"]);
$con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
$query_select = "SELECT * FROM tblproducts";
echo "<table>";
if ($result = mysqli_query($con, $query_select)) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<form method="post">';
        echo '<tr><td><img src="Pictures/' . $row["ItmLink"] . '" width="150px" height="150px"></td><td>' . $row["itmname"] . '</td><td>' . $row["itmdescr"] . '</td><td>' . $row["itmprice"] . '€</td><td><input type="hidden" value="' . $row["ID"] . '" name="itmid"><input type="submit" value="Add to Basket" name="add"></td></tr>';
        echo '</form>';
    }
}
echo "</table>";
?>
