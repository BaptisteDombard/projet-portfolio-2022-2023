<?= get_header()?>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <main class="main singleProject">
                <h2 class="singleProject__title"><?= get_the_title(); ?></h2>
                <div class="singleProject__content">
                    <p class="singleProject__excerpt"><?= get_field('context'); ?></p>
                    <p class="singleProject__excerpt"><?= get_field('purpose'); ?></p>
                    <p class="singleProject__excerpt"><?= get_field('steps'); ?></p>
                </div>
                <div class="singleProject__links">
                    <?php if (get_field('projects_url') || get_field('github_url')):?>
                        <a href="<?= get_field('projects_url')?>" class="site__link">Voir le site</a>
                        <a href="<?= get_field('github_url')?>" class="github__link">Voir le repo Github</a>
                    <?php endif;?>
                </div>
                <figure class="singleProject__fig">
                    <?= get_the_post_thumbnail(null, 'large', ['class' => 'singleProject__thumb']); ?>
                </figure>
            </main>
        <?php endwhile; endif; ?>
<?= get_footer()?>
