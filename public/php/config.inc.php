<?php

// USE SMTP OR mail()
// SMTP is recommended, mail() is disabled on most shared hosting servers.
// IF false : SMTP host/port/user/pass/ssl not used, leave empty or as it is!
$config['use_smtp']				= true;						// true|false

// SMTP Server Settings
$config['smtp_host'] 			= 'gator4039.hostgator.com';   // eg.: smtp.mandrillapp.com
$config['smtp_port'] 			= 465;						// eg.: 587
$config['smtp_user'] 			= 'talent@unctalent.com'; 						// you@gmail.com
$config['smtp_pass'] 			= '%@L3n%UNC';						// password
$config['smtp_ssl']				= true;					// should remain false

// Who receive all emails?
$config['send_to']				= 'talent@unctalent.com';			// destination of all emails sent throught contact form

// Email Subject
$config['subject']				= 'UNCTalent Contact Form';	// subject of emails you receive
?>