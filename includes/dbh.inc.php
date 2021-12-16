<?php

$serverName = "filipsdwp.dk.mysql";
$dBUsername = "filipsdwp_dk";
$dBPassword = "ynj35ksw";
$dBname = "filipsdwp_dk";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBname);

if(!$conn) {
die ("Connection failed: " . mysqli_connect_error());
}