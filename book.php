<?php
 require 'db.php';
 require 'functions.php';

$from_date = request('from_date');
$to_date = request('to_date');
$message = request('message');
$vehicle_id = request('cid');
$user_id = $_SESSION['user_id'];

if (empty($from_date) || empty($to_date) || empty($message) || empty($user_id) || empty($vehicle_id)) {
    setError('You must fill all the fields!');
    header("Location: cars_detail.php");
    die;
}

if ($from_date >= $to_date) {

    setError('Your From Date should be less than To Date');
    $url = 'cars_detail.php?id='. $vehicle_id;
    header("Location: $url");    
    die;
}

$d1 = strtotime($from_date);
$d2 = strtotime($to_date);
$diff = ($d2 - $d1) / 60 / 60 / 24;
$diff = (int)$diff;

$dsql = "SELECT from_date,to_date FROM booking WHERE vehicle_id= $vehicle_id";
$dates=query($dsql);
foreach ($dates as $date) {
  
    for ($i = $from_date; $i <= $to_date; $i = date('Y-m-d', strtotime($i . ' + 1 days'))) {

        if ($i == $date['from_date']) {
            setError('This car is already rented from ' . date('M-d',strtotime($date['from_date'])).' To '.date('M-d',strtotime($date['to_date'])));
            $url = 'cars_detail.php?id='. $vehicle_id;
            header("Location: $url");
            die;
        }
        if ($i == $date['to_date']) {
            echo  $i.'='.$date['to_date'];
            setError('This car is rented to  ' . $date['to_date']);
            $url = 'cars_detail.php?id='. $vehicle_id;
            header("Location: $url");
            die;
        }
        if ($i >= $date['from_date'] && $i <= $date['to_date']) {
            setError('This car is already rented from ' . date('M-d', strtotime($date['from_date'])) . ' to ' . date('M-d', strtotime($date['to_date'])));
            $url = 'cars_detail.php?id=' . $vehicle_id;
            header("Location: $url");
            die;
        }
    }
}


if(isset($_POST['khalti'])){

    $payment_method="Khalti";
    $diff_dates=sub_dates($to_date,$from_date);
    $car=find('vehicles',$vehicle_id);
    $totalamount=$diff_dates*$car['price'];
    $data=['from_date'=>$from_date,
    'to_date'=>$to_date,
    'message'=>$message,
    'vehicle_id'=>$vehicle_id,
    'user_id'=>$user_id,
    'payment_method'=>$payment_method,
    'totalamount'=>$totalamount];



    $_SESSION['data']=$data;
 

    redirect('payment.php');
}else{
    echo "code";
}

$status = 'pending';
create('booking', compact('user_id','vehicle_id','from_date', 'to_date', 'message', 'status'));

setSuccess(' Booking successfully!');
$url = 'cars_detail.php?id='. $vehicle_id;
header("Location: $url");

?>