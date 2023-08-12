<?php

require "../admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$category = find('categories', $id);
if (empty($category)) {
    die("Brand not found!");
}


delete('categories', $id);

setSuccess('Brand deleted!');
header("Location: index.php");
