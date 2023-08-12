<?php require_once __DIR__ . "/admin.php"; 

$admin_id = $_SESSION['admin_id'];
$admin = find('admins', $admin_id);

$old_pass = request('oldpass');

$new_pass = request('npass');

$re_pass = request('cpass');

if (!password_verify($old_pass, $admin['password'])) {
    setError('Password Incorrect!!');
    header('Location: ./profile.php');
    die;
}


if ($new_pass != $re_pass) {
    setError('Password not matched!!');
    header('Location: ./profile.php');
    die;
}

if (!empty($old_pass) && !empty($new_pass) & !empty($re_pass) && ($new_pass == $re_pass)) {
    update('admins', $admin_id, [
        'password' => password_hash($new_pass, PASSWORD_DEFAULT)
    ]);
    setSuccess('Password Changed!!');
    header('Location: ./profile.php');
    die;
}


?>