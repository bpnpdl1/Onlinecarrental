<?php

require 'db.php';
require 'functions.php';


setSuccess(' Booking successfully!');
if(isset($_SESSION['data']['owner_id'])){
    $url = 'owner_cars_detail.php?id='. $_SESSION['data']['vehicle_id'];
}else{
    $url = 'cars_detail.php?id='. $_SESSION['data']['vehicle_id'];
}

 header("Location: $url");
    die;




?>