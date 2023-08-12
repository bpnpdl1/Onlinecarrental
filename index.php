<?php

$pageTitle = "CarRental";

// Include the header file
include "header.php";
?>


<?php include "carousel.php"; ?>
<main id="main">


</main><!-- End #main -->





<h2 class="mt-5 text-center">FIND THE RIGHT CAR FOR YOU.</h2>

<div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
        <?php

        $vehicles = all('vehicles');

        foreach ($vehicles as $item) :

            $category = find('categories', $item['category_id']);
        ?>

            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate mx-auto my-4">
                    <div class="img rounded d-flex align-items-end">
                        <img src="uploads/<?php echo $item['image']; ?> " class="card-img-top" alt="..." style="height:15rem;">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="cars_detail.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h2>
                        <ul class="row row-cols-lg-auto g-3 align-items-left" style="list-style-type: none;">
                            <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $item['model_year']; ?> Model</li>
                            <li><i class="fa fa-user" aria-hidden="true"></i><?php echo $item['seat']; ?> Seats</li>
                            <li><i class="as fa-money-bill-wave"></i><strong>NRS: <?php echo $item['price']; ?>/Day</strong> </li>
                        </ul>
                        <p class="d-flex mb-0 d-block "><a href="cars_detail.php?id=<?php echo $item['id']; ?>" class="btn btn-primary py-2 mr-1 me-4">Book now</a>
                            <a href="cars_detail.php?id=<?php echo $item['id']; ?>" class="btn btn-secondary py-2 ml-1">Details</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


        <?php

        $owner_vehicles = all('owner_vehicle');

        foreach ($owner_vehicles as $item) :

            $owner_brand = find('owner_brand', $item['owner_brand_id']);
        ?>

            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate mx-auto my-4">
                    <div class="img rounded d-flex align-items-end">
                        <img src="uploads/<?php echo $item['image']; ?> " class="card-img-top" alt="..." style="height:15rem;">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="owner_cars_detail.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h2>
                        <ul class="row row-cols-lg-auto g-3 align-items-left" style="list-style-type: none;">
                            <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $item['model_year']; ?> Model</li>
                            <li><i class="fa fa-user" aria-hidden="true"></i><?php echo $item['seat']; ?> Seats</li>
                            <li><i class="as fa-money-bill-wave"></i><strong>NRS: <?php echo $item['price']; ?>/Day</strong> </li>
                        </ul>
                        <p class="d-flex mb-0 d-block "><a href="owner_cars_detail.php?id=<?php echo $item['id']; ?>" class="btn btn-primary py-2 mr-1 me-4">Book now</a>
                            <a href="owner_cars_detail.php?id=<?php echo $item['id']; ?>" class="btn btn-secondary py-2 ml-1">Details</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>


<?php include "footer.php"; ?>