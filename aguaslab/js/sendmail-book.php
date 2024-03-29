<?php
// Who you want to receive the emails from the form.
$sendto = 'programacion@aguaslab.co';

// The subject you'll see in your inbox
$subject = 'Mensaje de aguaslab.co';

// Message for the user when he/she doesn't fill in the form correctly.
$errormessage = 'Intentalo de nuevo a ocurrido un error.';

//Message for the user when he/she fills in the form correctly.
$thanks = "Gracias por contactarnos! te responderemos pronto.";

// Message for the bot when it fills in in at all.
$honeypot = "si eres un humano intentalo de nuevo!";

// Various messages displayed when the fields are empty.
$emptyname =  '¿Escribiste tu nombre?';
$emptyphone = '¿Escribiste tu numero?';
$emptydate = 'Entering date?';
$emptytime = 'Entering time?';

// Various messages displayed when the fields are incorrectly formatted.
$alertname =  'Entering your name using only the standard alphabet?';
$alertphone =  'Entering your phone number using only the standard characters?';
$alertdate = '';
$alerttime = '';

$alert = '';
$pass = 0;

function clean_var($variable) {
	$variable = strip_tags(stripslashes(trim(rtrim($variable))));
  return $variable;
}

// Doctor message
$message_doctor = '';
if ( !empty($_REQUEST['form-doctor']) ) {
	$message_doctor = "Doctor :" .clean_var($_REQUEST['form-doctor']) . "\n";
};

//form alert messages structure 
$ma_top = '
	<div class="message message-modal message-close">
	<button type="button" class="message-close-button"><i class="fa fa-close"></i></button>
	<div class="alert">
';
$ma_bot = '
	</div></div>
';

// required fileds data array
$required_fields = array(
	'1' => array(
		'name' => 'name',
		'empty' => $emptyname,
		'alert' => $alertname,
		),
	'2' => array(
		'name' => 'phone',
		'empty' => $emptyphone,
		'alert' => $alertphone,
		),
	
);

if ( empty($_REQUEST['last']) ) {
	
	foreach($required_fields as $rf){
		if ( empty($_REQUEST[''.$rf['name'].'']) ) {
			$pass = 1;
			$alert .= "<div class='message-item-list'>" . $rf['empty'] . "</div>";
		  } elseif ( preg_match( "/[][{}()*+?.\\^$|]/", $_REQUEST[''.$rf['name'].''] ) ) {
			$pass = 1;
			$alert .= "<div class='message-item-list'>" . $rf['alert'] . "</div>";
		  }
	};

  if ( $pass==1 ) {
	echo '
		<div class="message message-close message-error">
			<button type="button" class="message-close-button"><i class="fa fa-close"></i></button>
			<div class="alert alert-danger">'.$errormessage.$alert.'</div>
		</div>
	';
  
  } elseif (isset($_REQUEST['message'])) {

	$message = "From: " . clean_var($_REQUEST['name']) . "\n";
	$message .= "Phone: " . clean_var($_REQUEST['phone']) . "\n";
	$message .= "Email: " . clean_var($_REQUEST['email']) . "\n";
	$message .= "Date: " .clean_var($_REQUEST['date']) . "\n"; 
	$message .= "Time: " .clean_var($_REQUEST['time']) . "\n";
	$message .= $message_doctor;
	$message .= "Message: \n" . clean_var($_REQUEST['message']);
	$header = 'From:'. clean_var($_REQUEST['email']);

	mail($sendto, $subject, $message, $header);
	echo '
		<div class="message message-close message-success">
			<button type="button" class="message-close-button"><i class="fa fa-close"></i></button>
			<div class="alert alert-success">'.$thanks.'</div>
		</div>
	';
	die();
	echo $message;
	}

} else {
	/* echo $honeypot; */
	echo '
		<div class="message message-close message-error">
			<button type="button" class="message-close-button"><i class="fa fa-close"></i></button>
			<div class="alert alert-danger">'.$honeypot.'</div>
		</div>
	';
}
?>