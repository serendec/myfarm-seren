<?php
// 検索
$event_area = isset($_GET['event_area']) ? sanitize_text_field($_GET['event_area']) : '';
$event_month = isset($_GET['event_month']) ? sanitize_text_field($_GET['event_month']) : '';
$event_category = isset($_GET['event_category']) ? sanitize_text_field($_GET['event_category']) : '';
$event_status = isset($_GET['event_status']) ? sanitize_text_field($_GET['event_status']) : '';
$args = array(
    'post_type' => 'event',
    'posts_per_page' => 9,
    'post_status' => 'publish',
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
);
$tax_query = array('relation' => 'AND');
if ($event_area) {
    $tax_query[] = array(
        'taxonomy' => 'event-area',
        'field' => 'term_id',
        'terms' => $event_area,
    );
}
if ($event_category) {
    $tax_query[] = array(
        'taxonomy' => 'event-category',
        'field' => 'term_id',
        'terms' => $event_category,
    );
}
if (!empty($tax_query)) {
    $args['tax_query'] = $tax_query;
}

// メタクエリを構築
$meta_query = array('relation' => 'AND');
if ($event_status) {
    $meta_query[] = array(
        'key'     => 'event_status',
        'value'   => 'accepting',
        'compare' => '==',
    );
}
if ($event_month) {
    $event_month_start = date('Y-m-01', strtotime($event_month));
    $event_month_end = date('Y-m-t', strtotime($event_month));

    $meta_query[] = array(
        'relation' => 'OR',
        array(
            'key'     => 'event_start_date',
            'value'   => array($event_month_start, $event_month_end),
            'compare' => 'BETWEEN',
            'type'    => 'DATE',
        ),
        array(
            'key'     => 'event_end_date',
            'value'   => array($event_month_start, $event_month_end),
            'compare' => 'BETWEEN',
            'type'    => 'DATE',
        ),
    );
}
if (!empty($meta_query)) {
    $args['meta_query'] = $meta_query;
}

$query = new WP_Query($args);

// おすすめイベント
$args = array(
    'posts_per_page' => 2,
    'post_type'      => 'event',
    'meta_query'     => array(
        array(
            'key'     => 'pickup',
            'value'   => '1',
            'compare' => '==',
        ),
    ),
);
$pickup_query = new WP_Query($args);

// 開催エリア
$args = array('taxonomy' => 'event-area');
$areas = get_categories($args);

// イベントカテゴリ
$args = array('taxonomy' => 'event-category');
$categorys = get_categories($args);

?>

<section class="page_section event_ttl">
    <div class="page_content_inner">
        <p class="section_ttl_en is_m">PickUp Event</p>
        <h2 class="section_ttl_ja is_bggray">
            <span>おすすめのイベント</span>
        </h2>
    </div>
</section>

<div class="separator_wave event_sep">
    <img src="<?= get_assets_directory_uri() ?>/images/sep_wave.jpg" alt="">
    <img class="deco_left" src="<?= get_assets_directory_uri() ?>/images/deco_event_l.png" />
    <img class="deco_right" src="<?= get_assets_directory_uri() ?>/images/deco_event_r.png" />
</div>

<section class="page_section eventlist_section">
    <div class="page_inner">
        <div class="event_list_pkup">
            <?php if ($pickup_query->have_posts()): while ($pickup_query->have_posts()): $pickup_query->the_post(); ?>
                <?php get_template_part('template-parts/components/event-card-landscape'); ?>
            <?php endwhile; endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <!-- /.event_list -->

        <div class="section_ttl_wrap event_list_ttl_wrap">
            <p class="section_ttl_en is_m">Event&Campain</p>
            <h2 class="section_ttl_ja">
                <span>イベント・キャンペーン一覧</span>
            </h2>
            <img class="cloud_left" src="<?= get_assets_directory_uri() ?>/images/nextstory_cloud_left.png" />
            <img class="cloud_right" src="<?= get_assets_directory_uri() ?>/images/nextstory_cloud_right.png" />
        </div>
    </div>

    <div class="event_list_form_wrap">
        <form class="myfarmer_event__sort" action="/event/" method="get" id="myfarmer_event__sort">
            <div class="event_list_form_select">
                <span class="select-wrap">
                    <select name="event_area">
                        <option value="" selected>開催エリアを選ぶ</option>
                        <?php foreach ($areas as $area): ?>
                            <option value="<?php echo $area->term_id; ?>" <?= $event_area == $area->term_id ? 'selected' : ''; ?>><?php echo $area->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </span>
                <span class="select-wrap">
                    <select name="event_month">
                        <option value="" selected>開催月を選ぶ</option>
                        <?php generateMonthOptions($event_month); ?>
                    </select>
                </span>
                <span class="select-wrap">
                    <select name="event_category">
                        <option value="" selected>カテゴリ-を選ぶ</option>
                        <?php foreach ($categorys as $category): ?>
                            <option value="<?php echo $category->term_id; ?>" <?= $event_category == $category->term_id ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </span>
            </div>

            <div class="event_list_form_check">
                <label class="checkbox_wrap">
                    <input type="checkbox" name="event_status" id="event_status" value="accepting" <?= $event_status == 'accepting' ? 'checked' : ''; ?>><span for="event_status">受付中のみ表示</span>
                </label>
            </div>
        </form>
    </div>

    <div class="page_inner">
        <div class="event_list">
            <?php if ($query->have_posts()): ?>
                <?php while ($query->have_posts()): $query->the_post(); ?>
                    <?php get_template_part('template-parts/components/event-card-portrait'); ?>
                <?php endwhile; ?>
            <?php else: ?>
                <p>該当するイベント・キャンペーンはございません。</p>
            <?php endif; ?>

            <?php 
                set_query_var('custom_query', $query);
                get_template_part('template-parts/components/pagination');
            ?>
        </div>
        <!-- /.event_list -->
    </div>
</section>
