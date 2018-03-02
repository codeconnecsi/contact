<?php

if (isset($_POST['submit'])) {
		echo "Hi";
// Checking For Blank Fields..
	if ($_POST['email']=="") {
		echo "Fill All Fields..";
	}else {
// Check if the "Sender's Email" input field is filled out
		$email1=$_POST['email'];
// Sanitize E-mail Address
		$email1 =filter_var($email1, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
		$email1= filter_var($email1, FILTER_VALIDATE_EMAIL);

		if (!$email1) {
			echo "Invalid Sender's Email";
		}else{
			$to = 'contact@connecsi.com';
			$headers = 'From:'. $email1 . "\r\n"; // Sender's Email
			$subject = "Visitor contacted Connecsi";
			$message = "$email1 . 'is trying to reach connecsi through www.connecsi.com website'";

			$headersSender = 'From:'. $to . "\r\n"; // Sender's Email
			$subjectSender = "Thankyou for Contacting";
			$messageSender = "$to .Congratulation, You are successfully registered in our databank. We will get back to you soon with Awesome Brand Enhancement Scheme via Quantity Leads Generation";

// Send Mail By PHP Mail Function
			$mailsent = mail($to, $subject, $message, $headers);
			$mailsent = mail($email1, $subjectSender, $messageSender, $headersSender);

			if ($mailsent){
				echo "Thank you for contacting us. We will get back to you shortly.";
				header("Location: homepage.php?sent");
			} else
			echo "Server not Responding";
		}
	}
}else {
	echo "Something is wrong. Please try again later.";
}
?>
