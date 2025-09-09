<?php
// admin/logout.php - Admin Logout
require_once '../config/session.php';
require_once '../classes/User.php';

$user = new User(null);
$user->logout();

header("Location: login.php");
exit();
?>