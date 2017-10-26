<html>
<head>
<?php require("extensions.php"); ?>
</head>
<style type="text/css">
.page-header
{
  padding-bottom: 9px;
  margin: 40px 0 20px;
  border-bottom: 1px solid #eee;
}
</style>
<body>
  <?php require('sidenav.php'); ?>
  <br><br><br>

  <?php if($this->session->flashdata('delete'))
  {
    echo '
      <div class="alert alert-info">
      '.$this->session->flashdata('delete').'
      </div>
    ';
  }
   ?>
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
  
<div class="container-fluid">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add New Case</button>
              
    <br><br>

  <div align="right" id="pagination_link"></div>
  <div class="table-responsive" id="country_table"></div>
</div>

</body>
</html>
<script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Prms/pagination/"+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#country_table').html(data.country_table);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }
 
 load_country_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });

});
</script>