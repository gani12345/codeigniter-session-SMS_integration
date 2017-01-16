<?php
	/**
	* 
	*/
	class Sms 
	{
		
		function __construct()
		{
			# code...
		}
		public function create_sms($message,$numbers){
	// Authorisation details.
			$username = "innologiq@gmail.com";
			$hash = "51b26ec40fa54ad23e743fee99afe15bb6dabaae";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
			$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	// $numbers = "910000000000"; // A single number or a comma-seperated list of numbers
	
	// $message = "This is a test message from the PHP API script.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://www.sendsms.innologiq.com/api2/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
}
}
?>