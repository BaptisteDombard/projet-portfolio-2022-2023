<footer class="footer">
    <ul class="footer__links">
        <?php foreach(portfolio_get_menu('footer') as $link): ?>
            <li class="footer__item">
                <a href="<?= $link->href; ?>" class="footer__link"><?= $link->label; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="<?=get_permalink(get_page_by_path( 'mentions-legales' ))?>" class="footer__link footer__legallink">Mentions Légales</a>
    <ul class="footer__contacts">
        <li class="footer__item footer__contact-item">
            <img src="<?= wp_get_attachment_image_url('53', 'logo_size') ?>" alt="" class="footer__item-logo">
            <p class="footer__number">+32 (0) 472 06 20 88</p>
        </li>
        <li class="footer__item footer__contact-item">
            <img src="<?= wp_get_attachment_image_url('51', 'logo_size') ?>" alt="" class="footer__item-logo">
            <a href="mailto:baptistedombard@gmail.com" class="footer__email">baptistedombard@gmail.com</a>
        </li>
        <li class="footer__item">
            <ul class="footer__socials">
                <li class="footer__socialsitem">
                    <img src="<?= wp_get_attachment_image_url('55') ?>" alt="" class="footer__social" width="30" height="30">
                    <a href="https://github.com/BaptisteDombard" class="footer__sociallink">Mon compte github</a>
                </li>
                <li class="footer__socialsitem">
                    <img src="<?= wp_get_attachment_image_url('56') ?>" alt="" class="footer__social" width="30" height="30">
                    <a href="#" class="footer__sociallink">Mon compte instagram</a>
                </li>
            </ul>
        </li>
    </ul>
</footer>
</body>
</html>
