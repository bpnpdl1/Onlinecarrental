<?php
$pageTitle = "Admin | CarRental";

// Include the header file
include "header.php";

if (!empty($_POST)) {

    $email = request('email');
    $password = request('password');

    if (empty($email) || empty($password)) {
        setError("Please fill both fields!");
        redirect('adminlogin.php');
    }

    $admin = where('admins', 'email', '=', $email, false);

    if (empty($admin)) {
        setError("No Admin found with given email address");
        redirect('adminlogin.php');
    }

    if (password_verify($password, $admin['password'])) {

        $_SESSION['admin_id'] = $admin['id'];

        if ($admin['role'] == "Admin") {
            header("Location: admin/index.php");
        }
    } else {
        setError("Invalid Email or Password!");
        redirect('adminlogin.php');
    }
}

?>


<body>
<br>
    <section id="contact" class="contact">
        <br>
        <div class="container">

            <div class="section-title">
                <h2>Admin Login</h2>
            </div>

            <div class="row" data-aos-delay="100">

                <div class="card" style="max-width: 550px;margin:auto">
                    <div class="card-body">
                        <div class="card-body">
                            <?php if (hasError()) : ?>
                                <div class="alert alert-danger">
                                    <?php echo getError(); ?>
                                </div>
                            <?php endif; ?>

                            <form action="adminlogin.php" method="post">

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <button type="submit" class="text-white" style="border-radius: 15px; background-color: #e03a3c;">
                                    Log In
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>