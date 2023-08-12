<?php

require "../owner.php";
$user = find('users', $user_id);

$id = request('id');
$user_id = $_SESSION['user_id'];
$name = request('name');


if (empty($id)) {
    die("Please provide ID");
}

$category = find('owner_brand', $id);
if (empty($category)) {
    die("Brand not found!");
}

if (empty($name)) {
    setError("Please provide Name!");
    header("Location: index.php");
    die;
}


update('owner_brand', $id, compact('user_id', 'name'));

setSuccess('Brand updated!');
header("Location: index.php");