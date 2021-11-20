<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    <title>Document</title>
</head>
  <div class="wrapper">  
<nav>
<div class="navi">
    <ul>


    <li><a href="index.php">Home</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="products.php">Products</a></li>



    <?php 
    if (isset($_SESSION["useruid"])) {
    echo "<li><a href='profile.php'>Orders</a></li>";
    echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
    }
    else {
    echo "<li><a href='login.php'>Log In</a></li>";
    }
    ?>  
    <?php 
    if (isset($_SESSION["useruid"])) {
    echo "<p>You Are Logged In As " . $_SESSION[ "useruid"] ."</p>";
    }
    ?> 
    </ul>
</div>
</nav>
</div>
<body>
