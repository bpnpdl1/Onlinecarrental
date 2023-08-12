<?php
$pageTitle = "Car listing | CarRental";

// Include the header file
include "header.php";

$search = request('search');

?>

<section id="contact" class="contact">
    <br>

    <form class="d-flex mt-3 float-end mx-3" style="max-width: 300px;margin:auto">
        <input class="form-control me-2" type="search" name="search" id="form1" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary btn-sm" for="form1" type="submit">Search</button>
    </form>

    <form class="d-flex mt-3 float-start mx-3" style="max-width: 160px;margin:auto" action="" method="GET">
        <select name="sort_numeric" class="form-select">
                                            <option value="">Filter</option>
                                            <option value="low-high" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "low-high") { echo "selected"; } ?> > Low - High</option>
                                            <option value="high-low" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "high-low") { echo "selected"; } ?> > High - Low</option>
                                        </select>
        <button class="btn btn-primary ms-2 btn-sm" for="form1" type="submit">Filter</button>
    </form>
    <br>
    <br>
    <div class="mx-auto mt-4 section-title" style="width: 500px;">
        <h2>FIND THE RIGHT CAR FOR YOU.</h2>
    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

            <?php

            $result = query("SELECT * FROM `vehicles` WHERE (`name` LIKE '%" . $search . "%')");
            if (empty($result)) {
                ('<br>
            <br>
            <br>
            ');
            }
            foreach ($result as $item) :
                $category = find('categories', $item['category_id']);
            ?>

                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate mx-auto my-4">
                        <div class="img rounded d-flex align-items-end">
                            <img src="uploads/<?php echo $item['image']; ?> " class="card-img-top" alt="..."  style="height:15rem;">
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

            $result1 = query("SELECT * FROM `owner_vehicle` WHERE (`name` LIKE '%" . $search . "%')");
            if (empty($result1)) {
                ('<br>
                <br>
                <br>
                ');
            }

            foreach ($result1 as $item) :

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



<?php
if (empty($result)) {
    echo '<p style="height:50vh;"> </p>';
}
require 'footer.php'; ?>