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
    <meta property="og:title" content="Baptiste Dombard - Mon portfolio">
    <meta property="og:description" content="Découvrer Baptiste Dombard à travers son portfolio">
    <meta property="og:image" content="">
    <meta property="og:locale" content="fr_BE">
    <title>Baptiste Dombard - Mon portfolio</title>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body class="body">
<h1 class="hidden">Portfolio de Baptiste Dombard</h1>
<?= get_header()?>
    <main class="main">
        <section class="onboarding" aria-labelledby="onboarding__title" itemscope itemtype="https://schema.org/Person">
            <h2 class="onboarding__title" id="onboarding__title">Bienvenue sur mon portfolio.</h2>
            <p class="onboarding__excerpt">Je m’appelle <span itemprop="givenName">Baptiste</span> <span itemprop="familyName">Dombard</span>,
                <br><span class="onboarding__excerpt-green" itemprop="jobTitle">Web developper</span></p>
            <a href="<?=get_permalink(get_page_by_path( 'a-propos' ))?>" class="onboarding__link">En savoir plus sur moi</a>
        </section>
        <section class="lastprojects" aria-labelledby="lastprojects__title">
            <div class="lastprojects__head">
                <h2 class="lastprojects__title" id="lastprojects__title">Mes derniers projets</h2>
                <div class="lastprojects__linkcontainer">
                    <a href="<?=get_permalink(get_page_by_path( 'projets' ))?>" class="lastprojects__link">Découvrir mes créations</a>
                </div>
            </div>
            <div class="lastprojects__container">
                <?php
                // Faire une requête en DB pour récupérer 4 animaux
                $projects = new WP_Query([
                    'post_type' => 'project',
                    'posts_per_page' => 2
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
        <section class="services" aria-labelledby="services__title">
            <h2 class="services__title" id="services__title">Mes services</h2>
            <p class="services__excerpt">Vous êtes intéressé et souhaitez faire appel à mes service ? N’hésitez pas à me contacter
                <br>
                grâce au formulaire disponible via le lien ci-dessous</p>
            <a href="<?=get_permalink(get_page_by_path( 'contact' ))?>" class="services__link">Contactez-moi</a>
        </section>
        <section class="main__about" aria-labelledby="main__about-title">
            <div class="main__about-texts">
                <h2 class="main__about-title" id="main__about-title">&Agrave; propos de moi</h2>
                <p class="main__about-excerpt">Je suis un web déveloper curieux, toujours de bonne humeur et ravi d’écouter vos demandes et suggestions. Alors, n’hésitez pas à faire appel à moi pour toutes vos requêtes en termes de création web.</p>
                <a href="<?=get_permalink(get_page_by_path( 'a-propos' ))?>" class="main__about-link">En savoir plus sur moi</a>
            </div>
            <img src="<?= wp_get_attachment_image_url('87', 'medium_large') ?>" alt="" class="main__about-img">
        </section>
    </main>
<?= get_footer()?>