<?php require('extensions.php'); ?>
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
    $query1 = "SELECT COUNT(1) as case_id, date_start as date FROM `CASE` WHERE `date_start` between '$date1' and '$date2' GROUP BY date_start LIMIT 0, 30";        
    $res = $conn->query($query1);
    $chart_data1 = '';
    while($row = $res->fetch_array())
    {
        $chart_data1 .= "{ date:'".$row["date"]."', case_id:".$row["case_id"]."}, ";
    }
        $chart_data1 = substr($chart_data1, 0, -2)
?>
                <div id="chart">

                </div>
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data1; ?>],
 xkey:'date',
 ykeys:['case_id'],
 labels:['case'],
 hideHover:'auto',
 stacked:true
});
</script>
