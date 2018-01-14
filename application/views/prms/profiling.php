<html>
<head>
	<?php require('extensions.php'); ?>
	<title>JFMLMC</title>
	<style type="text/css">
		.profiling-option
		{
			background-color: ;
			border: 1px solid black;
			
		}
		.profiling-option:hover
		{
			cursor:pointer;
		}
	</style>
</head>
<body>
	<?php require('sidenav.php'); ?>
	<br><br><br>
	<div class="container">
		<div class="row" >
			<div class="col-md-6" id="existing_records">
				<div class="jumbotron profiling-option">
					Patients with existing maternity records
				</div>
			</div>
			<div class="col-md-6" id="no_existing_records">
				<div class="jumbotron profiling-option">
					Patients without existing maternity records
				</div>
			</div>
		</div>
	</div>
	<div class="container" id="no_existing_records_form">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<button class="btn btn-info" id="return1"><i class="fa fa-arrow-circle-left"></i> Return</button>
				</div>
			</div>
		</div>
		<br>
		<?php echo form_open('Prms/process_profiling'); ?>
			<div class="row">
				<div class="col-md-4">
					<label for="last_name">Last Name</label>
				    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
				</div>
				<div class="col-md-4">
					<label for="given_name">First Name</label>
				    <input type="text" class="form-control" id="given_name" name="given_name" placeholder="First Name" required>
				</div>
				<div class="col-md-4">
					<label for="middle_initial">Middle Initial</label>
					<input type="text" name="middle_initial" id="middle_initial" class="form-control" placeholder="Middle Initial" required>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4">
					<label for="occupation">Occupation</label>
				    <input type="text" name="occupation" class="form-control" id="occupation" placeholder="Occupation" required>
				</div>
				<div class="col-md-4">
					<label for="date_of_birth">Date of Birth</label>
				    <input type="text" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Date of Birth" required>
				</div>
				<div class="col-md-4">
					<label for="contact_num">Contact Number</label>
				    <input type="text" name="contact_num" class="form-control" id="contact_num" placeholder="Contact Number" required>
				</div>
			</div>
			<h3>Address</h3>
			<div class="row">
				<div class="col-md-4">
					<label for="street_no">Street Number</label>
				    <input type="text" name="street_no" class="form-control" id="street_no" placeholder="Contact Number" required>
				</div>
				<div class="col-md-4">
					<label for="brgy">Barangay</label>
				    <input type="text" name="brgy" class="form-control" id="brgy" placeholder="Barangay" required>
				</div>
				<div class="col-md-4">
					<label for="city">City</label>
				    <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
				</div>
			</div>
			<h3>Emergency Contact Information</h3>
			<div class="row">
				<div class="col-md-4">
					<label for="name">Name</label>
				    <input type="text" name="emergency_contact_name" class="form-control" id="emergency_contact_name" placeholder="Name" required>
				</div>
				<div class="col-md-4">
					<label for="emergency_contact_number">Emergency Contact Number</label>
				    <input type="text" name="emergency_contact_num" class="form-control" id="emergency_contact_num" placeholder="Emergency Contact Number" required>
				</div>
				<div class="col-md-4">
					<label for="emergency_contact_address">Emergency Contact Address</label>
				    <input type="text" class="form-control" name="emergency_contact_address" id="emergency_contact_address" placeholder="Emergency Contact Address" required>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" id="crete_new_record" class="btn btn-success"><i class="fa  fa-user-plus"></i> Create New Patient Record</button>
				</div>
			</div>
		</form>
	</div>
	<br>

	<div class="container" id="existing_records_form">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<button class="btn btn-info" id="return2"><i class="fa fa-arrow-circle-left"></i> Return</button>
				</div>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-md-12">
				<form action="" method="GET">
					<label for="patient_name">Patient Name</label>
					<input type="text" id="search" name="search" class="form-control" placeholder="Search Patient Name">
					<br>
					<button type="button" id="get_patient_information" class="btn btn-info">Get Patient Information</button>
				</form>
			</div>
		</div>
		<br><br>
		<div class="row" id="patient_form">
			<div class="col-md-4">
				<label for="last_name">Last Name</label>
			    <input type="text" class="form-control" id="existing_last_name" placeholder="Last Name" readonly>
			</div>
			<div class="col-md-4">
				<label for="first_name">First Name</label>
			    <input type="text" class="form-control" id="existing_first_name" placeholder="First Name" readonly>
			</div>
			<div class="col-md-4">
				<label for="middle_initial">Middle Initial</label>
				<input type="text" name="middle_initial" id="existing_middle_initial" class="form-control" placeholder="Middle Initial" readonly>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<label for="occupation">Occupation</label>
			    <input type="text" class="form-control" id="existing_occupation" placeholder="Occupation" readonly>
			</div>
			<div class="col-md-4">
				<label for="date_of_birth">Date of Birth</label>
			    <input type="text" class="form-control" id="existing_date_of_birth" placeholder="Date of Birth" readonly>
			</div>
			<div class="col-md-4">
				<label for="contact_num">Contact Number</label>
			    <input type="text" class="form-control" id="existing_contact_num" placeholder="Contact Number" readonly>
			</div>
		</div>
		<h3>Address</h3>
		<div class="row">
			<div class="col-md-4">
				<label for="street_no">Street Number</label>
			    <input type="text" class="form-control" id="existing_street_no" placeholder="Contact Number" readonly>
			</div>
			<div class="col-md-4">
				<label for="barangay">Barangay</label>
			    <input type="text" class="form-control" id="existing_barangay" placeholder="Barangay" readonly>
			</div>
			<div class="col-md-4">
				<label for="city">City</label>
			    <input type="text" class="form-control" id="existing_city" placeholder="City" readonly>
			</div>
		</div>
		<h3>Emergency Contact Information</h3>
		<div class="row">
			<div class="col-md-4">
				<label for="name">Name</label>
			    <input type="text" class="form-control" id="existing_name" placeholder="Name" readonly>
			</div>
			<div class="col-md-4">
				<label for="emergency_contact_number">Emergency Contact Number</label>
			    <input type="text" class="form-control" id="existing_emergency_contact_number" placeholder="Emergency Contact Number" readonly>
			</div>
			<div class="col-md-4">
				<label for="emergency_contact_address">Emergency Contact Address</label>
			    <input type="text" class="form-control" id="existing_emergency_contact_address" placeholder="Emergency Contact Address" readonly>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-success"><i class="fa  fa-user-plus"></i> Create New Patient Record</button>
			</div>
		</div>
	</div>
	<div id="retrieve_div">
		
	</div>
	<script>
		$(document).ready(function(){
				$('#existing_records_form').hide();
				$('#no_existing_records_form').hide();

				$('#existing_records').click(function(){
					$('#existing_records_form').show(100);
					$('#existing_records').hide(100);
					$('#no_existing_records_form').hide(100);
					$('#no_existing_records').hide(100);

				});

				$('#no_existing_records').click(function(){
					$('#no_existing_records_form').show(100);
					$('#no_existing_records').hide(100);
					$('#existing_records_form').hide(100);
					$('#existing_records').hide(100);

				});

				$('#return1').click(function(){
					$('#no_existing_records_form').hide(100);
					$('#existing_records_form').hide(100);
					$('#existing_records').show(100);
					$('#no_existing_records').show(100);
				});

				$('#return2').click(function(){
					$('#existing_records_form').hide(100);
					$('#no_existing_records_form').hide(100);
					$('#existing_records').show(100);
					$('#no_existing_records').show(100);
				});
		});
	</script>
	<script>
		$(document).ready(function(){
			$('#get_patient_information').click(function(){

				var patient_info = $('#search').val();
				var x = "http://localhost/issp/Prms/get_existing_patient_information/";

				$.ajax({
					type: "POST",
					url: x+patient_info,
					data:{patient_info:patient_info},
					success:function(data)
					{
						//alert("Records retrieved");
						$('#retrieve_div').html(data);
					}
				});
			});
		});
	</script>
	<script>
    $(function(){
        $( "#crete_new_record" ).click(function(event)
        {
            event.preventDefault();//prevent auto submit data

            var last_name = $("#last_name").val();
            var given_name = $("#given_name").val();
      		var middle_initial = $("#middle_initial").val();
      		var occupation = $('#occupation').val();
      		var date_of_birth = $('#date_of_birth').val();
      		var contact_num = $('#contact_num').val();
      		var street_no = $('#street_no').val();
      		var brgy = $('#brgy').val();
      		var city = $('#city').val();
      		var emergency_contact_name = $('#emergency_contact_name').val();
      		var emergency_contact_num = $('#emergency_contact_num').val();
      		var emergency_contact_address = $('#emergency_contact_address').val();
          

            $.ajax(
                {
                    type:"post",
                    url: "<?php echo site_url();?>/Prms/process_profiling",
                    data:{ last_name:last_name, given_name:given_name, middle_initial:middle_initial, occupation:occupation, date_of_birth:date_of_birth, contact_num:contact_num, street_no:street_no, brgy:brgy, city:city, emergency_contact_name:emergency_contact_name, emergency_contact_num:emergency_contact_num, emergency_contact_address:emergency_contact_address},
                    success:function(data)
                    {
                       alert(data.patient_ID);
                    }
             
                
                });
            
        });
      
    });


</script>
	
	<!-- <script>
		$(document).ready(function(){
				

				$("#search").keyup(function(){
			       var str=  $("#search").val();
			       if(str == "") {
			               $( "#patient_form" ).html("<b>Book information will be listed here...</b>"); 
			       }else {
			               $.get( "<?php echo base_url();?>Prms/ajaxsearch?id="+str, function( data ){
			                   $( "#patient_form" ).html( data );  
			            });
			       }
			   });  
			});  
	</script> -->
</body>
</html>