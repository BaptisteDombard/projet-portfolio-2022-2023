<?= get_header()?>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <main class="main singleProject">
                <h2 class="singleProject__title"><?= get_the_title(); ?></h2>
                <div class="singleProject__content">
                    <h3 class="content__title">Contexte</h3>
                    <p class="singleProject__excerpt"><?= get_field('context'); ?></p>
                    <h3 class="content__title">But final</h3>
                    <p class="singleProject__excerpt"><?= get_field('purpose'); ?></p>
                    <h3 class="content__title">&Eacute;tapes de mon travail</h3>
                    <p class="singleProject__excerpt"><?= get_field('steps'); ?></p>
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
