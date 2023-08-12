<?php

require '../db.php';
require '../functions.php';
$user_id = $_SESSION['user_id'];
$user = find('users', $user_id);


$id = request('id');


// Cancel Admin booking
//booking id
$booking_id = request('id');
if (empty($booking_id)) {
    setError("Please Provide an ID!!");
    header("Location: ./index.php");
    die;
}

//find all booking info 
$result = find('booking', $booking_id);

$from_date = $result['from_date'];
$to_date = $result['to_date'];

//id of user who have done booking
$result_id = $result['user_id'];

//finding name and email of user who have done booking
$user_result = find('users', $result_id);

//name
$user_name = $user_result['name'];

//email
$user_email = $user_result['email'];




if (empty($result)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}


//vehicle id
$vehicle_id = $result['vehicle_id'];


if (empty($vehicle_id)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}

//find vehicle detials
$vehicle= find('vehicles', $vehicle_id);

$vehicle_name= $vehicle['name']; 
$vehicle_no = $vehicle['vehicle_no'];
$vehicle_price = $vehicle['price'];

if (empty($vehicle)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}




echo $id;
delete('booking', $id);
require_once __DIR__ . "/invoices.php";
setSuccess('Your Rent Cancel Successully');
redirect('profile/mybooking.php');

?>