<?php

require "../admin.php";


$name = request('name');
$price = request('price');
$model_year = request('model_year');
$seat = request('seat');
$vehicle_no = request('vehicle_no');
$description = request('description');
$category_id = request('category_id');
$paper_work= request('paper_work');


echo"<pre>";

$file1 = $_FILES['image']['tmp_name'];
$file2 = $_FILES['paper_work']['tmp_name'];
$type1 = $_FILES['image']['type'];
$type2 = $_FILES['paper_work']['type'];
$size1 = $_FILES['image']['size'];
$size2 = $_FILES['paper_work']['size'];


if($type1 != "image/png" && $type1 != "image/jpeg" && $type1 != "image/gif" ){
    setError("FIle must be an image");
        header("Location: create.php");
    die;
}

if($type2 != "image/png" && $type2 != "image/jpeg" && $type2 != "image/gif" ){
    setError("Vehicle paper must be an image");
        header("Location: create.php");
    die;
}

$mb_size1 = $size / 1024 / 1024;
$mb_size2 = $size / 1024 / 1024;

    if ($mb_size1 > 5) {
        setError("Image should be less than 5 MB");
        header("Location: create.php");
        die;
    }
    if ($mb_size2 > 5) {
        setError("vehicle paper should be less than 5 MB");
        header("Location: create.php");
        die;
    }

    $ext1 = match($type1){
        "image/png" => ".png",
        "image/jpeg" => ".jpeg",
        "image/gif" => ".gif",
    };
    $ext2 = match($type2){
        "image/png" => ".png",
        "image/jpeg" => ".jpeg",
        "image/gif" => ".gif",
    };
    $file_name1 = uniqid() . $ext1;
    $file_name2 = uniqid() . $ext2;

    move_uploaded_file($file1, "../../uploads/$file_name1");
    move_uploaded_file($file2, "../../uploads/$file_name2");


if (empty($name) || empty($price) || empty($model_year) || empty($seat) || empty($vehicle_no)  ||  empty($description) || empty($category_id)) {
    setError('You must fill all the fields!');
    header("Location: create.php");
    die;
}


if (!is_numeric($price)) {
    setError('Price must be a number!');
    header("Location: create.php");
    die;
}

if ($price <= 0) {
    setError('Price must be above Rs. 0!');
    header("Location: create.php");
    die;
}

$presentdate = date('Y');
if ($presentdate < $model_year) {
    setError("Your year is Invalid");
    header('Location: create.php');
    die;

}

if (!is_numeric($model_year)) {
    setError('Model Year must be a number!');
    header("Location: create.php");
    die;
}


$vehicle = where('vehicles', 'vehicle_no', '=', $vehicle_no, false);

if ($vehicle) {
    setError("Vehicle no has already been registered!");
    header("Location: create.php");
    die;
}

$owner_vehicle = where('owner_vehicle', 'vehicle_no', '=', $vehicle_no, false);

if ($owner_vehicle) {
    setError("Vehicle no has already been registered!");
    header("Location: create.php");
    die;
}

if (!is_numeric($seat)) {
    setError('Seat must be a number!');
    header("Location: create.php");
    die;
}

if ($seat <= 0) {
    setError('Seat must be above 0!');
    header("Location: create.php");
    die;
}

if ($seat >= 10) {
    setError('Seat must be below 10!');
    header("Location: create.php");
    die;
}

$category = find('categories', $category_id);
if (!$category) {
    setError('Invalid Brand ID!');
    header("Location: create.php");
    die;
}

$price = (int) $price;
$model_year = (int) $model_year;
$seat = (int) $seat;
$image = $file_name1;
$paper_work = $file_name2;


create('vehicles', compact('name', 'price', 'model_year','seat','vehicle_no', 'category_id', 'description', 'image','paper_work'));

setSuccess('Vehicle created successfully!');
header("Location: index.php");
