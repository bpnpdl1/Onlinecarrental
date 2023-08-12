<?php
require '../db.php';
require '../functions.php';


// $rntsql1="SELECT * FROM booking";
// $rntsql2="SELECT * FROM owner_booking";
// $rentid1=query($rntsql1,false);
// $rentid2=query($rntsql2,false);
// $rentid1=$rentid1['id'];
// $rentid2=$rentid2['id'];

?>

<!DOCTYPE html>
<html lang="en">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/all.min.css" rel="stylesheet">
    <title>My Booking</title>
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
                    <a class="list-group-item" href="./mybooking.php">My Bookings</a>
                </div>
            </div>

        </div>
    </div>


    <p class="h3 font-weight-bold mt-4">Your Bookings</p>
    <hr>
    <div class="container">
        <div>
            <div class="d-flex flex-wrap gap-3">
                <?php

                $result = where('booking', 'user_id', '=', $_SESSION['user_id']);
                $user_id = $_SESSION['user_id'];

                $result = query("SELECT * FROM booking WHERE (user_id = $user_id AND status = 'booked')");

                foreach ($result as $key) :
                    $vehicle = find('vehicles', $key['vehicle_id']);
                    $category_id = $vehicle['category_id'];
                ?>
                    <div class="card col-md-3 hover-shadow border rounded mb-5">
                        <div class="">
                            <img src="../uploads/<?php echo $vehicle['image']; ?>" class="img-fluid w-100 rounded" />

                        </div>

                        <div class="card-body " style="color: #4a4a4a;">
                            <h5 class="card-title"><?php echo $vehicle['name'] ?></h5>
                            <p>Price per day: <?php echo $vehicle['price']; ?></p>
                            <p>Model Year: <?php echo $vehicle['model_year']; ?></p>
                            <p>Seats: <?php echo $vehicle['seat']; ?></p>
                            <p>Vehicle Number: <?php echo $vehicle['vehicle_no']; ?></p>
                            <p>Brand: <?php
                                        $category = find('categories', $vehicle['category_id']);

                                        echo $category['name'];

                                        ?></p>

                            <?php
                            $booking =  query("SELECT * FROM booking WHERE (user_id = $user_id AND status = 'booked')");
                            foreach ($booking as $data) {

                            ?>
                                <p>From: <?php echo $data['from_date']; ?></p>
                                <p>To: <?php echo $data['to_date']; ?></p>
                                <p>Status: <?php echo $data['status']; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div>
                        <a href="cancelrent.php?id=<?php echo $data['id']; ?> " onclick="confirmDelete(<?php echo $data['id']; ?>)" class="btn btn-md btn-danger">Cancel Booking</a>
                        <br>
                    </div>

                <?php endforeach;
                ?>


            </div>
        </div>

        <div>
            <div class="d-flex flex-wrap gap-3">
                <?php

                $result = where('owner_booking', 'user_id', '=', $_SESSION['user_id']);
                $user_id = $_SESSION['user_id'];
                $result = query("SELECT * FROM owner_booking WHERE (user_id = $user_id AND status = 'booked')");
                // die;

                foreach ($result as $key) :
                    $vehicle = find('owner_vehicle', $key['vehicle_id']);
                    $category_id = $vehicle['owner_brand_id'];
                ?>
                    <div class="card col-md-3 hover-shadow border rounded mb-5">
                        <div class="">
                            <img src="../uploads/<?php echo $vehicle['image']; ?>" class="img-fluid w-100 rounded" />

                        </div>

                        <div class="card-body " style="color: #4a4a4a;">
                            <h5 class="card-title"><?php echo $vehicle['name'] ?></h5>
                            <p>Price per day: <?php echo $vehicle['price']; ?></p>
                            <p>Model Year: <?php echo $vehicle['model_year']; ?></p>
                            <p>Seats: <?php echo $vehicle['seat']; ?></p>
                            <p>Vehicle Number: <?php echo $vehicle['vehicle_no']; ?></p>
                            <p>Brand: <?php
                                        $category = find('owner_brand', $vehicle['owner_brand_id']);

                                        echo $category['name'];

                                        ?></p>

                            <?php
                            $booking =  query("SELECT * FROM owner_booking WHERE (user_id = $user_id AND status = 'booked')");
                            foreach ($booking as $data) {

                            ?>
                                <p>From: <?php echo $data['from_date']; ?></p>
                                <p>To: <?php echo $data['to_date']; ?></p>
                                <p>Status: <?php echo $data['status']; ?></p>
                            <?php } ?>
                        </div>
                    </div>

                    <div>
                        <a href="cancelownerrent.php?id=<?php echo $data['id']; ?> " onclick="confirmDelete(<?php echo $data['id']; ?>)" class="btn btn-md btn-danger">Cancel Booking</a>
                        <br>
                    </div>
                <?php endforeach;
                ?>
            </div>

        </div>





        <div>
            <div class="d-flex flex-wrap gap-3">
                <?php

                $result = where('booking', 'user_id', '=', $_SESSION['user_id']);
                $user_id = $_SESSION['user_id'];
                $result = query("SELECT * FROM booking WHERE (user_id = $user_id AND status = 'pending')");

                foreach ($result as $key) :
                    $vehicle = find('vehicles', $key['vehicle_id']);
                    $category_id = $vehicle['category_id'];
                ?>
                    <div class="card col-md-3 hover-shadow border rounded mb-5">
                        <div class="">
                            <img src="../uploads/<?php echo $vehicle['image']; ?>" class="img-fluid w-100 rounded" />

                        </div>

                        <div class="card-body " style="color: #4a4a4a;">
                            <h5 class="card-title"><?php echo $vehicle['name'] ?></h5>
                            <p>Price per day: <?php echo $vehicle['price']; ?></p>
                            <p>Model Year: <?php echo $vehicle['model_year']; ?></p>
                            <p>Seats: <?php echo $vehicle['seat']; ?></p>
                            <p>Vehicle Number: <?php echo $vehicle['vehicle_no']; ?></p>
                            <p>Brand: <?php
                                        $category = find('categories', $vehicle['category_id']);

                                        echo $category['name'];

                                        ?></p>

                            <?php
                            $booking =  query("SELECT * FROM booking WHERE (user_id = $user_id AND status = 'pending')");
                            foreach ($booking as $data) {

                            ?>
                                <p>From: <?php echo $data['from_date']; ?></p>
                                <p>To: <?php echo $data['to_date']; ?></p>
                                <p>Status: <?php echo $data['status']; ?></p>

                            <?php } ?>
                        </div>
                    </div>

                    <div>
                        <a href="cancelrent.php?id=<?php echo $data['id']; ?> " onclick="confirmDelete(<?php echo $data['id']; ?>)" class="btn btn-md btn-danger">Cancel Booking</a>
                        <br>
                    </div>
                <?php endforeach;
                ?>
            </div>
        </div>

        <div>
            <div class="d-flex flex-wrap gap-3">
                <?php

                $result = where('owner_booking', 'user_id', '=', $_SESSION['user_id']);
                $user_id = $_SESSION['user_id'];
                $result = query("SELECT * FROM owner_booking WHERE (user_id = $user_id AND status = 'pending')");
                // die;

                foreach ($result as $key) :
                    $vehicle = find('owner_vehicle', $key['vehicle_id']);
                    $category_id = $vehicle['owner_brand_id'];
                ?>
                    <div class="card col-md-3 hover-shadow border rounded mb-5">
                        <div class="">
                            <img src="../uploads/<?php echo $vehicle['image']; ?>" class="img-fluid w-100 rounded" />

                        </div>

                        <div class="card-body " style="color: #4a4a4a;">
                            <h5 class="card-title"><?php echo $vehicle['name'] ?></h5>
                            <p>Price per day: <?php echo $vehicle['price']; ?></p>
                            <p>Model Year: <?php echo $vehicle['model_year']; ?></p>
                            <p>Seats: <?php echo $vehicle['seat']; ?></p>
                            <p>Vehicle Number: <?php echo $vehicle['vehicle_no']; ?></p>
                            <p>Brand: <?php
                                        $category = find('owner_brand', $vehicle['owner_brand_id']);

                                        echo $category['name'];

                                        ?></p>

                            <?php
                            $booking =  query("SELECT * FROM owner_booking WHERE (user_id = $user_id AND status = 'pending')");
                            foreach ($booking as $data) {

                            ?>
                                <p>From: <?php echo $data['from_date']; ?></p>
                                <p>To: <?php echo $data['to_date']; ?></p>
                                <p>Status: <?php echo $data['status']; ?></p>
                            <?php } ?>
                        </div>
                    </div>

                    <div>
                        <a href="cancelownerrent.php?id=<?php echo $data['id']; ?> " onclick="confirmDelete(<?php echo $data['id']; ?>)" class="btn btn-md btn-danger">Cancel Booking</a>
                        <br>
                    </div>
                <?php endforeach;
                ?>
            </div>

        </div>

    </div>
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this?')) {
                location.href = 'cancelrent.php?id=' + id;
            }
        }

        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this?')) {
                location.href = 'cancelownerrent.php?id=' + id;
            }
        }
    </script>

</body>