<?php namespace Cuddles\CudFlashMessages;

require '../src/FlashMessages/FlashMessagesController.php';
session_start();


 //$CudFlashmessage = new FlashMessagesController(); 

	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
	$CudFlashmessage = $_SESSION['flash_message'];
	echo $CudFlashmessage;
