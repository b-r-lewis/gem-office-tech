<?php

if ($_POST) {

	// Keys:
	// foreach ($_POST as $key => $value) {
	// 	echo "$key => $value<br/>";
	// }
	//
	// form-type >>> email to
	// name >>> name
	// company >>> company
	// phone >>> phone
	// email >>> email from
	// subject >>> subject
	// message >>> message
	// account >>> account
	// order >>> order = message


	$form_type = trim(stripslashes($_POST['form-type']));

	$email_from = trim(stripslashes($_POST['email']));

	$email_to = "From: ";
	switch ($form_type) {
		case "contact":
			$email_to .= "<support@gemofficetech.com>";
			break;
		case "order":
			$email_to .= "<service@gemofficetech.com>";
			break;
		case "request":
			$email_to .= "<service@gemofficetech.com>";
			break;
		default:
			$email_to .= "<support@gemofficetech.com>";
			break;
	}


	$name =    trim(stripslashes($_POST['name']));
	$company = trim(stripslashes($_POST['company']));
	$phone =   trim(stripslashes($_POST['phone']));
	$message = trim(stripslashes($_POST['message']));
	$account = trim(stripslashes($_POST['account']));
	$order =   trim(stripslashes($_POST['order']));


	$subject = trim(stripslashes($_POST['subject']));
	if ("" == $subject) {
		// if it's empty, add form-type so we know where it came from
		switch ($form_type) {
			case "contact":
				$subject = "New Message from $name at $company";
				break;
			case "order":
				$subject = "Order Request from $company";
				break;
			case "request":
				$subject = "Service Request from $company";
				break;
			default:
				$subject = "Support Requested";
				break;
		}
	}


	// validation?

	// prepare email body
	$body = "";
	$body .= ("" == $name) ? "" : "Name: $name\n";
	$body .= ("" == $company) ? "" : "Company: $company\n";
	$body .= ("" == $phone) ? "" : "Tel: $phone\n";
	$body .= ("" == $email_from) ? "" : "Email: $email_from\n";
	$body .= ("" == $account) ? "" : "Account Number: $account\n";
	$body .= "\n";
	$body .= ("" == $message) ? "" : "Message:\n\n$message\n\n";
	$body .= ("" == $order) ? "" : "Order:\n\n$order\n\n";
	$body .= "Message generated and sent by gemofficetech.com";

	// send mail
	$headers = ("" == $email_from) ? "From: <support@gemofficetech.com>" : "From: <$email_from>";
	$success = mail($email_to, $subject, $body, $headers);

	// echo out success or failure for now
	if ($success) {
		// echo "mail sent successfully.";
		// header("Location: about.html");
	} else {
		// echo "error sending mail.";
		// header("Location: products.html");
	}

	switch ($form_type) {
		case "contact":
			header("Location: contact.html");
			break;
		case "order":
			header("Location: order-supplies.html");
			break;
		case "request":
			header("Location: request-service.html");
			break;
		default:
			header("Location: contact.html");
			break;
	}

} else {

	//redirct to contact page if they came here from somewhere else
	header("Location: contact.html");

}

exit;

?>