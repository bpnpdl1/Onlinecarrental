<?php

require "../owner.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$vehicles = find('owner_vehicle', $id);
if (empty($vehicles)) {
    die("vehicles not found!");
}



delete('owner_vehicle', $id);

setSuccess('Vehicle deleted!');
header("Location: index.php");
