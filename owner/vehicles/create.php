<?php require_once __DIR__ . "/../owner.php";
$user_id = $_SESSION['user_id'];
$user = find('users', $user_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HCR Owner - Vehicles</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo $page_url; ?>vendor/fontawesome/css/all.min.css">
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper" style="color: #303130;">

        <?php require  "../header.php"; ?>
        <div class="d-flex justify-content-between mb-4">
            <h3>Add New Vehicle</h3>
            <a href="index.php" class="btn btn-primary mx-2">Go Back</a>
        </div>

        <?php if (hasError()) : ?>
            <div class="alert alert-danger">
                <?php echo getError(); ?>
            </div>
        <?php endif; ?>

        <form action="store.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="owner_brand_id">Brand</label>
                <select id="owner_brand_id" name="owner_brand_id" class="form-control">
                    <?php $categories =query('SELECT * FROM `owner_brand` where user_id='.user()['id']);
                    foreach ($categories as $item) : ?>
                        <option value="<?php echo $item['id']; ?>">
                            <?php echo $item['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price Per day</label>
                <input type="text" id="price" name="price" class="form-control">
            </div>

            <div class="form-group">
                <label for="model_year">Model Year</label>
                <input type="text" id="model_year" name="model_year" class="form-control">
            </div>

            <div class="form-group">
                <label for="seat">Seat</label>
                <input type="text" id="seat" name="seat" class="form-control">
            </div>


            <div class="form-group">
                <label for="vehicle_no">Vehicle Number</label>
                <input type="text" id="vehicle_no" name="vehicle_no" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>


            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>

 
            <div class="form-group">
                <label for="paper_work">Vehicle Paper</label>
                <input type="file" id="paper_work" name="paper_work" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary mx-2">
                <i class="fas fa-save mr-2"></i>
                Save
            </button>

        </form>

        <?php require  "../footer.php"; ?>