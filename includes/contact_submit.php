<?php

include "class/contact.class.php";


$email = new ContactSubmit();

$email->from = $_POST['email'];
$email->sendTo = "filipahlmann@filipsdwp.dk";
$email->name = $_POST['name'];
$email->subject = $_POST['subject'];
$email->message = "
From: ". $_POST['email'] . "
Name: " . $_POST['name'] . "
Subject: " . $_POST['subject'] . "
Message: " . $_POST['message'] . "
";

//SendMail
$email->sendMail();

//Redirect
$email->redirect("form.php");

