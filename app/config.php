<?php session_start();

if (!isset($_SESSION['super_token'])) {
  $_SESSION['super_token'] = md5(uniqid(mt_rand(), true));
}
if (!defined('BASE_PATH')) {
  define('BASE_PATH', $_SERVER['HTTP_HOST']);
}

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'getSession') {
    echo json_encode($_SESSION);
  }
}
