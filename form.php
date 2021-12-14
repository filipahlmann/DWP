<?php
include_once 'header.php'
?>
<html>
<head>

<style type="text/css">
form{
  text-align: justify;
}
</style>
</head>
<body>

<!--Contact Form-->


<h3>Send mail to Owner</h3>
<?php
if (isset($mess) == 1) {
	echo "<p>Success</p>";
}else{
	echo "";
}

?>
<form class="contact-form" action="includes/contact_submit.php" method="post">
<label>Email:&nbsp;</label><input type="text" name="email"><br />
<label>Name:&nbsp;</label><input type="text" name="name"><br />
<label>Subject:&nbsp;</label><input type="text" name="subject"><br />
<label>Message:&nbsp;</label><textarea name="message"></textarea><br />
<button type="submit" name="send" vlaue="Send">Send</button>
</form>

<!--End of Contact form-->

</body>
</html>