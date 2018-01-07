<html>
<head>
	<?php require('extensions.php'); ?>
	<link rel="stylesheet" href="<?php echo base_url();?>/Public/css/dataTables.bootstrap.min.css">
	<title>MCMS</title>
</head>
<body>
	<?php require('sidenav.php'); ?>
	<br><br><br>

	 <div class="container-fluid">
    <h1 class="page-header">Case List</h1>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li>
            <a href="../Main/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active">
            <i class="fa fa-plus-square"></i> Case
          </li>
        </ol>
      </div>
  </div>
          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                 <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="addLabel">New Case</h4>
                          </div>                            
                          <div class="modal-body form-horizontal">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <h3>New Patient</h3>
                                          <a href="../prms/profiling"><button class="btn btn-success">Create new patient profile</button></a>
                                      </div>
                                      <div class="col-md-3">
                                          <h3>Existing Patient</h3>
                                          <form method="POST" action="../prms/create_case_existing">
                                            <div class="form-group">
                                              <label>Last Name</label>
                                              <select name="last_name" class="form-control">
                                                  <option></option>
                                                  <?php foreach($patient_names as $pn)
                                                  { 
                                                      echo '<option>'.$pn->last_name.', '.$pn->given_name.' '.$pn->middle_initial.'</option>';
                                                  }
                                                      echo '<input type="hidden" name="patient_id" value="'.$pn->patient_ID.'" >';
                                                  ?>
                                              </select>
                                            </div>
                                              <div class="form-group">
                                                <label>Physician ID</label>
                                                <select name="physician_id" class="form-control">
                                                    <option></option>
                                                    <?php 
                                                        foreach($physician_id as $pi)
                                                        {
                                                            echo '<option>'.$pi->physician_id.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                               </div>
                                              <br>

                                              <input type="submit" value="Create new case" class="btn btn-success">                                                                                      
                                          </form>
                                      </div>
                                      <div class="col-md-3">
                                      </div>
                                  </div>
                                  <br><br><br>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
  

	<div class="container">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
		          <th>Case ID</th>
		          <th>Patient ID</th>
		          <th>Patient Name</th>
		          <th>Physician ID</th>
		          <th>Physician Name</th>
		          <th>Date Start</th>
		          <th>Status</th>
		          <th>Action</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$date = date('d-m-Y');
					$total = date('d-m-Y', strtotime('-2 week', strtotime($date)));
					echo $total;
					?>
					<?php foreach ($case_details as $cd) 
					{
						echo '
							<tr>
						          <td>'.$cd->case_id.'</td>
						          <td>'.$cd->patient_id.'</td>
						          <td>'.$cd->last_name.', '.$cd->given_name.' '.$cd->middle_initial.'</td>
						          <td>'.$cd->physician_id.'</td>
						          <td>'.$cd->physician_last_name.'</td>
						          <td>'.$cd->date_start.'</td>
						          <td>'.$cd->status.'</td> 
						          <td>
						            <a href="../prms/case_timeline/'.$cd->case_id.'"><button class="btn btn-info">View</button></a>
						            <a href="../prms/prenatal/'.$cd->patient_id.'/'.$cd->case_id.'"><button class="btn btn-success">Prenatal</button></a>';
						            if($cd->date_start == $total )
						            {
						              echo ' <button class="btn btn-warning">Childbirth </button> ';
						            }
						            elseif($cd->date_start < $total)
						            {
						              echo '<button class="btn btn-danger ">Childbirth </button>';
						            }
						            else
						            {
						              echo '<button class="btn btn-success" disabled>Childbirth </button>';
						            }
						            echo'
						          </td>     
							</tr>
							 ';
					} ?>

			</tbody>
		</table>
		<br><br><br><br><br><br>
		
	</div>
 <script src="<?php echo base_url();?>public/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>public/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(function () {
      $('#example1').DataTable({
        buttons:[
        {
          text:'My Button'

        }]
      });
    });
  </script>
</body>
</html>