<?php require_once __DIR__ . "/../admin.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HCR Admin - Message</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo $page_url; ?>vendor/fontawesome/css/all.min.css">
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php require "../header.php";

$id = request('id');
if (empty($id)) {
    die("Please provide ID!");
}

$contact = find('contact', $id);
if (empty($contact )) {
    die("Message Not Found!");
}

?>
<div class="d-flex justify-content-between mb-4">
    <h3>Message</h3>
</div>

<p>ID: <?php echo $contact['id']; ?></p>
<p>Name: <?php echo $contact['name']; ?></p>
<p>Email: <?php echo $contact['email']; ?></p>
<p>Message: <?php echo $contact['message']; ?></p>

<?php require "../footer.php"; ?>