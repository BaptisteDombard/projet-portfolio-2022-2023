<?php /* Template Name: Contact page template */ ?>
<?= get_header()?>
<section class="contact" aria-labelledby="contact__title">
    <h2 class="contact__title" id="contact__title">Me contacter</h2>
    <section class="contact__form" aria-labelledby="contact__form-title">
        <h3 class="contact__form-title" id="contact__form-title">Formulaire de contact</h3>
        <?php
        $feedback = portfolio_session_get('portfolio_contact_form_feedback') ?? false;
        $errors = portfolio_session_get('portfolio_contact_form_errors') ?? [];
        ?>

        <?php if ($feedback):?>
            <div class="success" style="color: green">
                <p>Merci de votre message</p>
            </div>
        <?php else:?>


            <?php if ($errors):?>
                <div class="error" style="color: red">
                    <p>Attention&nbsp;! Merci de corriger vos erreurs</p>
                </div>
            <?php endif;?>

            <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="contact">
                <div class="contact__info">
                    <div class="field">
                        <label for="firstname" class="field__label">Prénom&ast;</label>
                        <input type="text" name="firstname" id="firstname" class="field__input">
                        <?php if ($errors['firstname'] ?? null):?>
                            <p class="field__error" style="color: red"><?= $errors['firstname']; ?></p>
                        <?php endif;?>
                    </div>
                    <div class="field">
                        <label for="lastname" class="field__label">Nom&ast;</label>
                        <input type="text" name="lastname" id="lastname" class="field__input">
                        <?php if ($errors['lastname'] ?? null):?>
                            <p class="field__error" style="color: red"><?= $errors['lastname']; ?></p>
                        <?php endif;?>
                    </div>
                    <div class="field">
                        <label for="subject" class="field__label">Sujet&ast;</label>
                        <input type="text" name="subject" id="subject" class="field__input">
                        <?php if ($errors['subject'] ?? null):?>
                            <p class="field__error" style="color: red"><?= $errors['subject']; ?></p>
                        <?php endif;?>
                    </div>
                    <div class="field">
                        <label for="email" class="field__label">Adresse mail&ast;</label>
                        <input type="email" name="email" id="email" class="field__input">
                        <?php if ($errors['email'] ?? null):?>
                            <p class="field__error" style="color: red"><?= $errors['email']; ?></p>
                        <?php endif;?>
                    </div>
                    <div class="field">
                        <label for="message" class="field__label">Message&ast;</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="field__input"></textarea>
                        <?php if ($errors['message'] ?? null):?>
                            <p class="field__error" style="color: red"><?= $errors['message']; ?></p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="contact__footer">
                    <input type="hidden" name="action" value="portfolio_contact_form">
                    <input type="hidden" name="contact_nonce" value="<?= wp_create_nonce( 'portfolio_contact_form');?>">
                    <button class="contact__submit" type="submit">Envoyer</button>
                </div>
            </form>
        <?php endif;?>
    </section>
    <section class="contact__info" aria-labelledby="contact__info-title">
        <h3 class="contact__info-title" id="contact__info-title">Coordonnées</h3>
        <ul class="contact__info-list">
            <li class="contact__info-item">
                <img src="<?= wp_get_attachment_image_url('54', 'logo_size') ?>" alt="" class="contact__info-logo">
                <p class="contact__info-phone">+32 (0) 472 06 20 88</p>
            </li><li class="contact__info-item">
                <img src="<?= wp_get_attachment_image_url('52', 'logo_size') ?>" alt="" class="contact__info-logo">
                <a href="mailto:baptistedombard@gmail.com" class="contact__info-mail">baptistedombard@gmail.com</a>
            </li>
        </ul>
    </section>
</section>
<?= get_footer()?>
