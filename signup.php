<?php
$pageTitle = "Signup | CarRental";

// Include the header file
include "header.php";

if (!empty($_POST)) {

    $name = request('name');
    $email = request('email');
    $password = request('password');
    $password_verify = request('password_verify');
    $phone = request('phone');
    $role = request('role');
    echo "<pre>";

    $file1 = $_FILES['license']['tmp_name'];
    $type1 = $_FILES['license']['type'];
    $size1 = $_FILES['license']['size'];


    if ($type1 != "image/png" && $type1 != "image/jpeg" && $type1 != "image/gif") {
        setError("License must be an image");
        header("Location: signup.php");
        die;
    }

    $mb_size1 = $size1 / 1024 / 1024;

    if ($mb_size1 > 5) {
        setError("License should be less than 5 MB");
        header("Location: signup.php");
        die;
    }

    $ext1 = match ($type1) {
        "image/png" => ".png",
        "image/jpeg" => ".jpeg",
        "image/gif" => ".gif",
    };


    $file_name1 = uniqid() . $ext1;

    move_uploaded_file($file1, "uploads/$file_name1");


    if (empty($name) || empty($email) || empty($password)  || empty($password_verify) || empty($phone)) {
        setError('You must fill all the fields!');
        header("Location: signup.php");
        die;
    }

    if (!validateName($name)) {
        setError("Enter valid name!!");
        header("Location: signup.php");
        die;
    }

    if (str_word_count($name) != 2) {
        setError("FirstName and LastName is required!");
        header("Location: signup.php");
        die;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setError("Please provide an valid email!");
        header("Location: signup.php");
        die;
    }

    $user = where('users', 'email', '=', $email, false);

    if ($user) {
        setError("Email has already been taken!");
        header("Location: signup.php");
        die;
    }

    if ($password != $password_verify) {
        setError("Password and Confirm Password do not match!");
        header("Location: signup.php");
        die;
    }

    if (strlen($password) < 8) {
        setError("Password must be 8 characters or more!");
        header("Location: signup.php");
        die;
    }

    if (!validatePhone($phone)) {
        setError("Enter valid phone!!");
        header("Location: signup.php");
        die;
    }
    if (strlen($phone) < 10) {
        setError("Phone no must be 10 characters!");
        header("Location: signup.php");
        die;
    }
    if (!is_numeric($phone)) {
        setError('Phone no must be a number!');
        header("Location: signup.php");
        die;
    }
    $license = $file_name1;


    create('users', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'phone' => $phone,
        'license' => $license,
        'role' => $role,
    ]);
    setSuccess("User Registerd Successfully!");
    Header("Location: signup.php");
    die;
}

?>

<body>
<br>
    <section id="contact"  class="contact">
        <br>
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Sign up</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="card" style="max-width: 550px;margin:auto">
                    <div class="card-body">
                        <div class="card-body">
                            <?php if (hasError()) : ?>
                                <div class="alert alert-danger">
                                    <?php echo getError(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (hasSuccess()) : ?>
                                <div id="success" class="ml-4 alert alert-success">
                                    <?php echo getSuccess(); ?>
                                </div>
                            <?php endif; ?>
                            <form action="signup.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>


                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="password_verify" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_verify" id="password_verify" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone no.</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="license">License</label><br>
                                    <input type="file" id="license" name="license" class="form-control-file">
                                </div>



                                <div class="mb-3">
                                    <label for="" class="form-label">Role</label>
                                    <select name="role" id="role">
                                        <option value="Renter">Renter</option>
                                        <option value="Owner">Owner</option>
                                    </select>
                                </div>

                                <button type="submit" class="text-white" style="border-radius: 15px; background-color: #e03a3c;">
                                    Sign up
                                </button>

                            </form>
                            <div class="login d-flex text-center mt-3">
                                <p>Already have an account ? <a href="login.php" onclick="displaysignform()">Log in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "footer.php"; ?>