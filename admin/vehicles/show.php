<?php require_once __DIR__ . "/../admin.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HCR Admin - Vehicles</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo $page_url; ?>vendor/fontawesome/css/all.min.css">
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php require "../header.php";

$id = request('id');
if (empty($id)) {
    die("Please provide ID!");
}

$vehicle = find('vehicles', $id);
if (empty($vehicle )) {
    die("Vehicle Not Found!");
}

?>
<div class="d-flex justify-content-between mb-4">
    <h3>Vehicle Details</h3>
    <a href="index.php" class="btn btn-primary">Go Back</a>
</div>

<p>ID: <?php echo $vehicle['id']; ?></p>
<p>Name: <?php echo $vehicle['name']; ?></p>
<p>Price: <?php echo $vehicle['price']; ?></p>
<p>Model Year: <?php echo $vehicle['model_year']; ?></p>
<p>Seats: <?php echo $vehicle['seat']; ?></p>
<p>Vehicle Number: <?php echo $vehicle['vehicle_no']; ?></p>
<p>Brand: <?php
                $category = find('categories', $vehicle['category_id']);

                echo $category['name'];

                ?></p>
<p>Description: <?php echo $vehicle['description']; ?></p>
<h5  enctype="multipart/form-data">Image:</h5><img class="mt-2 mx-3" height="300px" src="../../uploads/<?php echo $vehicle['image']; ?> ">
<h5 class="mt-4" enctype="multipart/form-data">Vehicle Paper:</h5><img class="mt-2 mx-3" height="450px" src="../../uploads/<?php echo $vehicle['paper_work']; ?> ">

<?php require "../footer.php"; ?>