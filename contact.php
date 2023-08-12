<?php
$pageTitle = "Contact | CarRental";

// Include the header file
include "header.php";

 ?>
 <br>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <br>
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6">

<div class="row">
  <div class="col-md-12">
    <div class="info-box">
      <i class="bx bx-map"></i>
      <h3>Our Address</h3>
      <p>Kawasoti, Nawalpur</p>
    </div>
  </div>
  <div class="col-md-6">
    <div class="info-box mt-4">
      <i class="bx bx-envelope"></i>
      <h3>Email Us</h3>
      <p>carrental@gmail.com<br>rentacar@gmail.com</p>
    </div>
  </div>
  <div class="col-md-6">
    <div class="info-box mt-4">
      <i class="bx bx-phone-call"></i>
      <h3>Call Us</h3>
      <p>078 542662 <br>078 567721</p>
    </div>
  </div>
</div>

</div>

<div class="col-lg-6">
<form action="forms/contact.php" method="post" role="form" class="php-email-form">
  <div class="row">
    <div class="col form-group">
      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
    </div>
    <div class="col form-group">
      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
    </div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
  </div>
  <div class="form-group">
    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
  </div>
  <div class="my-3">
    <div class="loading">Loading</div>
    <div class="error-message"></div>
    <div class="sent-message">Your message has been sent. Thank you!</div>
  </div>
  <div class="text-center"><button type="submit">Send Message</button></div>
</form>
</div>

</div>

</div>
</section><!-- End Contact Section -->

    <?php include "footer.php"; ?>