<html>
<head>
	<?php require('extensions.php'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/Public/css/AdminLTE.css">
</head>
<body>
	<?php require('sidenav.php'); ?>
	<br><br><br>
    <h1 class="page-header">Patient Profile</h1>
   <div class="pull-right">
        <ol class="breadcrumb">
          <li >
            <i class="fa fa-dashboard"></i> Dashboard
          </li>
          <li>
            <i class="fa fa-plus-square"> Patient List</i>
          </li>
          <li class="active">
            <i class="fa fa-list"> Patient Profile</i>
          </li>
        </ol>
    </div>
    <br><br><br><br>
	<div class="row">
		
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h5>Patient Name</h5>
					<div class="well well-sm">
					<?php echo ' '.$patient_information->last_name.', '.$patient_information->given_name.' '.$patient_information->middle_initial.' '; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h5>Address</h5>
					<div class="well well-sm">
					<?php echo ' '.$patient_information->street_no.' '.$patient_information->brgy.' '.$patient_information->city.' '; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<h5>Date of Birth</h5>
					<div class="well well-sm">
						<?php echo ' '.$patient_information->date_of_birth.''; ?>
					</div>
				</div>
				<div class="col-md-4">	
					<h5>Occupation</h5>
					<div class="well well-sm">
						<?php echo ' '.$patient_information->occupation.''; ?>
					</div>
				</div>	
				<div class="col-md-4">	
					<h5>Contact Number</h5>
					<div class="well well-sm">
						<?php echo ' '.$patient_information->contact_num.''; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h2 class="page-header">List of Cases</h2>
        	<ul class="timeline">

			<?php foreach($cases as $cs)
			{
				echo '
						 <li class="time-label"> 
                                <span class="bg-blue">
                                    '.$cs->date_start.'
                                </span>
                            </li>

                            <li>
                                <i class="fa fa-plus-square bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                    <h3 class="timeline-header">Case '.$cs->case_id.'</h3>
                                    <div class="timeline-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Plans</p>
                                                <div class="well well-sm">
                                                    '.$cs->status.'
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="../../Prms/case_timeline/'.$cs->case_id.'"><button class="btn btn-success btn-xs"> View Timeline </button></a>
                                    </div>
                                </div><br>
                            </li>
					 ';


			 } ?>
			</ul>
		</div>
	</div>
</body>
</html>