<?php

require "../admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$vehicles = find('vehicles', $id);
if (empty($vehicles)) {
    die("vehicles not found!");
}

delete('vehicles', $id);

setSuccess('Vehicle deleted!');
header("Location: index.php");
