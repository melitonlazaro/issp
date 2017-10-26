<html>
<head>
	<?php require("extensions.php"); ?>
</head>
<body>
  <?php require('sidenav.php'); ?>
<br><br>
<div class="container-fluid">
  <h1 class="page-header">Patients List</h1>
    <div class="container-fluid">
      <div class="pull-right">
        <ol class="breadcrumb">
          <li>
            <a href="../Main/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active">
            <i class="fa fa-user-o"></i> Patient List
          </li>
        </ol>
      </div>
  <br><br>
    <div class="row">
      <div class="col-md-12">
        <div align="right" id="pagination_link"></div>
      </div>
    </div>
    <div class="row">  
      <div class="col-md-12">
        <div class="table-responsive" id="country_table"></div>
      </div>
    </div>  
</div>

</body>
</html>
<script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Prms/pagination_patient_list/"+page,
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