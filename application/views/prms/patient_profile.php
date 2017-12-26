<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "mcms";

    $conn =  new mysqli($server, $username, $password, $db);
    if($conn->connect_error)
    {
        die("Connecting to database failed:" . $conn->connect->error);
    }
    $query = "SELECT `height`, `date` FROM `physicalexamination` WHERE `patient_ID` = $patient_information->patient_ID ORDER BY `date` ASC";
    $result = $conn->query($query);
    $chart_data = '';
    while($row = $result->fetch_array())
    {
        $chart_data .= "{ date:'".$row["date"]."', height:".$row["height"]."}, ";
    }
        $chart_data = substr($chart_data, 0, -2);
?>

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
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-5"> <!-- Panel for Patient Information -->
    			<div class="panel panel-primary">
    				<div class="panel-heading">
    					<div class="row">
							<div class="col-md-6">
									<?php 
										echo "<p style='text-align: left;''>"; 
										echo  $patient_information->last_name;
										echo ', '; 
										echo $patient_information->given_name;
										echo "</p>";
									?>
							</div>
							<div class="col-md-6">
									<?php 
										echo "<p style='text-align: right;''>";
										echo $patient_information->patient_ID;
										echo "</p>";
									?>
							</div>
						</div>
    				</div>
    				<div class="panel-body">
    					<div class="row">
    						<div class="col-md-4">
    							
    						</div>
    						<div class="col-md-8">
    							<table class="table table-condensed table-striped table-hover">
    								<tr>
    									<td>Patient ID</td>
    									<td><?php echo $patient_information->patient_ID; ?></td>
    								</tr>
    								<tr>
    									<td>Last Name</td>
    									<td><?php echo $patient_information->last_name; ?></td>
    								</tr>
    								<tr>
    									<td>Given Name</td>
    									<td><?php echo $patient_information->given_name; ?></td>
    								</tr>
    								<tr>
    									<td>Date of Birth</td>
    									<td><?php echo $patient_information->date_of_birth; ?></td>
    								</tr>
    								<tr>
    									<td>Contact Number</td>
    									<td><?php echo $patient_information->contact_num; ?></td>
    								</tr>
    								<tr>
    									<td>Occupation</td>
    									<td><?php echo $patient_information->occupation; ?></td>
    								</tr>    	
    								<tr>
    									<td>Street No.</td>
    									<td><?php echo $patient_information->street_no; ?></td>
    								</tr>		
    								<tr>
    									<td>Barangay</td>
    									<td><?php echo $patient_information->brgy; ?></td>
    								</tr>
    								<tr>
    									<td>City</td>
    									<td><?php echo $patient_information->city; ?></td>
    								</tr>
    								<tr>
    									<td>Date Registered</td>
    									<td><?php echo $patient_information->date_registered ?></td>
    								</tr>
    							</table>
    						</div>
    					</div>
    				</div>
    				<div class="panel-footer">
    					<button class="btn btn-warning"><i class="fa fa-edit"></i></button>
    					<button class="btn btn-danger"><i class="fa fa-remove"></i></button>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-7"> <!-- Panel for Patient Chart -->
    			<div class="panel panel-primary">
    				<div class="panel-heading">
    					<i class="fa fa-line-chart"></i>&nbsp;Patient Chart
    				</div>
    				<div class="panel-body">
    					<div class="row">
    						<div class="col-md-3">
    							<button class="btn btn-success btn-block" id="weightbtn">Weight</button>
    							<button class="btn btn-success btn-block" id="heightbtn">Height</button>
    							<button class="btn btn-success btn-block" id="bpbtn">Blood Pressure</button>
    						</div>
    						<div class="col-md-9">
    							<div id="weight">
    								<div id="weight_chart">weight</div>
    							</div>
    							<div id="height">
    								<div id="height_chart"></div>
    							</div>
    							<div id="blood_pressure">
    								<div id="weight_chart">bp</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="panel-footer">
    					
    				</div>
    			</div>	
    		</div>
    	</div>
    </div>

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
</body>
</html>
<script>
 $(document).ready(function(){
 	$('#height').hide();
 	$('#blood_pressure').hide();
 });
</script>
<script>
	$(document).ready(function(){
		$('#weightbtn').click(function(){
			$('#height').hide(100);
			$('#blood_pressure').hide(100);
			$('#weight').show(100);
		});
		$('#heightbtn').click(function(){
			$('#blood_pressure').hide(100);
			$('#weight').hide(100);
			$('#height').show(100);
		});
		$('#bpbtn').click(function(){
			$('#weight').hide(100);
			$('#height').hide(100);
			$('#blood_pressure').show(100);
		});
	});
</script>
<script>
Morris.Line({
 element : 'height_chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['height'],
 labels:['height'],
 hideHover:'auto',
 stacked:true
});
</script>