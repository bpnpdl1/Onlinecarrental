<?php
require '../db.php';
require '../functions.php';

$user_id = $_SESSION['user_id'];
$user = find('users', $user_id);

$old_pass = request('oldpass');

$new_pass = request('npass');

$re_pass = request('cpass');

if (!password_verify($old_pass, $user['password'])) {
    setError('Password Incorrect!!');
    header('Location: ./changepassword.php');
    die;
}


if ($new_pass != $re_pass) {
    setError('Password not matched!!');
    header('Location: ./changepassword.php');
    die;
}

if (!empty($old_pass) && !empty($new_pass) & !empty($re_pass) && ($new_pass == $re_pass)) {
    update('users', $user_id, [
        'password' => password_hash($new_pass, PASSWORD_DEFAULT)
    ]);
    setSuccess('Password Changed!!');
    header('Location: ./changepassword.php');
    die;
}


?>