<html>
<head>
	<title>Online Appointment</title>
</head>
<body>
	

	<?php echo form_open('Main/online_appointment'); ?>
		name
		<input type="text" name="name" required>
		<br>
		surname
		<input type="text" name="surname" required>
		<br>
		address
		<input type="text" name="address" required>
		<br>
		date
		<input type="date" name="date" required>
		<br>
		time
		<input type="text" name="time" required>
		<br>
		Contact Number
		<input type="text" name="contact_number" value="+63" required>
		<br>
		Procedure
		<select>
			<option>Prenatal</option>
			<option>Postnatal</option>
			<option>Laboratory</option>
		</select>
		<br>
		<br>
		<input type="submit" value="Schedule and Appointment">
	</form>
 

<br><br><br>
<?php

	if(isset($_POST["send"]))
	{
		include "smsGateway.php";
		$smsGateway = new SmsGateway('melitonlazaro1@gmail.com', '09153864099');

		$number = $_POST["number"];
		$message = $_POST["message"];
	
		$number_code = mt_rand(10000, 99999);
		$deviceID = 56400;
		$number = '+639225824215';
		$message = 'Your Number Code is: '.$number_code.'. Please input this to the Number Code Textbox.';

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
