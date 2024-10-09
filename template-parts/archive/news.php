<?php get_header(); ?>

<article class="archive_body archive_news">
    <div class="news_posts">
        <?php if (have_posts()): while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('template-parts/components/news-card'); ?>
        <?php endwhile; endif; ?>
    </div>
    <?php get_template_part('template-parts/components/pagination'); ?>
</article>

<?php get_footer();
