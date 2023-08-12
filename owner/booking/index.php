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

    <title>HCR Admin - Booking</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo $page_url; ?>vendor/fontawesome/css/all.min.css">
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require  "../header.php"; ?>
        <div class="d-flex justify-content-between mb-4">
            <h3>Booking</h3>
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
                    <th>User</th>
                    <th>User Email</th>
                    <th>Vehicle</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Message</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $booking = query('SELECT * FROM `owner_booking` where owner_id='.user()['id']);
                // $vehicles = query('SELECT * FROM `owner_vehicle` where user_id='.user()['id']);

                foreach ($booking as $item) :
                    $vehicle = find('owner_vehicle', $item['vehicle_id']);
                    $user = find('users', $item['user_id']);
                ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><a href="../vehicles/show.php?id=<?php echo $vehicle['id']; ?>"><?php echo $vehicle['name']; ?></a></td>
                        <td><?php echo $item['from_date']; ?></td>
                        <td><?php echo $item['to_date']; ?></td>
                        <td><?php echo $item['message']; ?></td>
                        <td><?php echo $item['payment_method'] ?></td>
                        <td><?php echo $item['status']; ?></td>
                        <td>
                            <?php if ($item['status'] != 'booked') : ?>
                                <a class="btn btn-primary btn-sm" href="confirm.php?id=<?php echo $item['id']; ?>">
                                    confirm
                                </a>
                            <?php endif; ?>
                            <?php if ($item['status'] == 'booked') : ?>
                                <svg class="mx-3 my-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" />
                                </svg>
                            <?php endif ?>

                            <?php if ($item['status'] != 'cancelled') : ?>
                                <a class="btn btn-warning btn-sm" href="cancel.php?id=<?php echo $item['id']; ?>">
                                    cancel
                                </a>
                            <?php endif; ?>
                            <?php if ($item['status'] == 'cancelled') : ?>
                                <svg class="mx-3 my-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" />
                                </svg>
                            <?php endif ?>
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