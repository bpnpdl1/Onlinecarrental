<?php
session_start();
$pageTitle = "Hamro Car Rentals";

$link='booksuccess.php';
echo $link;


// Include the header file
include "header.php";




?>
<br>
<br>
<br>
<br>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <div class="container">

        <!-- <div class="float-end mt-5">
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
          
        </div> -->
        <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p class="mb-4">Please wait...</p>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>

   
     

    </div>

 

    <script>
   
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_0332449de3664be9922e3809d666fb63",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);

                    $(document).ready(function() {
   $("#loadingModal").modal('show');
    });


                    $.ajax({
                    url: "./khaltistore.php", // PHP script to process the data
                    type: "POST",
                    data: { input: payload }, // Data to be sent to the server
                    success: function(response) {
                        
                        console.log(response);
                        // Display response in the target div
                  window.location.href = "<?php echo $link ?>";


                    },
                    error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
                });
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");

        checkout.show({amount: <?php echo $_SESSION['data']['totalamount']; ?>});
       
    </script>
    




<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="assets/JS/script.js"></script>

</body>

</html>
