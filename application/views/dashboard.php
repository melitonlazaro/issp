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
    $date1 = date('Y-m-01');
    $date2 = date('Y-m-31');
    $query = "SELECT COUNT(1) AS  Prenatal, DATE(date) as date FROM physicalexamination WHERE date between '$date1' and '$date2' GROUP BY DATE(date) LIMIT 0, 30";
    $result = $conn->query($query);
    $chart_data = '';
    while($row = $result->fetch_array())
    {
        $chart_data .= "{ date:'".$row["date"]."', prenatal:".$row["Prenatal"]."}, ";
    }
        $chart_data = substr($chart_data, 0, -2);
?>
<?php 
    $query1 = "SELECT COUNT(1) as case_id, date_start as date FROM `CASE` WHERE `date_start` between '$date1' and '$date2' GROUP BY date_start LIMIT 0, 30";        
    $res = $conn->query($query1);
    $chart_data1 = '';
    while($row1 = $res->fetch_array())
    {
        $chart_data1 .= "{ date:'".$row["date"]."', case_id:".$row["case_id"]."}, ";
    }
        $chart_data1 = substr($chart_data1, 0, -2)
?>

<!DOCTYPE html>
<html>
<head>
 <?php require "extensions.php"; ?>

</head>
<body>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>  
      <div class="navi"></div>
      <a class="active" href="main.html"><i class="fa fa-home navli" aria-hidden="true"></i>&nbsp; Dashboard</a>
      <a href="../prms/profiling"><i class="fa fa-book navli" aria-hidden="true"></i>&nbsp; Patient</a>
      <a href="#"><i class="fa fa-archive navli" aria-hidden="true"></i>&nbsp; Inventory</a>

    </div>

<div class="header">
    <span onclick="openNav()"><i class="fa fa-bars manage" aria-hidden="true"></i></span> DASHBOARD
    <a href="<?php echo base_url();?>/Main/logout" class="log"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<section id="main-content">
    <div class="c-content">
        <table class="table-main">
              <tr>
                <th class="notif"><i class="fa fa-file-text fa-3x" aria-hidden="true"></i><hr class="style13">Number of Patient</th>
                <th class="notif"><i class="fa fa-file-text fa-3x" aria-hidden="true"></i><hr class="style13">Number of Active Cases</th>
                <th class="notif"><i class="fa fa-file-text fa-3x" aria-hidden="true"></i><hr class="style13">Number of Infants</th>
                <th><td>
                        <div class="dycalendar-month-prev-next-button dycalendar-container skin-red shadow-default"></div>
                     </div></td>
                </th>
              </tr>
       </table>
    </div>

</section>
<?php if($this->session->flashdata('new_case')) 
    {
        echo $this->session->flashdata('new_case');
    }
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add New Case</button>
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
                                    <div class="col-md-5">
                                        <h3>New Patient</h3>
                                        <a href="../prms/profiling"><button class="btn btn-success">Create new patient profile</button></a>
                                    </div>
                                    <div class="col-md-5">
                                        <h3>Existing Patient</h3>
                                        <form method="POST" action="../prms/create_case_existing">
                                            <p>Last Name</p>
                                            <select name="last_name">
                                                <option></option>
                                                <?php foreach($last_names as $ln) 
                                                    echo '<option>'.$ln->last_name.'</option>';
                                                ?>
                                            </select>
                                            <p>First Name</p> 
                                            <select name="given_name">
                                                <option></option>
                                                <?php foreach($first_names as $fn) 
                                                    echo '<option>'.$fn->given_name.'</option>';
                                                ?>
                                            </select><br>
                                            <select name="physician_id">
                                                <option></option>
                                                <?php 
                                                    foreach($physician_id as $pi)
                                                    {
                                                        echo '<option>'.$pi->physician_id.'</option>';
                                                    }
                                                ?>
                                            </select><br>
                                            <input type="submit" value="Create new case">                                                                                      
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                                <br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <table class="table table-responsive table-hover">
                    <tr>
                        <th>Latest Patients</th>
                    </tr>
                <?php foreach($latest_patients as $lp)
                {
                    echo '
                        <tr>
                        <td>'.$lp->given_name.' '.$lp->last_name.' </td>
                        <td>'.$lp->date_registered.'</td>
                        </tr>
                         ';
                } 
                ?>
                 <tr><td> <a href="../prms/patient_list"><button type="submit" class="btn btn-info" name="update">View All</button></a></td></tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-responsive table-hover">
                    <tr>
                        <th>Active Cases</th>
                    </tr>
                    <tr>
                        <th>Case ID</th>
                        <th>Patient ID</th>
                        <th>Physician ID</th>
                        <th>Start date</th>
                    </tr>
                <?php foreach($active_cases as $ac)
                {
                    echo '
                        <tr>
                        <td>'.$ac->case_id.'</td>
                        <td>'.$ac->patient_id.'</td>
                        <td>'.$ac->physician_id.'</td>
                        <td>'.$ac->date_start.'</td>
                        </tr>
                         ';
                } 
                ?>
                <tr>
                    <td> <a href="../prms/case_list"><button type="submit" class="btn btn-info" name="update">View All</button></a></td>
                </tr>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-responsive table-hover">
                    <tr>
                        <th>Latest Infants</th>
                    </tr>
                <?php foreach($latest_infants as $li)
                {
                    echo '
                        <tr>
                        <td>'.$li->first_name.' '.$li->last_name.' </td>
                        <td>'.$li->date_of_birth.'</td>
                        </tr>
                         ';
                } 
                ?>
                </table>
            </div>
        </div>    
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="chart">

                </div>
            </div>
            <div class="col-md-6">
                <div id="chart1">

                </div>
            </div>
        </div>
    </div>
</body>
</html> 
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['prenatal'],
 labels:['Prenatal'],
 hideHover:'auto',
 stacked:true
});
</script>
<script>
Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data1; ?>],
 xkey:'date',
 ykeys:['case_id'],
 labels:['case_id'],
 hideHover:'auto',
 stacked:true
});
</script>