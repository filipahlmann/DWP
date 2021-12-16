<?php include_once 'header.php'; ?>

<!--captcha-->
<?php


?>

<!--Contact Form-->
<h3>Send mail to Owner</h3>
<form class="contact-form" action="form_validation.php" method="post">
<div class="g-recaptcha" data-sitekey="6Le8LJodAAAAACekcEnAV80ogTjFMddVFu37crcT"></div>
<label>Email:&nbsp;</label><input type="text" name="email"><br />
<label>Name:&nbsp;</label><input type="text" name="name"><br />
<label>Subject:&nbsp;</label><input type="text" name="subject"><br />
<label>Message:&nbsp;</label><textarea name="message"></textarea><br />
<button type="Submit" vlaue="Send" name="Submit">Submit</button>
</form>
