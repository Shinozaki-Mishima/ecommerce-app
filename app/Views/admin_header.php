<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once APP_DIR . "Views/header-contents.php"; ?>
    <link rel="stylesheet" href="<?php echo ASSETS_URL."css/adminstyle.css"; ?>">
    <title>Product Management</title>
</head>
<body>


<style>

</style>

<!-- html here -->
<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a class="theme" href="<?php echo BASE_URL; ?>store">
                        Return to Store
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . "admin/dashboard";?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>admin/products/view">View Products</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>admin/products/add">Add Products</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>admin/discounts">Manage Discounts</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>store">Back to store</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>