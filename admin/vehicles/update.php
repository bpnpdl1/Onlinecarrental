<?php

require "../admin.php";

$id = request('id');

if (empty($id)) {
    die("Please provide ID");
}

$vehicle = find('vehicles', $id);
if (empty($vehicle)) {
    die("Vehicle not found!");
}


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
    header("Location: edit.php?id=$id");
    die;
}

if($type2 != "image/png" && $type2 != "image/jpeg" && $type2 != "image/gif" ){
    setError("Vehicle paper must be an image");
    header("Location: edit.php?id=$id");
    die;
}

$mb_size1 = $size / 1024 / 1024;
$mb_size2 = $size / 1024 / 1024;

    if ($mb_size1 > 5) {
        setError("Image should be less than 5 MB");
        header("Location: edit.php?id=$id");
        die;
    }
    if ($mb_size2 > 5) {
        setError("vehicle paper should be less than 5 MB");
        header("Location: edit.php?id=$id");
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



if (empty($name) || empty($price) || empty($model_year) || empty($seat) || empty($vehicle_no) || empty($description) || empty($category_id) ) {
    setError('You must fill all the fields!');
    header("Location: edit.php?id=$id");
    die;
}


if (!is_numeric($price)) {
    setError('Price must be a number!');
    header("Location: edit.php?id=$id");
    die;
}


if ($price <= 0) {
    setError('Price must be above Rs. 0!');
    header("Location: edit.php?id=$id");
    die;
}

$presentdate = date('Y');
if ($presentdate < $model_year) {
    setError("Your year is Invalid");
    header("Location: edit.php?id=$id");
    die;

}
if (!is_numeric($model_year)) {
    setError('Model Year must be a number!');
    header("Location: edit.php?id=$id");
    die;
}


if (!is_numeric($seat)) {
    setError('Seat must be a number!');
    header("Location: edit.php?id=$id");
    die;
}

if ($seat <= 0) {
    setError('Seat must be above 0!');
    header("Location:edit.php?id=$id");
    die;
}

if ($seat >= 10) {
    setError('Seat must be below 10!');
    header("Location: edit.php?id=$id");
    die;
}

$category = find('categories', $category_id);
if (!$category) {
    setError('Invalid Brand ID!');
    header("Location: edit.php?id=$id");
    die;
}

$price = (int) $price;
$model_year = (int) $model_year;
$seat = (int) $seat;
$image = $file_name1;
$paper_work = $file_name2;


$to_delete1 = "../../uploads/" . $vehicle['image'];
unlink($to_delete1);

$to_delete1 = "../../uploads/" . $vehicle['paper_work'];
unlink($to_delete2);

update('vehicles', $id, compact('name', 'price', 'model_year', 'seat','vehicle_no',  'description', 'category_id', 'image', 'paper_work'));

setSuccess('Vehicle updated!');
header("Location: index.php");

?>