<?php
session_start();
include 'function.inc.php';
unset($_SESSION['IS_LOGIN']);
unset($_SESSION['USER_NAME']);
redirect('login.php');
?>