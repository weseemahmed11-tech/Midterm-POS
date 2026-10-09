<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Basic POS Project</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a class="brand" href="<?= site_url('/') ?>">Basic POS Project</a>
            <nav aria-label="Main navigation">
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('about') ?>">About</a>
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= site_url('customers') ?>">Customer Accounts</a>
                <a href="<?= site_url('users') ?>">User Accounts</a>
                <a href="<?= site_url('logout') ?>">Logout</a>
            <?php else: ?>
                <a href="<?= site_url('login') ?>">Login</a>
            <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="container">
