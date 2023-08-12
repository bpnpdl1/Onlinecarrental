<?php require_once __DIR__ . "/admin.php"; 

$admin_id = $_SESSION['admin_id'];
$admin = find('admins', $admin_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HCR Admin - Change Password </title>
    
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

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
        <h3>Change Passsword</h3>
        <a href="index.php" class="btn btn-primary mx-2">Go Back</a>
    </div>

    <div class="card overflow-hidden mt-3">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item" href="./changepassword.php">Change Password</a>
                </div>
            </div>
            <div class="col-md-9">
                <form method="POST" action="./password.inc.php" class="tab-content ">
                    <div class="">
                        <div class="card-body pb-2">

                            <div class="form-group">
                                <label class="form-label">Current password</label>
                                <input name="oldpass" type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">New password</label>
                                <input name="npass" type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Repeat new password</label>
                                <input name="cpass" type="password" class="form-control">
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