<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="assets/css/reset.css" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo BASE_URL.'assets/css/style.css'?>" rel="stylesheet" type="text/css">
    <script src="<?php echo BASE_URL.'assets/js/script.js'?>" type="module"></script>
    <title>Cogip - Welcome</title>
</head>
<body>
    <nav id="navbar">
        <div id="navbar-title">
            <h2>COGIP</h2>
        </div>
        <div id="navbar-burger">
            <span></span>
        </div>
        <div id="navbar-menu">
            <ul>
                <li><a href="<?= BASE_URL ?>">Home</a></li>
                <li><a href="<?= BASE_URL.'invoices' ?>">Invoices</a></li>
                <li><a href="<?= BASE_URL.'companies' ?>">Companies</a></li>
                <li><a href="<?= BASE_URL.'contacts' ?>">Contacts</a></li>
                <li><a class="signup-button" href="<?= BASE_URL.'sign' ?>">Sign Up</a></li>
                <li><a href="<?= BASE_URL.'login' ?>">Login</a></li>
            </ul>
        </div>
    </nav>