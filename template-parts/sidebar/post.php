<?php
global $wpdb;
global $post;

// 全タグを取得
$tags = get_tags();

// 全カテゴリー取得
$all_categories = get_categories([
    'orderby'    => 'name',
    'order'      => 'ASC',
    'hide_empty' => true,
]);

// 年別アーカイブ
$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");

// 最新3つの投稿取得
$args = array(
    'posts_per_page' => 3,
    'post__not_in'   => [$post->ID],
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$latest_posts = new WP_Query($args);

?>

<aside class="post_side_container">
    <div class="post_side_inner">
        <?php if (is_single()): ?>
            <div class="post_side_title_container">
                <p class="post_side_title">最新の記事投稿</p>
            </div>
            <div class="latest_posts">
                <?php if ($latest_posts->have_posts()): while ($latest_posts->have_posts()): $latest_posts->the_post(); ?>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="post_thumbnail">
                                    <?= the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                                </div>
                            <?php endif; ?>
                            <div class="posts_info">
                                <?php
                                    $category = '';
                                    $category_slug = '';
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        $category = esc_html($categories[0]->name);
                                        $category_slug = esc_html($categories[0]->slug);
                                    }
                                ?>
                                <span class="cat <?= $category_slug ?>"><?= $category ?></span>
                                <time><?= get_the_date('Y.m.d') ?></time>
                            </div>
                            <h3><?= the_title(); ?></h3>
                        </a>
                    </article>
                <?php endwhile; endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>

        <div class="post_side_title_container">
            <p class="post_side_title">カテゴリ</p>
            <img src="<?= get_assets_directory_uri() ?>/images/side_icon_cat.png" />
        </div>
        <ul class="post_side_links">
            <?php foreach ($all_categories as $category): ?>
                <?php $category_link = get_term_link($category); ?>
                <li>
                    <a href="<?= esc_url($category_link) ?>"><?= $category->name ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="post_side_title_container">
            <p class="post_side_title">年別アーカイブ</p>
            <img src="<?= get_assets_directory_uri() ?>/images/side_icon_archive.png" />
        </div>
        <ul class="post_side_links">
            <?php foreach ($years as $year): ?>
                <li><a href="<?= get_year_link($year) ?>"><?= $year ?>年</a></li>
            <?php endforeach; ?>
        </ul>

        <div class="post_side_title_container">
            <p class="post_side_title">テーマタグ</p>
            <img src="<?= get_assets_directory_uri() ?>/images/side_icon_tag.png" />
        </div>
        <div class="post_side_tags">
            <?php if ($tags): ?>
                <div class="post_side_tags">
                    <?php foreach ($tags as $tag):
                        $tag_link = get_tag_link($tag->term_id);
                        $tag_name = $tag->name;
                    ?>
                        <span><a href="<?= esc_url($tag_link) ?>"><?= esc_html($tag_name) ?></a></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</aside>