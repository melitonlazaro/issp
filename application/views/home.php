<html>
<head>
	<title></title>
</head>
<body>


	<a href="<?php echo base_url();?>Main/profiling">Profiling</a><br>
	<a href="#">Physical Examination</a><br>
	<a href="<?php echo base_url();?>Main/start_medical_history">Medical History</a>
	<a href="<?php echo base_url();?>Online">Online Appointment</a>

	<?php echo $this->input->post('contact_number');?>

	<?php echo $patient_ID; ?>
</body>
</html>