<?php
    $mail=$_POST['email'];
    $name=$_POST['name'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    $errors=false;
    if(isset($_POST['Submit'])) {

    if (!empty($_POST['email'])) {
        $email = trim(strip_tags($_POST['email']));

        } else {
        print '<p style="color: red;">Please submit an email.</p>'; 
        $errors = TRUE;
    }
    if (!empty($_POST['name'])) {
        $name = trim(strip_tags($_POST['name']));

        } else {
        print '<p style="color: red;">Please submit a name.</p>'; 
        $errors = TRUE;
    }
    if (!empty($_POST['subject'])) {
        $subject = trim(strip_tags($_POST['subject']));

        } else {
        print '<p style="color: red;">Please submit a subject.</p>'; 
        $errors = TRUE;
    }
    if (!empty($_POST['message'])) {
        $message = trim(strip_tags($_POST['message']));

        } else {
        print '<p style="color: red;">Please submit a message.</p>'; 
        $errors = TRUE;
    }
        
}

   