<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= get_bloginfo('name')?></title>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body class="body">
    <h1 class="hidden">Portfolio de Baptiste Dombard</h1>
    <header class="header">
        <nav class="header__nav" aria-labelledby="header__nav-title">
            <h2 class="hidden" id="header__nav-title">Navigation principale</h2>
            <img src="<?= wp_get_attachment_image_url('59') ?>" alt="" class="logo">
            <?php foreach(portfolio_get_menu('main') as $link): ?>
                <a href="<?= $link->href; ?>" class="nav__link">
                    <span class="nav__label"><?= $link->label; ?></span>
                </a>
            <?php endforeach; ?>
        </nav>
    </header>
