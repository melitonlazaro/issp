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

	<?php echo $this->session->userdata('username'); ?>
	<br><br><br>
	<form action="Main/logout" method="POST">
		<input type="submit" value="Logout">

	</form>
</body>
</html>