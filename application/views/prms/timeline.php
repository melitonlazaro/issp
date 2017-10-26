<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>/Public/images/icon.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/Public/timeline.css"></link>
    <link rel="stylesheet" href="<?php echo base_url();?>/Public/font-awesome/css/font-awesome.min.css">

</head>
<body>

  <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>  
      <div class="navi"></div>
      <a class="active" href="Dashboard.html"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Timeline</a>
      <div class="accordion"><i class="fa fa-files-o" aria-hidden="true"></i> Records <i class="fa fa-caret-down" style="float: right; padding-right: 90px;" aria-hidden="true"></i></div>
          <div class="drpnav">
          <a href="Record.html"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp; Case</a>
          <a href="#"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp; Patient</a>
          <a href="#"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp; Infant</a>
          </div>
      <a href="#"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp; Inventory</a>
  </div>

<div class="header">
    <span onclick="openNav()"><i class="fa fa-bars manage" aria-hidden="true"></i></span> DASHBOARD
    <a class="log"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a>
</div>

<section id="main-content">

</head>
<body>
  <section class="main-content">
  <form class="sea-a">
  <input class="sea" type="text" name="search" placeholder="Search..">
  </form>

<div class="timeline">
  <div class="container left">
    <div class="content">
      <h4>Profile</h4> 
      <div id="outer">
        <div class="inner"><button class="teal-l btn-t" type="submit">Add Case</button></div>
        <div class="inner"><button class="teal-l btn-t" type="submit">Edit</button></div>
        <div class="inner"><button class="teal-l btn-t" >Delete</button></div>
      </div>
      <table class="time-s">
        <tr>
        <td><input class="ans-p" type="text" name="surname" placeholder="Surname" value="<?php echo $patient_information->last_name;?>" readonly></td>
        <td><input class="ans-p" name="given_name" placeholder="Given Name" value="<?php echo $patient_information->given_name;?>" readonly></td>
        <td><input class="ans-p" name="middle_initial" placeholder="Middle Initial" value="<?php echo $patient_information->middle_initial;?>" readonly></td>
        </tr>
        <tr>
        <td><input class="ans-p" type="text" name="surname" placeholder="Surname" value="<?php echo $patient_information->date_of_birth;?>" readonly></td>
        <td><input class="ans-p" name="given_name" placeholder="Given Name" value="<?php echo $patient_information->occupation;?>" readonly></td>
        <td><input class="ans-p" name="middle_initial" placeholder="Middle Initial" value="<?php echo $patient_information->contact_num;?>" readonly></td>
        </tr>
        <tr>
        <tr>
        <td><input class="ans-p" type="text" name="surname" placeholder="Surname" value="<?php echo $patient_information->street_no;?>" readonly></td>
        <td><input class="ans-p" name="given_name" placeholder="Given Name" value="<?php echo $patient_information->brgy;?>" readonly></td>
        <td><input class="ans-p" name="middle_initial" placeholder="Middle Initial" value="<?php echo $patient_information->city;?>" readonly></td>
        </tr>
        <tr>
    </table>
    <h4>In case of emergency</h4>
          <table class="time-s">
        <tr>
        <td><input class="ans-p" type="text" name="surname" placeholder="Surname" value="<?php echo $patient_information->emergency_contact_name;?>" readonly></td>
        <td><input class="ans-p" name="given_name" placeholder="Given Name" value="<?php echo $patient_information->emergency_contact_num;?>" readonly></td>
        <td><input class="ans-p" name="middle_initial" placeholder="Middle Initial" value="<?php echo $patient_information->emergency_contact_address;?>" readonly></td>
        </tr>
      </table>

    </div>
  </div>
  <?php foreach ($cases as $c) //foreach for cases
  {?>
  <div class="container right">
    <div class="content">
      <h3>Case Number: <?php echo $c->case_id;?></h3>
      <p>Date Created: <?php echo $c->date_start?></p>
      <p>Status: <?php echo $c->status?></p>
      <br><br>
      <fieldset>
            <h3>Medical History</h3>
            <?php 
            foreach($medicalhistory as $mh):
              if($mh->case_id === $c->case_id) 
              {?>
              <p> Expected Date of Confinement: <?php echo $mh->oh_expected_date_of_confinement; ?> </p>
              <a href="../prms/view_medical_history/<?= $c->case_id;?>/<?= $mh->case_id;?>"><button class="teal-l btn-t">View</button></a>
            <?php 
              }
              else
              {}
            endforeach;
            ?>

     
        <h3>Physical Examination</h3>
      <?php foreach ($physicalexam as $pe)
        { 
          if($pe->case_id = $c->case_id)
          {
            echo '<fieldset>';
            echo 'Date: '.$pe->date.' ';
            echo '<br><br>';
            echo '<b>Plans</b>';           
            echo '<br>';
            echo  $pe->plans;
            echo '<br>';
            echo '<br>';
            echo '<b>Impression</b>';
            echo '<br>';
            echo $pe->impression;
            echo '<br><br>';
            echo '<a href="../prms/view_medical_history/'.$c->case_id.'/'. $pe->Num.'"><button class="teal-l btn-t">View</button></a>';
            echo '</fieldset>';
          } 
         } ?>
        <br><br>
        

    </div>
  </div>
 <?php } ?>


  <br><br><br>



</section>
           
        <script src="js/script.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/dycalendar-jquery.min.js"></script>
        <script src="js/default.js"></script>


</body>
</html> 
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
