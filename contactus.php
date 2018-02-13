<?php
// Include header
include("includes/header.php");
// Message Vars
$msg = '';
$msgClass = '';

// Check For the Submit
if (filter_has_var(INPUT_POST, 'submit')) {
	// GEt Form data
	$fullname = $_POST['fullname'];
	$collegename = $_POST['collegename'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	//Check Required Fields
	if(!empty($fullname) && !empty($collegename) && !empty($email) && !empty($message) ){
		// Passed
		// Check Email
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			//Failed
			$msg = 'Please Enter Valid EmailID';
			// alert-danger class for ui develp.
			$msgClass = 'alert-danger';
		}else{
			// Passed
			// Recipient Email
			$toEmail = 'mhashilkar.suru97@gmail.com';
			$subject = 'Contact Request From'.$fullname;
			$body = '<h2>Contact Request</h2>
				<h4>FullName</h4><p>'.$fullname.'</p>
				<h4>CollageName</h4><p>'.$collegename.'</p>
				<h4>EmailId</h4><p>'.$email.'</p>
				<h4>Message</h4><p>'.$message.'</p>';
			// Email Headers
			$headers = "MINE-Version: 1.0" ."\r\n";
			$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
			// Additional Headers
			$headers .="From: ".$fullname."<".$email.">". "\r\n";
			if(mail($toEmail, $subject, $body, $headers))
			{
				// Email Sent
				$msg = 'You Email Has Been Sent';
				// alert-danger class for ui develp.
				$msgClass = 'alert-sucess';
			}
			else
			{
				// Failed
				$msg = 'Your Email Is Not Sent';
				// alert-danger class for ui develp.
				$msgClass = 'alert-danger';
			}
		}
	}else{
		// Failed
		$msg = 'Please Fill In All Fields';
		// alert-danger class for ui develp.
		$msgClass = 'alert-danger';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/contactus.css">
</head>
<body>
	<!-- Contact Form -->
<div class="container">
<form method="POST">	
	<fieldset>
		<!-- Form Name -->
		<legend><h2>Contact Us</h2></legend>

			<!-- Show error if field are not field -->
	<?php if($msg != ''): ?>
		<div class="alert-danger <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
	<?php endif; ?>
	
			<!-- Text input-->
			<label >Full Name</label>  
			<input name="fullname" type="text" maxlength="8" class="input"> <br>
			
			<!-- Text input-->
			<label >College Name</label>  
			<input name="collegename" type="text" maxlength="8" class="input"> <br>
			
			<!-- Text input-->
			<label for="">Email</label>  
			<input name="email" type="text"> <br>
			 
			<!-- Text input-->
			<label >Message</label>  
			<input name="message" type="text" cols="30" rows="8" class="input"> <b
			
			<!-- Button -->
			<button name="submit" class="button" type="submit" >Submit</button>			
	</fieldset>
</form>
</div>
<br><br>

<!-- Contact Info-->
<div class="container">
		<fieldset>
			<p><center><h1>Contact Info<hr /></h1></center></p>
            <ul class="list-unstyled">
                <li>+353-44-55-66</li>
                <li>info@example.com</li>
                <li>http://www.example.com</li>
            </ul>
            <ul class="list-unstyled">
                <li>Monday-Friday: 9am to 6pm</li>
                <li>Saturday: 10am to 3pm</li>
                <li>Sunday: Closed</li>
           </ul>
		</fieldset>
        </div>
    </div>
</div>

</body>
</html>

<?php
// Include Footer
include("includes/footer.php");
?>