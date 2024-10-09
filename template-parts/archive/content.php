<?php get_header(); ?>

<article class="archive_body">
    <div class="post_columns">
        <main class="single_main_container archive_farmblog">
            <div class="farmblog_posts <?= !is_paged() ? 'first-page' : '' ?>">
                <?php if (have_posts()): while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part('template-parts/components/blog-card'); ?>
                <?php endwhile; endif; ?>
            </div>
                
            <?php get_template_part('template-parts/components/pagination'); ?>
        </main>
        <?php get_custom_sidebar('post'); ?>
    </div>
</article>

<?php get_footer();
