<?php require_once __DIR__ . "/admin.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HCR Admin - Users</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo $page_url; ?>vendor/fontawesome/css/all.min.css">
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php require "header.php";

$id = request('id');
if (empty($id)) {
    die("Please provide ID!");
}

$user = find('users', $id);
if (empty($user )) {
    die("User Not Found!");
}
?>

<div class="d-flex justify-content-between mb-4">
    <h3>User  Details</h3>
    <a href="users.php" class="btn btn-primary">Go Back</a>
</div>

<p>ID: <?php echo $user['id']; ?></p>
<p>Name: <?php echo $user['name']; ?></p>
<p>Email: <?php echo $user['email']; ?></p>
<p>Role: <?php echo $user['role']; ?></p>
<p>Phone: <?php echo $user['phone']; ?></p>

<h5  enctype="multipart/form-data">License:</h5><img class="mt-2 mx-3" height="300px" src="../uploads/<?php echo $user['license']; ?> ">
<?php require "footer.php"; ?>