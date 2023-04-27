<?php

$isUserLogged = false;
if (isset($_SESSION['ADMIN_USERNAME'])) {
    $isUserLogged = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Admin Panel
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/material-dashboard.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/adminStyle.css"/>
    <link rel="stylesheet" href="assets/css/custom.css"/>
    <!-- Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <style>
        .form-control{
            border: 1px solid #b3a1a1 !important;
            padding: 8px 10px;
        }
        .form-select{
            border: 1px solid #b3a1a1 !important;
            padding: 8px 10px;
        }
        .alert {
        position: relative;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem
        }

        .alert-heading {
            color: inherit
        }

        .alert-primary {
            color: #004085;
            background-color: #cce5ff;
            border-color: #b8daff
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb
        }

        .alert-info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba
        }

        .alert-danger {
            color: #080808;
            background: #f8d7da;
            border-color: #bf0011
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <?php include('sidebar.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include('navbar.php'); ?>

    