<?php session_start();
    
    if(!isset($_POST['super_token'])){
        $_SESSION['super_token'] = md5 (uniqid(mt_rand(), true));
    }
    if(!defined('BASE_PATH')){
        define('BASE_PATH', $_SERVER['HTTP_HOST'] );
    }
?>