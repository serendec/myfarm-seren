<?php
global $post;

// 投稿のカテゴリ名取得
$this_category = '';
$this_category_link = '';
$categories = get_the_category($post->ID);
if (!empty($categories)) {
    $this_category = esc_html($categories[0]->name);
    $this_category_link = esc_url(get_category_link($categories[0]->term_id));
}

// 同じカテゴリーの最新3つの投稿取得
$current_categories = wp_get_post_categories($post->ID);
$args = array(
    'posts_per_page' => 3,
    'post__not_in'   => [$post->ID],
    'category__in'   => $current_categories,
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$related_blogs = new WP_Query($args);

if ($this_category != ''):
?>

    <div class="post_footer">
        <div class="separator_bg info">
            <img src="<?= get_assets_directory_uri() ?>/images/relatedpost_sep.png" />
        </div>
        <div class="post_footer_inner">
            <section class="related_posts_wrap">
                <div class="section_ttl_wrap">
                    <p class="section_ttl_en">Related Posts</p>
                    <h2 class="section_ttl_ja">
                        <span><?= $this_category ?>の関連記事</span>
                    </h2>
                    <img
                        class="deco_left"
                        src="<?= get_assets_directory_uri() ?>/images/relatedpost_illust_left.png" />
                    <img
                        class="deco_right"
                        src="<?= get_assets_directory_uri() ?>/images/relatedpost_illust_right.png" />
                </div>
                <div class="related_posts">
                    <?php if ($related_blogs->have_posts()): while ($related_blogs->have_posts()): $related_blogs->the_post(); ?>
                        <?php get_template_part('template-parts/component/blog-card'); ?>
                    <?php endwhile; endif; ?>
                </div>
                <div class="section_btn_wrap">
                    <a class="section_btn more" href="<?= $this_category_link ?>"><span>もっと見る</span></a>
                </div>
            </section>
        </div>
    </div>
<?php endif; ?>
