<?php
if (!isset($_SESSION["ID"])) {
    header('Location: index.php?page=login');
};


if (isset($_SESSION["basket"])) {
    $basket = $_SESSION["basket"];
    $total = 0;
    if(isset($_POST["deleteord"])){
        $key= $_POST["itmkey"];
        unset($basket[$key]);
        $_SESSION["basket"]=$basket;
    }
    if (isset($_POST["order"])) {
        $seshID = $_SESSION["ID"];
        $time = time();
        $time = date("Y-m-d H:i:s", $time);
        $con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
        foreach ($basket as $value) {
            $query_insert = "INSERT INTO tblorders VALUES($seshID, $value, '$time')";
            mysqli_query($con, $query_insert);
            
        }
        unset($_SESSION["basket"]);
        echo "Your Order has Been Complete, you will be redirected immediately!";
        header("Refresh:2; url=index.php?page=basket");
        
    }
    echo '<form method="post">';
    echo "<table border='1'>";
    foreach ($basket as $key => $value) {
        $con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
        $query_select = "SELECT * FROM tblproducts WHERE ID = $value";

        if ($result = mysqli_query($con, $query_select)) {
            
            while ($row = mysqli_fetch_assoc($result)) {
            
                echo '<form method="post">';
                echo '<tr><td><img src="Pictures/' . $row["ItmLink"] . '" width="150px" height="150px"></td><td>' . $row["itmname"] . '</td><td>' . $row["itmprice"] . '€</td><td><input type="hidden" name= "itmkey" value="' . $key . '" ><input type="submit" name="deleteord" value="Delete Product from Basket"></td></tr>';
                $total += $row["itmprice"];
                echo '</form>';
            }
        }
    }
    echo "<tr><td colspan='2'>Total:</td><td>" . $total . "€</td></tr>";
    echo "</table>";
    echo "<input type='submit' value= 'Order' name= 'order'>";
    echo '</form>';
} else {
    echo "No items in basket!";
}
