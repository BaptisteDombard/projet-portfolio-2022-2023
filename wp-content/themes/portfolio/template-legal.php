<?php /* Template Name: Legal page template */ ?>
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
    <meta property="og:title" content="Baptiste Dombard - Mention L&eacute;gale">
    <meta property="og:description" content="Les mentions légales du portfolio de Bapyiste Dombard">
    <meta property="og:image" content="">
    <meta property="og:locale" content="fr_BE">
    <title>Baptiste Dombard - Mention L&eacute;gale</title>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body class="body">
<h1 class="hidden">Portfolio de Baptiste Dombard</h1>
<?= get_header()?>
<main class="legal">
    <h2 class="legal__title">
        <?= get_the_title()?>
    </h2>
    <p class="legal__excerpt">

    </p>
</main>
<?= get_footer()?>
