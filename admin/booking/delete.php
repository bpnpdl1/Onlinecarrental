<?php

require "../admin.php";

//this is booking id
$id = request('id');

$booking = find('booking', $id);




if (!empty($id)) {
    delete('booking', $id);
    setSuccess('Booking Deleted Successfully');
    header("Location: ./index.php");
    die;
}

