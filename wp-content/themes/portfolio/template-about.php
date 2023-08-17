<?php /* Template Name: About page template */ ?>
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
    <title>Baptiste Dombard - &Aacute; propos</title>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body class="body">
<h1 class="hidden">Portfolio de Baptiste Dombard</h1>
<?= get_header()?>
<main class="main">
    <section class="about" aria-labelledby="about__title">
        <h2 class="about__title" id="about__title">&Aacute; propos de moi</h2>
        <div class="about__texts">
            <p class="about__excerpt"><?= get_field('excerpt_1')?></p>

            <p class="about__excerpt"><?= get_field('excerpt_2')?></p>

            <p class="about__excerpt"><?= get_field('excerpt_3')?></p>
        </div>
        <div class="about__imgs">
            <img src="<?= wp_get_attachment_image_url('87', 'medium_large') ?>" alt="" class="about__img">
            <img src="<?= wp_get_attachment_image_url('58', 'medium_large') ?>" alt="Logo HEPL" class="about__img">
        </div>
    </section>
</main>
<?= get_footer()?>
