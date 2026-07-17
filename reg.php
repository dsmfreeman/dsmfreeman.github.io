<html>
<head><title>Workshop Registration</title></head>
<body>
<?php

/* All form fields are automatically passed to the PHP script through the array $HTTP_POST_VARS. */


$to = "dfreeman@math.leidenuniv.nl";
$from = $HTTP_POST_VARS['email'];
$name1 = $HTTP_POST_VARS['Firstname']; 
$name2 = $HTTP_POST_VARS['Lastname']; 
$headers = "From: $name1 $name2\nSender: $from"; 
$subject = "Workshop Registration"; 

$fields = array(); 
$fields{"Lastname"} = "Lastname"; 
$fields{"Firstname"} = "Firstname"; 
$fields{"Gender"} = "Gender"; 
$fields{"ProfStatus"} = "ProfStatus"; 
$fields{"Institute"} = "Institute"; 
$fields{"Address"} = "Address"; 
$fields{"ZipCode"} = "ZipCode"; 
$fields{"City"} = "City"; 
$fields{"Country"} = "Country"; 
$fields{"telnr"} = "telnr"; 
$fields{"email"} = "email"; 
$fields{"homepage"} = "homepage"; 
$fields{"requests"} = "requests"; 

$body = "We have received the following information:\n\n"; foreach($fields as $a => $b){ $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); } 

$headers2 = "From: Workshop Registration <dfreeman@cs.stanford.edu>"; 
$subject2 = "Registration confirmation"; 
$autoreply = "You have registered for the workshop Public Key Cryptography and the Geometry of Numbers.  We look forward to seeing you in Amsterdam in May. \n\n--Ronald Cramer and David Freeman";

/* PHP form validation: the script checks that the Email field contains a valid email address and the Subject field isn't empty. preg_match performs a regular expression match. It's a very powerful PHP function to validate form fields and other strings - see PHP manual for details. */

/* Sends the mail and outputs the "Thank you" string if the mail is successfully sent, or the error string otherwise. */
/* else { */
	$send = mail($to, $subject, $body, $headers); 
	$send2 = mail($from, $subject2, $autoreply, $headers2); 
	if($send) {
		echo "Thank you for registering.  You should receive a confirmation email shortly.<br>";
		echo "<a href='workshop.html'>Workshop home page</a>";
	} 
	else 
		{echo "We encountered an error sending your mail.  Please try again."; 		echo "<a href='workshop.html'>Workshop home page</a>";
} 
/* } */

?>
</body>
</html>