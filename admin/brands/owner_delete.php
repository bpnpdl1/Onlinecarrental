<?php

require "../admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$category = find('owner_brand', $id);
if (empty($category)) {
    die("Brand not found!");
}


delete('owner_brand', $id);

setSuccess('Brand deleted!');
header("Location: index.php");
