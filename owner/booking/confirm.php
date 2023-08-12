<?php

require_once __DIR__ . "/../owner.php";

//booking id
$booking_id = request('id');
if (empty($booking_id)) {
    setError("Please Provide an ID!!");
    header("Location: ./index.php");
    die;
}

//find all booking info 
$result = find('owner_booking', $booking_id);

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
$vehicle= find('owner_vehicle', $vehicle_id);

$vehicle_name= $vehicle['name']; 
$vehicle_no = $vehicle['vehicle_no'];
$vehicle_price = $vehicle['price'];

if (empty($vehicle)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}


//find category id from vehicles
$owner_brand_id = $vehicle['owner_brand_id'];


if (empty($owner_brand_id)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}

//finding category detials
$owner_brand = find('owner_brand', $owner_brand_id);


if (empty($owner_brand)) {
    setError('Error Occured!!');
    header("Location: ./index.php");
    die;
}


$booking_status = where('owner_booking', 'status', '=', 'pending', false);

if ($booking_status) {

    update('owner_booking', $booking_id, [
        'status' => 'booked',
    ]);
    require_once __DIR__ . "/../../invoice.php";
    setSuccess('Booking has been Approved!');
    header("Location: ./index.php");
    die;
} else {
    setError('Car Aleady booked!!');
    header("Location: index.php");
    die;
}
