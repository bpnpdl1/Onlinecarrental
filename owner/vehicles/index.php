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
    <div id="wrapper">

<?php require  "../header.php"; ?>
<div class="d-flex justify-content-between mb-4">
    <h3>Vehicles</h3>
    <a href="create.php" class="btn btn-primary mx-2">Create</a>
</div>

<?php if (hasSuccess()) : ?>
    <div class="alert alert-success">
        <?php echo getSuccess(); ?>
    </div>
<?php endif; ?>


<table class="table" style="color: #303130;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price Per day</th>
            <th>Model Year</th>
            <th>Seat</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

$vehicles = query('SELECT * FROM `owner_vehicle` where user_id='.user()['id']);

        foreach ($vehicles as $item) :

            $category = find('owner_brand', $item['owner_brand_id'] );
        ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td> Rs. <?php echo $item['price']; ?></td>
                <td> <?php echo $item['model_year']; ?></td>
                <td> <?php echo $item['seat']; ?></td>
                <td>
                    <img height="70px" src="../../uploads/<?php echo $item['image']; ?> ">
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="show.php?id=<?php echo $item['id']; ?>">
                        Show
                    </a>

                    <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $item['id']; ?>">
                        Edit
                    </a>

                    <a class="btn btn-danger btn-sm" href="#!" onclick="confirmDelete(<?php echo $item['id']; ?>)">
                        Delete
                    </a>

                </td>
            </tr>

        <?php endforeach; ?>


    </tbody>
</table>


<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this?')) {
            location.href = 'delete.php?id=' + id;
        }
    }
</script>
<?php require "../footer.php"; ?>