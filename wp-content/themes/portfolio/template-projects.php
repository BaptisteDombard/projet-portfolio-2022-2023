<?php /* Template Name: Projects page template */ ?>
<?= get_header()?>
<main class="main">
    <section class="projects" aria-labelledby="projects__title">
        <h2 class="projects__title" id="projects__title">Mes projets</h2>
        <?php
        // Faire une requête en DB pour récupérer 4 animaux
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
                    <figure class="project__fig">
                        <?= get_the_post_thumbnail(null, 'project_thumbnail', ['class' => 'project__img']); ?>
                    </figure>
                    <div class="project__details">
                        <h3 class="project__name"><?= get_the_title(); ?></h3>
                        <ul class="project__taxonomies">

                        </ul>
                    </div>
                </div>
            </article>
        <?php endwhile; else:?>
            <p>Désolé, je n'ai aucun projet à vous présenter.</p>
        <?php endif;?>
    </section>
</main>
<?= get_footer()?>
