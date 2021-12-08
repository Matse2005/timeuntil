<?php
include '../private/config.php';

$pass = $_POST['password'];

if ($pass == $PASSWORD) {
  session_start();
  $_SESSION['logged_in'] = true;
  header('Location: /dashboard');
} else {
  header('Location: /');
}
