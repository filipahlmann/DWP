<?php

$serverName = "localhost";
$dBUsername = "filipsdwp_dk";
$dBPassword = "123456";
$dBname = "filipsdwp_dk";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBname);

if(!$conn) {
die ("Connection failed: " . mysqli_connect_error());
}