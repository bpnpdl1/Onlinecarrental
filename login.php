<?php

$pageTitle = "Login | CarRental";

// Include the header file
include "header.php";

if (!empty($_POST)) {

    $email = request('email');
    $password = request('password');

    if (empty($email) || empty($password)) {
        setError("Please fill both fields!");
        redirect('login.php');
    }

    $user = where('users', 'email', '=', $email, false);

    if (empty($user)) {
        setError("No user found with given email address");
        redirect('login.php');
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        if ($user['role'] == "Owner") {
            header("Location: owner/index.php");
        } elseif (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            if ($user['role'] == "Renter") {
                header("Location: index.php");
            }
        } else {
            setError('Invalid username or password!');
            header("Location: login.php");
        }
    } else {
        setError("Invalid Email or Password!");
        redirect('login.php');
    }
}
?>

<body>
<br>
    <section id="contact" class="contact">
        <br>
        <div class="container"data-aos="fade-up">

            <div class="section-title">
                <h2>Login</h2>
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

                            <form action="login.php" method="post">

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
                            <div class="login d-flex text-center mt-3">
                                <p> <a href="reset/forgot-password.php" onclick="displaysignform()" class="text-decoration-none">Forgot password?</a></p>
                            </div>
                            <div class="login d-flex text-center mt-3">
                                <p>Don't have an account ? <a href="{{ url('/userregister') }}" onclick="displaysignform()" class="text-decoration-none">Sign up</a></p>
                            </div>

                            

                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php include "footer.php"; ?>