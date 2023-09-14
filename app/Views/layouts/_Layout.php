<?php

use core\Controller;

$baseController = new Controller();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo (!empty($title) ? $title : 'Page'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/public/assets/client/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/public/assets/client/img/favicon.ico">

    <link rel="stylesheet" href="/public/assets/client/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/client/css/templatemo.css">
    <link rel="stylesheet" href="/public/assets/client/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="/public/assets/client/css/fontawesome.min.css">

    <link rel="stylesheet" type="text/css" href="/public/assets/client/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/client/css/slick-theme.css">
</head>

<body>
    <?php
    $baseController->render('layouts/_headerLayout');

    include $_Content;

    $baseController->render('layouts/_footerLayout');
    ?>
</body>

</html>