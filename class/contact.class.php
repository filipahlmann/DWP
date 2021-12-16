<?php

class ContactSubmit
{
  public $sendTo;
	public $from;
	public $name;
	public $subject;
	public $message;

	function sendMail()
	{
		/*don't edit this an less you know what you are doing and how PHP OOP works*/
		//Content that u wil see in the main body of the email
		$contents = "
		From: $from<br />
		Name: $name<br />
		Subject: $subject<br />
		Message: $message";

		//setting Email headers
		$headers = "From:" . $from;

		//PHP Mail method to send email
		mail($this->sendTo, $this->subject, $this->message, $headers);

		//Return true if the mail was sent successfully.
		return true;
	}

	function redirect($path)//Redirect class for after the mail is sent.
	{
		//Telling the browser where to go.
		header("Location: $path");
	}
}
?>