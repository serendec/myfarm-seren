<?php
global $post;

// 投稿のカテゴリ名取得
$this_category = '';
$this_category_slug = '';
$categories = get_the_category();
if (!empty($categories)) {
    $this_category = esc_html($categories[0]->name);
    $this_category_slug = esc_html($categories[0]->slug);
}

?>

<article class="post_body">
    <h1><?= the_title() ?></h1>

    <div class="post_columns">
        <main class="post_body_content single_main_container">
            <div class="post_info">
                <time class="post_date"><?= get_the_date('Y.m.d') ?></time>
                <span class="cat <?= $this_category_slug ?>"><?= $this_category ?></span>
            </div>
            
            <?php if (has_post_thumbnail()): ?>
                <div class="post_eyecatch">
                    <?= the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                </div>
            <?php endif; ?>

            <?php if (function_exists('toc_get_index') && toc_get_index()): ?>
                <div id="toc_container">
                    <p class="toc_title">目次</p>
                        <ul class="toc_list">
                            <?= toc_get_index(); ?>
                        </ul>
                    </p>
                </div>
            <?php endif; ?>

            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?= the_content(); ?>
            <?php endwhile; endif; ?>
        </main>

        <?php get_custom_sidebar('post'); ?>
    </div>

    <?php get_template_part('template-parts/single/related-posts'); ?>
</article>
