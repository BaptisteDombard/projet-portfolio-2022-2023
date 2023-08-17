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
    <title>Baptiste Dombard - erreur</title>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body class="body">
<h1 class="hidden">Portfolio de Baptiste Dombard</h1>
<?php get_header(); ?>
<main class="error404">
    <h1 class="error404__title">Page non trouvée</h1>
    <p class="error404__help">Vous êtes perdu&nbsp;</p>
    <a href="<?= get_home_url(); ?>" class="error404__link">Retournez à l'accueil</a>
</main>
<?php get_footer(); ?>
