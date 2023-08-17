
    <header class="header">
        <nav class="header__nav" aria-labelledby="header__nav-title">
            <h2 class="hidden" id="header__nav-title">Navigation principale</h2>
            <img src="<?= wp_get_attachment_image_url('59') ?>" alt="" class="logo">
            <div class="header__nav-links">
                <?php foreach(portfolio_get_menu('main') as $link): ?>
                    <a href="<?= $link->href; ?>" class="header__nav-link">
                        <span class="header__nav-label"><?= $link->label; ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>
    </header>
