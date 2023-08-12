<?php require_once __DIR__ . "/../admin.php"; ?>
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

<?php require "../header.php"; ?>

<div class="d-flex justify-content-between mb-4">
    <h3>Brands</h3>
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $categories = all('categories');

        foreach ($categories as $item) :
        ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
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

<div class="d-flex justify-content-between mb-4 mt-5">
    <h3> Owner Brands</h3>
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $categories = all('owner_brand');

        foreach ($categories as $item) :
        ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="owner_show.php?id=<?php echo $item['id']; ?>">
                        Show
                    </a>

                    <a class="btn btn-danger btn-sm" href="#!" onclick="ConfirmDelete(<?php echo $item['id']; ?>)">
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

    function ConfirmDelete(id) {
        if (confirm('Are you sure you want to delete this?')) {
            location.href = 'owner_delete.php?id=' + id;
        }
    }
</script>
<?php require "../footer.php"; ?>