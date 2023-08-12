<?php

require "../owner.php";

//this is booking id
$id = request('id');

$booking = find('owner_booking', $id);




if (!empty($id)) {
    delete('owner_booking', $id);
    setSuccess('Booking Deleted Successfully');
    header("Location: ./index.php");
    die;
}

