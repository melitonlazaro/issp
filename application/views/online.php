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
		<input type="text" name="procedure" required>
		<br>
	
		<br>
		Confirmation Code
		<input type="text" name="confirmation_code_user">
		<br>
		<input type="submit" value="Schedule and Appointment">
	<?php form_close(); ?>
 
	<button name="send"> Send A Code through SMS </button>

</body>
</html>
