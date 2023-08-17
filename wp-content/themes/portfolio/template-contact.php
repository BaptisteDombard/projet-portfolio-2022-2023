<?php /* Template Name: Contact page template */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Baptiste Dombard">
    <meta name="description" content="Portfolio de Baptiste Dombard">
    <meta name="keyword" content="Portfolio, Baptiste Dombard">
    <title>Baptiste Dombard - Contact</title>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body class="body">
<h1 class="hidden">Portfolio de Baptiste Dombard</h1>
<?= get_header()?>
<section class="contact__section" aria-labelledby="contact__title">
    <h2 class="contact__title" id="contact__title">Me contacter</h2>
    <section class="contact__form" aria-labelledby="contact__form-title">
        <h3 class="contact__form-title" id="contact__form-title">Formulaire de contact</h3>
        <?php
        $feedback = portfolio_session_get('portfolio_contact_form_feedback') ?? false;
        $errors = portfolio_session_get('portfolio_contact_form_errors') ?? [];
        ?>

        <?php if ($feedback):?>
            <div class="success">
                <p>Merci de votre message</p>
                <a href="<?= get_home_url()?>" class="success__link">Revenir à l'acceuil</a>
            </div>
        <?php else:?>


            <?php if ($errors):?>
                <div class="error">
                    <p>Attention&nbsp;! Merci de corriger vos erreurs</p>
                </div>
            <?php endif;?>

            <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="contact">
                <div class="contact__fields">
                    <div class="field">
                        <label for="firstname" class="field__label">Prénom&ast;</label>
                        <input type="text" name="firstname" id="firstname" class="field__input">
                        <?php if ($errors['firstname'] ?? null):?>
                            <p class="field__error"><?= $errors['firstname']; ?></p>
                        <?php endif;?>
                    </div>
                    <div class="field">
                        <label for="lastname" class="field__label">Nom&ast;</label>
                        <input type="text" name="lastname" id="lastname" class="field__input">
                        <?php if ($errors['lastname'] ?? null):?>
                            <p class="field__error"><?= $errors['lastname']; ?></p>
                        <?php endif;?>
                    </div>
                    <div class="field">
                        <label for="subject" class="field__label">Sujet&ast;</label>
                        <input type="text" name="subject" id="subject" class="field__input">
                        <?php if ($errors['subject'] ?? null):?>
                            <p class="field__error"><?= $errors['subject']; ?></p>
                        <?php endif;?>
                    </div>
                    <div class="field">
                        <label for="email" class="field__label">Adresse mail&ast;</label>
                        <input type="email" name="email" id="email" class="field__input">
                        <?php if ($errors['email'] ?? null):?>
                            <p class="field__error"><?= $errors['email']; ?></p>
                        <?php endif;?>
                    </div>
                    <div class="field">
                        <label for="message" class="field__label">Message&ast;</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="field__input"></textarea>
                        <?php if ($errors['message'] ?? null):?>
                            <p class="field__error"><?= $errors['message']; ?></p>
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
                <a href="tel:+32472062088" class="contact__info-phone">+32 (0) 472 06 20 88</a>
            </li>
            <li class="contact__info-item">
                <a href="mailto:baptistedombard@gmail.com" class="contact__info-mail">baptistedombard@gmail.com</a>
            </li>
        </ul>
    </section>
</section>
<?= get_footer()?>
