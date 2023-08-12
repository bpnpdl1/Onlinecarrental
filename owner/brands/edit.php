<?php require_once __DIR__ . "/../owner.php";
$user_id = $_SESSION['user_id'];
$user = find('users', $user_id); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HCR Owner - Brands</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo $page_url; ?>vendor/fontawesome/css/all.min.css">
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper" style="color: #303130;">

    <?php require  "../header.php"; 


$id = request('id');

if (empty($id)) {
    die("Please provide ID!");
}

$category = find('owner_brand', $id);
if (empty($category)) {
    die("Brand not found!");
}

?>

<div class="d-flex justify-content-between mb-4">
    <h3>Edit Brand</h3>
    <a href="index.php" class="btn btn-primary mx-2">Go Back</a>
</div>

<?php if (hasError()) : ?>
    <div class="alert alert-danger">
        <?php echo getError(); ?>
    </div>
<?php endif; ?>

<form action="update.php?id=<?php echo $id; ?>" method="POST">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $category['name']; ?>">
    </div>



    <button type="submit" class="btn btn-primary mx-2">
        <i class="fas fa-save mr-2"></i>
        Save
    </button>

</form>



<?php require "../footer.php"; ?>