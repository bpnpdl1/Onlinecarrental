<?php

function redirect($url)
{
    header("Location: /Onlinecarrental/$url");
    die;
}

function setSuccess($text)
{
    $_SESSION['success'] = $text;
}

function hasSuccess()
{
    return !empty($_SESSION['success']);
}

function getSuccess()
{
    $msg = $_SESSION['success'] ?? '';
    unset($_SESSION['success']);
    return $msg;
}

function setError($error)
{
    $_SESSION['error'] = $error;
}

function hasError()
{
    return !empty($_SESSION['error']);
}

function getError()
{
    $err = $_SESSION['error'] ?? '';
    unset($_SESSION['error']);

    return $err;
}

function is_admin()
{
    $admin = admin();

    if (empty($admin)) {
        return false;
    }

    if ($admin['role'] != "Admin") {
        return false;
    }

    return true;
}

function check_admin()
{
    if (!is_admin()) {
        // die("You do not have permission to view this page!"); 
        $login = "http://localhost/Onlinecarrental/adminlogin.php";
        Header("Location: " . $login);
    }
}


function is_user()
{
    $user = user();

    if (empty($user)) {
        return false;
    }

    if ($user['role'] != "Renter") {
        return false;
    }
    return true;
}

function check_user()
{
    if (!is_user()) {
        $login = "http://localhost/Onlinecarrental/login.php";
        Header("Location: " . $login);
    }
}


function is_owner()
{
    $user = user();

    if (empty($user)) {
        return false;
    }

    if ($user['role'] != "Owner") {
        return false;
    }
    return true;
}

function check_owner()
{
    if (!is_owner()) {
        $login = "http://localhost/Onlinecarrental/login.php";
        Header("Location: " . $login);
    }
}

/**
 * Validate Name accept character only
 *
 * @param string $name name
 *
 * @return true
 */
function validateName($name)
{
    return preg_match("/^[a-zA-Z]{3,}(?: [a-zA-Z]+){0,2}$/", $name);
};

/**
 * Validate Phone Number +977 and 97 && 98
 *
 * @param string $phone phone
 *
 * @return true
 */

function validatePhone($phone)
{
    return preg_match('/^\+?(?:977)?[ -]?(?:(?:(?:98|97)-?\d{8})|(?:01-?\d{7}))$/', $phone);
};


function sub_dates($date2,$date1){
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    $diff = abs($date2 - $date1);
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24)/(30*60*60*24)); 
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
    return $days;
}

?>