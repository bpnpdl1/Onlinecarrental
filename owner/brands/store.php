<?php

require "../owner.php";
$user = find('users', $user_id);

$user_id = $_SESSION['user_id'];
$name = request('name');


if (empty($user_id) || empty($name)){
    setError('You must fill all the fields!');
    header("Location: create.php");
    die;
}


create('owner_brand', compact('user_id', 'name'));

setSuccess('Brand created successfully!');
header("Location: index.php");
