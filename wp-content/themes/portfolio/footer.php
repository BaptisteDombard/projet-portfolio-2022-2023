<footer class="footer">
    <nav class="footer__nav">
        <h2 class="hidden">Navigation secondaire</h2>
        <ul class="footer__links">
            <?php foreach(portfolio_get_menu('footer') as $link): ?>
                <li class="footer__item">
                    <a href="<?= $link->href; ?>" class="footer__link"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="<?=get_permalink(get_page_by_path( 'mentions-legales' ))?>" class="footer__link footer__legallink">Mentions Légales</a>
        <ul class="footer__contacts">
            <li class="footer__contact-item">
                <img src="<?= wp_get_attachment_image_url('53', 'logo_size') ?>" alt="" class="footer__item-logo">
                <a href="tel:+32472062088" class="footer__number">+32 (0) 472 06 20 88</a>
            </li>
            <li class="footer__contact-item">
                <img src="<?= wp_get_attachment_image_url('51', 'logo_size') ?>" alt="" class="footer__item-logo">
                <a href="mailto:baptistedombard@gmail.com" class="footer__email">baptistedombard@gmail.com</a>
            </li>
            <li class="footer__contact-item">
                <ul class="footer__socials">
                    <li class="footer__socialsitem">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30.89" height="30.89" viewBox="0 0 30.89 30.89">
                            <circle class="circle" cx="15.45" cy="15.45" r="15.45"/>
                            <path class="cat" fill="black" d="m15.36.07C7.06.07.35,6.94.35,15.45c0,6.8,4.3,12.55,10.27,14.59.75.15,1.02-.33,1.02-.74,0-.36-.02-1.58-.02-2.85-4.18.92-5.05-1.83-5.05-1.83-.67-1.78-1.67-2.24-1.67-2.24-1.37-.94.1-.94.1-.94,1.52.1,2.31,1.58,2.31,1.58,1.34,2.34,3.5,1.68,4.37,1.27.12-.99.52-1.68.94-2.06-3.33-.36-6.84-1.68-6.84-7.59,0-1.68.6-3.06,1.54-4.12-.15-.38-.67-1.96.15-4.07,0,0,1.27-.41,4.13,1.58,1.22-.34,2.49-.51,3.75-.51,1.27,0,2.56.18,3.75.51,2.86-1.99,4.13-1.58,4.13-1.58.82,2.11.3,3.69.15,4.07.97,1.07,1.54,2.44,1.54,4.12,0,5.91-3.5,7.21-6.86,7.59.55.48,1.02,1.4,1.02,2.85,0,2.06-.02,3.72-.02,4.23,0,.41.27.89,1.02.74,5.97-2.04,10.27-7.79,10.27-14.59C30.37,6.94,23.64.07,15.36.07Z"/>
                        </svg>
                        <a href="https://github.com/BaptisteDombard" class="footer__sociallink" target="_blank">Mon compte github</a>
                    </li>
                    <li class="footer__socialsitem">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 30 30">
                            <rect class="cls-2" x="1" y="1" width="28" height="28" rx="4.96" ry="4.96"/>
                            <path class="cls-1" d="m24.04,2c2.18,0,3.96,1.77,3.96,3.96v18.09c0,2.18-1.77,3.96-3.96,3.96H5.96c-2.18,0-3.96-1.77-3.96-3.96V5.96c0-2.18,1.77-3.96,3.96-3.96h18.09m0-2H5.96C2.67,0,0,2.67,0,5.96v18.09c0,3.29,2.67,5.96,5.96,5.96h18.09c3.29,0,5.96-2.67,5.96-5.96V5.96c0-3.29-2.67-5.96-5.96-5.96h0Z"/>
                            <path class="cls-2" d="m14.5,22.09c-3.3,0-5.98-2.68-5.98-5.98s2.68-5.98,5.98-5.98,5.98,2.68,5.98,5.98-2.68,5.98-5.98,5.98Z"/>
                            <path class="cls-1" d="m14.5,11.13c2.75,0,4.98,2.23,4.98,4.98s-2.23,4.98-4.98,4.98-4.98-2.23-4.98-4.98,2.23-4.98,4.98-4.98m0-2c-3.85,0-6.98,3.12-6.98,6.98s3.12,6.98,6.98,6.98,6.98-3.12,6.98-6.98-3.12-6.98-6.98-6.98h0Z"/>
                            <path class="cls-2" d="m22.78,10.22c-1.17,0-2.13-.96-2.13-2.13s.96-2.13,2.13-2.13,2.13.96,2.13,2.13-.96,2.13-2.13,2.13Z"/>
                            <path class="cls-1" d="m22.78,6.96c.62,0,1.13.51,1.13,1.13s-.51,1.13-1.13,1.13-1.13-.51-1.13-1.13.51-1.13,1.13-1.13m0-2c-1.73,0-3.13,1.4-3.13,3.13s1.4,3.13,3.13,3.13,3.13-1.4,3.13-3.13-1.4-3.13-3.13-3.13h0Z"/>
                        </svg>

                        <a href="#" class="footer__sociallink" target="_blank">Mon compte instagram</a>
                    </li>
                </ul>
                <p class="footer__copyright">&copy; Baptiste Dombard - 2023</p>
            </li>
        </ul>
    </nav>
</footer>
</body>
</html>
