<?php

session_start();

require_once("inc/db_params.inc.php");
require_once("inc/functions.inc.php");

if (isset($_SESSION["ID"])) {
  $con = @mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_connect_error());
  $conID = $_SESSION["ID"];
  $selectquery = "SELECT * FROM tbluser WHERE ID = $conID";
  if ($result = mysqli_query($con, $selectquery)) {
    $row = mysqli_fetch_assoc($result);
    $admincheck = $row["adminstatus"];
    if ($admincheck == 1) {
      $allowedPages = array("about","shousers","showorders", "addproduct", "productsad", "basket", "logoff", "login", "register");
      $pageNames = array("About","List of USERS", "ORDERS", "ADD Product", "Products", "Basket", "Log Out");
    } else {
      $allowedPages = array("about", "products", "basket", "logoff", "login", "register");
      $pageNames = array("About", "Products", "Basket", "Log Out");
    }
  }
} else {
  $allowedPages = array("about", "products", "basket", "logoff", "login", "register");
  $pageNames = array("About", "Products", "Basket", "Log Out");
}

if (isset($_GET["page"])) {

  if (in_array($_GET["page"], $allowedPages)) {
    $page = $_GET["page"];
  } else {
    $page = "404";
  }
} else {

  if (!isset($_SESSION["ID"])) {
    $page = "login";
  } else {
    $page = "about";
  }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>2TPIFE-E</title>
  <link rel="stylesheet" type="text/css" href="css/grid-style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div id="wrapper">
    <div id="header">
      <?php
      include_once "inc/header.inc.php";
      ?>
    </div>
    <div id="menu">
      <ul>
        <?php
        foreach ($pageNames as $i => $pagename) {
          echo "<li " . ($allowedPages[$i] == $page ? "class='active'" : "") . ">";
          echo   "<a href='?page=$allowedPages[$i]'>" . $pagename . "</a>";
          echo "</li>";
        }
        ?>
      </ul>
    </div>
    <div id="content">
      <?php
      include_once "inc/" . $page . ".inc.php";
      ?>
    </div>
    <div id="footer">
      <?php
      include_once "inc/footer.inc.php";
      ?>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>