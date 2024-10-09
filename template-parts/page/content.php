<article class="post_body">
    <div class="post_columns">
        <main class="post_body_content single_main_container">            
            <?php if (has_post_thumbnail()): ?>
                <div class="post_eyecatch">
                    <?= the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                </div>
            <?php endif; ?>

            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?= the_content(); ?>
            <?php endwhile; endif; ?>
        </main>
    </div>
</article>
