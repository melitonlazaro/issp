<html>
<head>
	<title></title>
</head>
<body>
	<?php echo form_open('Prms/process_profiling'); ?>
		<input type="text" name="surname" placeholder="Surname"><br>
		<input type="text" name="given_name" placeholder="Given Name"><br>
		<input type="text" name="middle_initial" placeholder="Middle Initial"><br>
		<input type="text" name="occupation" placeholder="Occupation"><br>
		<input type="date" name="date_of_birth"><br>
		<input type="text" name="contact_num" placeholder="Contact Number"><br>
		<input type="text" name="street_no" placeholder="Street Number"><br>
		<input type="text" name="barangay" placeholder="Barangay"><br>
		<input type="text" name="city" placeholder="City"><br>
		<input type="text" name="emergency_contact" placeholder="Emergency Contact"><br>
		<input type="text" name="emergency_num" placeholder="Emergency Contact Number"><br>
		<input type="text" name="emergency_contact_address" placeholder="Emergency Contact Address"><br>
		<input type="submit">
	<?php echo form_close(); ?>
</body>
</html>