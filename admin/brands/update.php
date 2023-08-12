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

if (empty($name)) {
    setError("Please provide Name!");
    header("Location: edit.php?id=$id");
    die;
}



update('categories', $id, compact('name'));

setSuccess('Brand updated!');
header("Location: index.php");