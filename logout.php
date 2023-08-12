<?php

require "db.php";

unset($_SESSION['user_id']);

// Back to login
header("Location: login.php");
