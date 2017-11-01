<html>
<head>
	<?php require('extensions.php'); ?>
	<link rel="stylesheet" href="<?php echo base_url();?>/Public/css/dataTables.bootstrap.min.css">
	<title></title>
</head>
<body>
	<?php require('sidenav.php'); ?>
	<br><br><br>

	<div class="container">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Patient ID</th>
					<th>Last Name</th>
					<th>Given Name</th>
					<th>MI</th>
					<th>Occupation</th>
				</tr>
			</thead>
			<tbody>
				
					<?php foreach ($dt_ex as $dt) 
					{
						echo '
							<tr>
								<td>'.$dt->patient_ID.'</td>
								<td>'.$dt->last_name.'</td>
								<td>'.$dt->given_name.'</td>
								<td>'.$dt->middle_initial.'</td>
								<td>'.$dt->occupation.'</td>
							</tr>
							 ';
					} ?>

			</tbody>
		</table>
		<br><br><br><br><br><br>
		<table id="example2" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Patient ID</th>
					<th>Last Name</th>
					<th>Given Name</th>
					<th>MI</th>
					<th>Occupation</th>
				</tr>
			</thead>
			<tbody>
				
					<?php foreach ($dt_ex as $dt) 
					{
						echo '
							<tr>
								<td>'.$dt->patient_ID.'</td>
								<td>'.$dt->last_name.'</td>
								<td>'.$dt->given_name.'</td>
								<td>'.$dt->middle_initial.'</td>
								<td>'.$dt->occupation.'</td>
							</tr>
							 ';
					} ?>

			</tbody>
		</table>
	</div>
	<script src="<?php echo base_url();?>public/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>public/js/dataTables.bootstrap.min.js"></script>
	<script>
	  $(function () {
	    $('#example1').DataTable()
	    $('#example2').DataTable({
	      'paging'      : true,
	      'lengthChange': false,
	      'searching'   : false,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : false
	    })
	  })
	</script>
</body>
</html>