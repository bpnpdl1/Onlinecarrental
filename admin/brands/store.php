<?php

require "../admin.php";

$name = request('name');

if (empty($name)){
    setError('You must fill all the fields!');
    header("Location: create.php");
    die;
}


create('categories', compact('name'));

setSuccess('Brand created successfully!');
header("Location: index.php");
