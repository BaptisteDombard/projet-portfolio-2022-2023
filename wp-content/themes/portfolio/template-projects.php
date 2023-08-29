<?php /* Template Name: Projects page template */ ?>
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
    <meta property="og:title" content="Baptiste Dombard - Mes projets">
    <meta property="og:description" content="Découvrer les réalisations de Baptiste Dombard">
    <meta property="og:image" content="">
    <meta property="og:locale" content="fr_BE">
    <title>Baptiste Dombard - Mes projets</title>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body class="body">
<h1 class="hidden">Portfolio de Baptiste Dombard</h1>
<?= get_header()?>
<main class="main">
    <section class="projects" aria-labelledby="projects__title">
        <h2 class="projects__title" id="projects__title">Mes projets</h2>
        <div class="projects_contrainer">
            <?php
            // Faire une requête en DB pour récupérer mes projets
            $projects = new WP_Query([
                'post_type' => 'project',
            ]);
            // Lancer la boucle pour afficher chaque animal
            if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>
                <article class="project">
                    <a href="<?= get_the_permalink(); ?>" class="project__link">
                        <span class="sro">Découvrir <?= get_the_title()?>  </span>
                    </a>
                    <div class="project__card">
                        <div class="project__details">
                            <h3 class="project__name"><?= get_the_title(); ?></h3>
                            <p class="project__creation"><?=get_field('starting_year') . '/' . get_field('ending_year')?></p>
                        </div>
                        <figure class="project__fig">
                            <?= get_the_post_thumbnail(null, 'project_thumbnail', ['class' => 'project__img']); ?>
                        </figure>
                         <ul class="project__taxonomies">
                            <?php
                            $terms =  get_the_terms(get_the_ID(),'types');
                            foreach ($terms as $term)?>
                            <li class="project__taxonomy-item"><?= $term->name ?></li>
                        </ul>
                    </div>
                </article>
            <?php endwhile; else:?>
                <p>Désolé, je n'ai aucun projet à vous présenter.</p>
            <?php endif;?>
        </div>
    </section>
</main>
<?= get_footer()?>
