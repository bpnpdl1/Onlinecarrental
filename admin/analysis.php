<?php require_once __DIR__ . "/admin.php"; ?>
<?php

$rents = query("SELECT * FROM `owner_booking`");
$rent_dates=array();
$rentcounts=array();



$dates=query("SELECT MIN(from_date) as from_date,MAX(to_date) as to_date FROM `owner_booking`");

// print_r($dates);
for($from=strtotime($dates[0]['from_date']);$from<=strtotime($dates[0]['to_date']);$from=strtotime('+1 day',$from)){
    
    $d=date('Y-m-d',$from);

    $rent_date=query("SELECT COUNT(from_date) as counts FROM `owner_booking` WHERE from_date<=$d OR to_date>=$d GROUP BY from_date");

 
    $rent_dates[]=$d;

    $rentcounts[]=pluck($rent_date,'counts')[0];
}

// print_r(json_encode($rentcounts));

$categories=query("SELECT COUNT(vehicles.category_id) AS categorycount,categories.name FROM `vehicles` JOIN categories ON vehicles.category_id=categories.id GROUP BY category_id");


$vechiles=query("SELECT vehicle_id,COUNT(vehicle_id) as vechile_count,vehicles.name FROM `booking` JOIN vehicles ON vehicles.id=booking.vehicle_id GROUP BY vehicle_id");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HCR Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
     <!-- Include Chart.js library -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require 'header.php'; ?>

        <div class="container">
    <div class="row">
      <div class="col-md-6">
        <!-- Content for the first column -->
        <div class="p-3">
         <h3>Car Brands</h3>
          <div style="width: 400px; height: 400px;">
          <canvas id="myPieChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <!-- Content for the second column -->
        <h3>Most Booked Vechiles</h3>
        <div class=" p-3">
        <div style="width: 400px; height: 400px;">
    <canvas id="myBarChart"></canvas>
  </div>
        </div>
      </div>
    </div>
    
  </div>
  <div  >
         <!-- /.container-fluid -->
         <div class="card  m-4 border hover-shadow bg-white ">
            <h2 class="m-3">Booking Car Analysis</h2>
                <canvas id="lineChart"></canvas>
        </div>
    </div>
    </div>
    <!-- End of Main Content -->
    <script>
    // Get the canvas element
    var canvasContext = document.getElementById('myPieChart').getContext('2d');

    // Sample data for the pie chart
    var chartData = {
      labels: <?php echo json_encode(pluck($categories,'name')); ?>,
      datasets: [{
        data: <?php echo json_encode(pluck($categories,'categorycount')); ?>,
        
      }]
    };

    // Create the pie chart
    var myPieChart = new Chart(canvasContext, {
      type: 'pie',
      data: chartData
    });


    // Chart data
var barChartData = {
  labels: <?php echo json_encode(pluck($vechiles,'name')); ?>,
  datasets: [{
    label: 'Booking Count',
    data: <?php echo json_encode(pluck($vechiles,'vechile_count')); ?>,
  }]
};

// Chart options
var barChartOptions = {
  responsive: true,
  maintainAspectRatio: false
  // Add more options as needed
};

// Get the canvas context using a different variable name
var myBarChartCanvas = document.getElementById('myBarChart').getContext('2d');

// Create the bar chart
var myBarChart = new Chart(myBarChartCanvas, {
  type: 'bar',
  data: barChartData,
  options: barChartOptions
});

  </script>
       <script>

// Sample data for the line chart
const data = {
    labels: <?php echo json_encode($rent_dates); ?>,
    datasets: [{
        label: 'Booking Counts',
        data: <?php echo json_encode($rentcounts); ?>,
        borderColor: 'black',
        backgroundColor: 'rgba(0, 0, 255, 0.2)',
        borderWidth: 2,
        pointRadius: 5,
        pointBackgroundColor: 'black'
    }]
};

// Chart configuration
const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        }
    }
};

// Create a new line chart instance
var lineChart = new Chart(document.getElementById('lineChart'), config);


    </script>

    <?php require 'footer.php'; ?>