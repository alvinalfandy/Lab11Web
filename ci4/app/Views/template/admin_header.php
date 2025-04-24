<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>

<body>
    <div id="container">
        <header>
            <h1>Admin Portal Berita</h1>
        </header>

        <?php
        // Ambil URI service buat ngecek segmen URL
        $uri = service('uri');
        $session = session();
        ?>

        <nav>
            <div class="nav-container">
                <div class="nav-links">
                    <a href="<?= base_url('/admin/artikel'); ?>"
                        class="<?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == 'artikel' && $uri->getSegment(3) == '') ? 'active' : ''; ?>">
                        Dashboard
                    </a>

                    <a href="<?= base_url('/artikel'); ?>"
                        class="<?= ($uri->getSegment(1) == 'artikel' && $uri->getSegment(2) == '') ? 'active' : ''; ?>">
                        Artikel
                    </a>

                    <a href="<?= base_url('/admin/artikel/add'); ?>"
                        class="<?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == 'artikel' && $uri->getSegment(3) == 'add') ? 'active' : ''; ?>">
                        Tambah Artikel
                    </a>
                </div>

                <div class="auth-links">
                    <?php if (!$session->get('logged_in')): ?>
                        <a href="<?= base_url('/user/login'); ?>"
                            class="<?= ($uri->getSegment(1) == 'user' && $uri->getSegment(2) == 'login') ? 'active' : ''; ?>">
                            Login
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('/user/logout'); ?>" class="logout-btn">
                            Logout
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>