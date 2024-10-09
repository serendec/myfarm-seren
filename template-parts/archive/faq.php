<?php 
// 全カテゴリー取得
$faq_categories = get_terms([
    'taxonomy'   => 'faq-category',
    'post_type'  => 'faq',
    'hide_empty' => false,
]);

// 現在のタクソノミー用語オブジェクトを取得
$current_term = get_queried_object();

get_header();

?>

<section class="page_section">
    <div class="page_inner">
        <div class="faq_categories">
            <ul class="faq_categories_list">
                <?php if (!empty($faq_categories) && !is_wp_error($faq_categories)): foreach ($faq_categories as $category): ?>
                    <li <?= ($current_term->slug == $category->slug) ? 'class="active"' : '' ?>><a href="<?= esc_url(get_term_link($category)) ?>"><?= esc_html($category->name) ?></a></li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</section>

<section class="page_section faq_section">
    <img src="<?= get_assets_directory_uri() ?>/images/deco_faq_left.png" class="deco_faq_left">
    <img src="<?= get_assets_directory_uri() ?>/images/deco_faq_right.png" class="deco_faq_right">
    <div class="page_inner">
        <?php get_search_form(); ?>

        <h2 class="section_ttl_ja">
            <?php if (is_search() && get_search_query()): ?>
                "<?= esc_html(get_search_query()) ?>"について
            <?php else: ?>
                <?= $current_term->name != 'faq' ? esc_html($current_term->name) : 'よくある質問' ?>
            <?php endif; ?>
        </h2>

        <div class="faq_list">
            <?php if (have_posts()): ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="faq_item">
                    <div class="faq_question">
                        <span><?= get_the_title(); ?></span>
                    </div>
                    <div class="faq_answer">
                        <span><?= get_the_content() ?></span>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="ta-center">該当するご質問はございませんでした。</p>
            <?php endif; ?>
        </div>

        <?php get_template_part('template-parts/components/pagination'); ?>
    </div>
</section>

<?php get_footer();
