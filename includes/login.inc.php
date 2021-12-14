<?php

if(isset($_POST["submit"])) 
{
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../class/dbh.classes.php";
    include "../class/login.classes.php";
    include "../class/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd); 

    $login->loginUser();

    header("location: ../index.php?error=none");
}