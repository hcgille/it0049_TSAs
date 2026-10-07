<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($pageTitle) ?> | Tamaraw Tasks</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container navigation">
            <a class="brand" href="<?= site_url('/') ?>">
                <span class="brand-mark">T</span>

                <span>
                    <strong>Tamaraw Tasks</strong>
                    <small>Tasks for Today</small>
                </span>
            </a>

            <nav>
                <a href="<?= site_url('/') ?>">Today</a>
                <a href="<?= site_url('tasks') ?>">All Tasks</a>
                <a href="<?= site_url('profile') ?>">Profile</a>
                <a href="<?= site_url('about') ?>">About</a>

                <?php if (session()->get('isLoggedIn')): ?>
                    <span class="nav-user">
                        <?= esc(session()->get('fullName')) ?>
                    </span>

                    <form
                        class="logout-form"
                        action="<?= site_url('logout') ?>"
                        method="post"
                    >
                        <?= csrf_field() ?>

                        <button class="nav-button" type="submit">
                            Logout
                        </button>
                    </form>
                <?php else: ?>
                    <a href="<?= site_url('login') ?>">Login</a>
                <?php endif ?>
            </nav>
        </div>
    </header>

    <main class="container main-content">