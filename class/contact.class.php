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
		$contents = "
		From: $from<br />
		Name: $name<br />
		Subject: $subject<br />
		Message: $message";

		$headers = "From:" . $from;

		mail($this->sendTo, $this->subject, $this->message, $headers);

		return true;
	}

	function redirect($path)
	{
		header("Location: $path");
	}
}
?>