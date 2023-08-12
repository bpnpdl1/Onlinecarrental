<?php
require_once __DIR__ . "/../owner.php";
$user_id = $_SESSION['user_id'];
$user = find('users', $user_id);


?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="<?php echo $page_url; ?>vendor/fontawesome/css/all.min.css">
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">
    <title>General Setting</title>
</head>

<body style="color: #303130;">

<?php if (hasError()) : ?>
    <div id="error" class="ml-4 alert alert-danger">
        <?php echo getError(); ?>
    </div>
<?php endif; ?>
<?php if (hasSuccess()) : ?>
    <div id="success" class="ml-4 alert alert-success">
        <?php echo getSuccess(); ?>
    </div>
<?php endif; ?>
<div class="d-flex justify-content-between mb-4 mt-4">
            <h3>Account settings</h3>
            <a href="../index.php" class="btn btn-primary mx-2">Go Back</a>
        </div>

<div class="card overflow-hidden mt-3">
    <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
            <div class="list-group list-group-flush account-settings-links">
                <a class="list-group-item" href="./index.php">General</a>
                <a class="list-group-item" href="./changepassword.php">Change Password</a>
            </div>
        </div>
        <div class="col-md-9">
            <form method="POST" action="./update.php" class="tab-content ">
                <div class="">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control mb-1" value="<?php echo $user['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">E-mail</label>
                            <input type="text" name="email" class="form-control mb-1" value="<?php echo $user['email'] ?>">
                        </div>

                 <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="number" name="phone" class="form-control" value="<?php echo $user['phone'] ?>">
                        </div>
                    </div>

                </div>
                <div class="text-right mt-3 mx-4 my-4 mb-5">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
