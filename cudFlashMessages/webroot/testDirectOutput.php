<?php

//include "../src/Rss/CudRssController.php";

namespace Cuddles\CudFlashMessages;


require '../src/FlashMessages/FlashMessages.php';

 $flashError   = new FlashMessages(); 
 /*$flashSuccess = new FlashMessagesController();
 $flashWarning = new FlashMessagesController(); 
 $flashNotice  = new FlashMessagesController();*/



//$flashError->error(['message' => 'Error Message', 'classes' => ['specialError', 'specialError2']]);

$flashError->setMessages(
 	[
 		'error'   => ['message' => 'Error Message', 'classes' => ['specialError', 'specialError2']],
 		'success' => ['message' => 'Success Message', 'classes' => ['specialSuccess', 'specialSuccess2']],
 	]

);

 $flashError->storeInSession('error');

 $newURL = 'outputView.php';

 //header('Location: '.$newURL);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<?php

$flashError->output('error');
$flashError->output('success');




 /*$CudRss->output();
 $CudRss->welcome();*/



//$hej = new CudRssController();


