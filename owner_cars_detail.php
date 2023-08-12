<?php
$pageTitle = "Hamro Car Rental";

// Include the header file
include "header.php";
check_user();

?>
<br>
<br>
<br>
<br>
<body>
    <?php 

    $id = request('id');
    if (empty($id)) {
        die("Please provide ID!");
    }

    $vehicle = find('owner_vehicle', $id);
    if (empty($vehicle)) {
        die("Vehicle Not Found!");
    }


    //id of user who has added vehicle
    $result_id = $vehicle['user_id'];

    //finding name and email of user who has added vehicle
    $user_result = find('users', $result_id);

    $rsql = "SELECT*FROM owner_booking WHERE vehicle_id=$id  ORDER BY from_date DESC";
    $rents = query($rsql);

    ?>
   <div class="container">

        <div class="float-end mt-5">
            <?php if (hasError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getError(); ?>
                </div>
            <?php endif; ?>
            <?php if (hasSuccess()) : ?>
                <div class="alert alert-success">
                    <?php echo getSuccess(); ?>
                </div>
            <?php endif; ?>
            <div class="widget_heading bg-black text-white ">
                <h5 class="mx-2"><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
            </div>
            <form method="post" action="owner_book.php?cid=<?php echo $id; ?>&oid=<?php echo $user_result['id'] ?>">
            <div class="form-group">From:
                    <input type="date" class="form-control" name="from_date" id="d1" min="<?php echo date('Y-m-d'); ?>" max="<?php $update = date('Y-m-d', strtotime($date . ' + 10 day'));
                                                                                                                                echo $update;
                                                                                                                                ?>" placeholder="From Date(dd/mm/yyyy)" required>
                </div>
                <div class="form-group mt-2"> To:
                    <input type="date" class="form-control" name="to_date" id="d2" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime($date . ' + 2 months'));; ?>" placeholder="To Date(dd/mm/yyyy)" required>
                </div>
                <div class="form-group mt-2">
                    <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                </div>
                <button type="submit" name="credit" class="btn btn-primary mt-3 mx-3" style="border-radius: 15px;">
                    Book
                </button>  
                <button id="payment-button" type="submit" class="btn btn-primary" name="khalti">Pay with Khalti</button> 
            </form>
        </div>

        <div class="col-4 d-flex align-items-center float-end mt-5">
            <ul class="list-group" style="font-size: large ;">
                <li class="list-group-item"><b>Latest Rental Booked dates</b></li>
                <?php
                $flag = 0;
                foreach ($rents as $rent) {
                    $flag++;
                    $fromdate = date('Y-M-d', strtotime($rent['from_date']));
                    $todate = date('Y-M-d', strtotime($rent['to_date']));
                ?>

                    <li class="list-group-item"><?php echo "From " . $fromdate . " To " . $todate  ?></li>

                <?php
                    if ($flag == 5) {
                        break;
                    }
                } ?>

            </ul>
        </div>

        <div class="float-left mt-3">
            <div class="d-flex justify-content-between mb-4 mx-2">
                <h3>Vehicle Details</h3>
            </div>

            <div class="mx-2">
                <p>Name: <?php echo $vehicle['name']; ?></p>
                <p>Owner Name: <?php echo $user_result['name'];; ?></p>
                <p>Price: <?php echo $vehicle['price']; ?></p>
                <p>Model Year: <?php echo $vehicle['model_year']; ?></p>
                <p>Seats: <?php echo $vehicle['seat']; ?></p>
                <p>Vehicle Number: <?php echo $vehicle['vehicle_no']; ?></p>
                <p>Brand: <?php
                            $category = find('owner_brand', $vehicle['owner_brand_id']);

                            echo $category['name'];

                            ?></p>
                <p>Description: <?php echo $vehicle['description']; ?></p>
                <h5 enctype="multipart/form-data">Image:</h5><img class="mt-2 mx-3" height="300px" src="uploads/<?php echo $vehicle['image']; ?> ">
                <h5 class="mt-4" enctype="multipart/form-data">Vehicle Paper:</h5><img class="mt-2 mx-3" height="450px" src="uploads/<?php echo $vehicle['paper_work']; ?> ">
            </div>

        </div>

    </div>

    <script>
        var btn = document.getElementById('btninfo');
        var div = document.getElementById('div');
        var viewmore = document.getElementById('viewmore');
        var date = document.getElementById('date');
        var d1 = document.getElementById('d1').value;
        var d2 = document.getElementById('d2').value;

        function moreinfo() {
            if (div.style.display == 'none') {
                div.style.display = 'block';
                viewmore.innerHTML = 'Show Less';
            } 
            else {
                div.style.display = 'none';
                viewmore.innerHTML = 'View more';
            }
        }

       
    </script>
    
</body>

<?php require "footer.php"; ?>