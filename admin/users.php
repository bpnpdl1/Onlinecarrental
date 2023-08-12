<?php
$dbhost = "localhost"; // 127.0.0.1
$dbname = "cars";
$dbuser = "root";
$dbpass = "";

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$dsn = "mysql:host=" . $dbhost . ";dbname=" . $dbname;

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass, $options);
} catch (PDOException $e) {
    die("Cannot Connect to Database: " . $e->getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$data = $stmt->fetchALL();

?>

<?php require_once __DIR__ . "/admin.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hamro Car Rental Admin | Users</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4">Users</h1>

        </div>
        <!-- /.container-fluid -->

        <table class="table" style="color: #303130;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Phone</th>
                    <th>License</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $users = all('users');

                foreach ($users as $data) {

                ?>

                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['role']; ?></td>
                        <td><?php echo $data['phone']; ?></td>
                        <td>
                            <img height="70px" src="../uploads/<?php echo $data['license']; ?> ">
                        </td>
                        <td>
                            
                                                        <a class="btn btn-primary btn-sm" href="user_show.php?id=<?php echo $data['id']; ?>">
                                                            Show
                                                        </a>

                            <a class="btn btn-danger btn-sm" href="#!" onclick="confirmDelete(<?php echo $data['id']; ?>)">
                                Delete
                            </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- End of Main Content -->
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this?')) {
                location.href = 'delete.php?id=' + id;
            }
        }
    </script>
    <?php require 'footer.php'; ?>