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
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <title>Baptiste Dombard - <?= get_the_title(); ?></title>
    <?php endwhile; endif; ?>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body class="body">
<h1 class="hidden">Portfolio de Baptiste Dombard</h1>
<?= get_header()?>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <main class="main singleProject">
                <h2 class="singleProject__title"><?= get_the_title(); ?></h2>
                <div class="singleProject__content">
                    <div class="singleProject__context">
                        <h3 class="content__title">Contexte</h3>
                        <p class="singleProject__excerpt"><?= get_field('context'); ?></p>
                    </div>
                    <div class="singleProject__purpose">
                        <h3 class="content__title">But final</h3>
                        <p class="singleProject__excerpt"><?= get_field('purpose'); ?></p>
                    </div>
                    <div class="singleProject__steps">
                        <h3 class="content__title">&Eacute;tapes de mon travail</h3>
                        <p class="singleProject__excerpt"><?= get_field('steps'); ?></p>
                    </div>
                </div>
                <?php if (get_field('finished')&&(get_field('projects_url') || get_field('github_url'))):?>
                    <div class="singleProject__links">
                        <a href="<?= get_field('projects_url')?>" class="site__link" target="_blank">Voir le site</a>
                        <a href="<?= get_field('github_url')?>" class="github__link" target="_blank">Voir le repo Github</a>
                    </div>
                <?php endif;?>
                <figure class="singleProject__fig">
                    <?= get_the_post_thumbnail(null, 'large', ['class' => 'singleProject__thumb']); ?>
                </figure>
            </main>
        <?php endwhile; endif; ?>
<?= get_footer()?>
