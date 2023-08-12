<?php require_once __DIR__ . "/../admin.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HCR Admin - Brands</title>

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

$category = find('owner_brand', $id);
if (empty($category )) {
    die("Brand Not Found!");
}
//id of user who has added brand
$result_id = $category['user_id'];

//finding name and email of user who has added brand
$user_result = find('users', $result_id);
?>
<div class="d-flex justify-content-between mb-4">
    <h3>Brand Details</h3>
    <a href="index.php" class="btn btn-primary mx-2">Go Back</a>
</div>

<p>ID: <?php echo $category['id']; ?></p>
<p>User ID: <?php echo $category['user_id']; ?></p>
<p>Owner Name: <?php echo $user_result['name'];; ?></p>
<p>Name: <?php echo $category['name']; ?></p>


<?php require "../footer.php"; ?>