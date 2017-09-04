<html>
<head>
	<title>Maternity Clinic Management System</title>
</head>
<body>

	<form action="Main/login" method="POST">
		<input type="text" name="username" placeholder="Username"><br>
		<input type="password" name="password" placeholder="Password">
		<input type="submit" value="login">


	</form>


	<br><br><br>
	<form action="Main/logout" method="POST">
		<input type="submit" value="Logout">

	</form>


<?php

	if(isset($_POST["send"]))
	{
		include "smsGateway.php";
		$smsGateway = new SmsGateway('melitonlazaro1@gmail.com', '09153864099');

		$number = $_POST["number"];
		$message = $_POST["message"];
	
		$number_code = mt_rand(10000, 99999);
		$deviceID = 56400;
		$number = '+639758769951';
		$message = $number_code;

		$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);	
	}
?>

<br><br><br>
	<form method="POST">
		<input type="text" name="number">
		<br>
		<textarea cols="10" rows="10" name="message"></textarea>
		<br>
		<input type="submit" name="send" value="Send">

	</form>
</body>
</html>