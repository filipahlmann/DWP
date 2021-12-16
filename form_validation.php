<?php
    $errors=false;
    if(isset($_POST['Submit'])) {

         $secret = "6Le8LJodAAAAALwDXM-2Sp_boTNZDG5Y-drd2qQc";
            $response = $_POST["g-recaptcha-response"];
            $remoteip = $_SERVER['REMOTE_ADDR'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remotetip=$remoteip";
            $data = file_get_contents($url);
            $row = json_decode($data, true);
                
        if ($row['success'] == "true") {
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
            if (!$errors) {
                include 'includes/contact_submit.php';
            }
           
        } else {
            echo 'please fill out the recaptcha';
        }
   

    
        
}

   