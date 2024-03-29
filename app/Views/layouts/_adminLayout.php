<!DOCTYPE html>
<html lang="en">
<?php

use core\Controller;

$baseController = new Controller();
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo (!empty($title) ? $title : 'Page'); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/public/assets/client/img/favicon-32x32.png">
    <!-- Custom fonts for this template-->
    <link href="/public/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script type="text/javascript" src="/public/ckeditor/ckeditor.js"></script>
    <!-- Custom styles for this template-->
    <link href="/public/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
$baseController->render('layouts/_header-adminLayout');
include $_Content;
$baseController->render('layouts/_footer-adminLayout');
?>