<?php include_once 'header.php'; ?>

<!--captcha-->
<?php
if (isset($_POST['submit'])){
		$secret = "6Le8LJodAAAAALwDXM-2Sp_boTNZDG5Y-drd2qQc";
			$response = $_POST["g-recaptcha-response"];
			$remoteip = $_SERVER['REMOTE_ADDR'];
			$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remotetip=$remoteip";
			$data = file_get_contents($url);
			$row = json_decode($data, true);
			
    if ($row['success'] == "true") {
        echo'success';
    } else {
        echo 'please fill out the recaptcha';
    }
}
?>

<!--Contact Form-->
<h3>Send mail to Owner</h3>
<form class="contact-form" action="includes/contact_submit.php" method="post">
<div class="g-recaptcha" data-sitekey="6Le8LJodAAAAACekcEnAV80ogTjFMddVFu37crcT"></div>
<label>Email:&nbsp;</label><input type="text" name="email"><br />
<label>Name:&nbsp;</label><input type="text" name="name"><br />
<label>Subject:&nbsp;</label><input type="text" name="subject"><br />
<label>Message:&nbsp;</label><textarea name="message"></textarea><br />
<button type="submit" vlaue="Send" name="submit">Submit</button>
</form>
