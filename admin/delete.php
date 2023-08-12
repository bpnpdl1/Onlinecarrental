<?php require_once __DIR__ . "/admin.php"; 


$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$users = find('users', $id);
if (empty($users)) {
    die("User not found!");
}


delete('users', $id);

setSuccess('User deleted!');
header("Location: users.php");

?>