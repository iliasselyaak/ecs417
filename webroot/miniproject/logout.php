<?php
session_start();
unset($_SESSION['$isLogged']);
session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>