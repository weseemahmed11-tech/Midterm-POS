<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Complete Point-of-Sale System</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a class="brand" href="<?= site_url('/') ?>"><span class="brand-mark">P</span><span><strong>Pointline</strong><small>Complete POS System</small></span></a>
            <button class="nav-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">☰</button>
            <nav aria-label="Main navigation">
            <a href="<?= site_url('/') ?>">Dashboard</a>
            <a href="<?= site_url('about') ?>">About</a>
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= site_url('products') ?>">Products</a>
                <a href="<?= site_url('sales/new') ?>">Record Sale</a>
                <a href="<?= site_url('sales') ?>">Sales History</a>
                <a href="<?= site_url('customers') ?>">Customers</a>
                <a href="<?= site_url('users') ?>">Staff</a>
                <span class="nav-divider"></span><span class="user-chip"><?= esc(session()->get('user.full_name') ?? 'Staff') ?></span><a class="nav-logout" href="<?= site_url('logout') ?>">Logout</a>
            <?php else: ?>
                <a href="<?= site_url('login') ?>">Login</a>
            <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="container">
    <?php if (session()->getFlashdata('error')): ?><p class="errors flash-message"><?= esc(session()->getFlashdata('error')) ?></p><?php endif; ?>
