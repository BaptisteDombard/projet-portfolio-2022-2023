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
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:title" content="Baptiste Dombard - &Aacute; propos">
    <meta property="og:description" content="Apprenez en plus sur Baptiste Dombard et son parcours">
    <meta property="og:image" content="">
    <meta property="og:locale" content="fr_BE">
    <title>Baptiste Dombard - &Aacute; propos</title>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body class="body">
<h1 class="hidden">Portfolio de Baptiste Dombard</h1>
<?= get_header()?>
<main class="main">
    <section class="about" aria-labelledby="about__title">
        <h2 class="about__title" id="about__title">&Aacute; propos de moi</h2>
        <div class="about__texts" itemscope itemtype="https://schema.org/Person">
            <p class="about__excerpt">Je m’appelle <span itemprop="givenName">Baptiste</span> <span itemprop="familyName">Dombard</span>, j’ai réalisé mes études
                secondaires à l’<span itemprop="alumniOf">institut Notre-dame de Heusy</span>. Hésitant sur mes choix futurs, je me suis dirigé vers des études générales.
                J’ai obtenu sans problème mon CESS en option sciences sociales. Ne désirant pas arrêter mon parcours scolaire et ayant un dilemme entre des études
                d’instituteur et des études dans l’informatique, j’ai très vite compris que mon avenir serait dans l’informatique. </p>

            <p class="about__excerpt">Ayant pu travailler dans plusieurs domaines grâce à  la multitude de cours suivis à la <span itemprop="affiliation">HEPL</span> (design, front-end, back-end, etc...),
                je peux affirmer que le métier de developper web est un métier qui me plait et pour lequel je désire m’investir pour aider mes futurs clients. </p>

            <p class="about__excerpt">Je suis un <span itemprop="jobTitle">web déveloper</span> curieux, toujours de bonne humeur et ravi d’écouter vos demandes et suggestions.
                Alors, n’hésitez pas à faire appel à moi pour toutes vos requêtes en terme de création web.</p>
        </div>
        <div class="about__imgs">
            <img src="<?= wp_get_attachment_image_url('87', 'medium_large') ?>" alt="" class="about__img">
            <img src="<?= wp_get_attachment_image_url('58', 'medium_large') ?>" alt="Logo HEPL" class="about__img">
        </div>
    </section>
</main>
<?= get_footer()?>
