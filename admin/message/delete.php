<?php

require "../admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$contact = find('contact', $id);
if (empty($contact)) {
    die("Message not found!");
}

delete('contact', $id);

setSuccess('Message deleted!');
header("Location: index.php");
