<?php
 require 'db.php';
 require 'functions.php';



 $args = http_build_query(array(
    'token' => $_POST['input']['token'],
    'amount'  => $_SESSION['data']['totalamount']
  ));
  
  $url = "https://khalti.com/api/v2/payment/verify/";
  
  # Make the call using API.
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
  $headers = ['Authorization: Key test_secret_key_7b7e7b10c26e4f9d8f8d7803eb30dc32'];
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  
  // Response
  $response = curl_exec($ch);
  $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


  curl_close($ch);

  print_r($response);
  if($status_code == 200) {
    $status = 'pending';
    $payment_method = 'khalti';
    $user_id = $_SESSION['user_id'];
    $owner_id = $_SESSION['data']['owner_id'];
    $vehicle_id = $_SESSION['data']['vehicle_id'];
    $from_date = $_SESSION['data']['from_date'];
    $to_date = $_SESSION['data']['to_date'];
    $message = $_SESSION['data']['message'];





if(isset($owner_id)){
    create('owner_booking', compact('user_id', 'owner_id', 'vehicle_id','from_date', 'to_date', 'message', 'status','payment_method'));
}else{
    create('booking', compact('user_id','vehicle_id','from_date', 'to_date', 'message', 'status'));
}
    setSuccess(' Booking successfully!');
    $url = 'owner_cars_detail.php?id='. $vehicle_id;
     header("Location: $url");
        die;
  } else {
    echo "Error occured";
    die;
  }






 ?>