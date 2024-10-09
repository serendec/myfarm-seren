<?php
global $wpdb;

$args = array(
    'post_type'      => 'farms',
    'post_status'    => 'publish',
    'posts_per_page' => -1
);

$farms_query = new WP_Query($args);
$locations = array();

if ($farms_query->have_posts()) {
    while ($farms_query->have_posts()) {
        $farms_query->the_post();
        $latitude = get_post_meta(get_the_ID(), 'latitude', true);
        $longitude = get_post_meta(get_the_ID(), 'longitude', true);

        if ($latitude && $longitude) {
            $locations[] = array(
                'latitude'  => $latitude,
                'longitude' => $longitude,
                'title'     => get_the_title(),
                'url'       => get_permalink()
            );
        }
    }
    wp_reset_postdata();
}

?>

<section class="page_section">
    <div class="page_content_inner">
        <p class="section_top_txt">
            マイファーム体験農園は、関東・関西・東海エリアを中心に開園しています。<br class="pc">
            ご自宅から通いやすい農園や少し足を延ばした自然に囲まれた農園など、<br class="pc">
            お好みの農園をお探しくださいませ。
        </p>
    </div>
</section>

<div class="separator_wave">
    <img src="<?= get_assets_directory_uri() ?>/images/sep_wave.jpg" alt="">
    <img class="deco_left" src="<?= get_assets_directory_uri() ?>/images/deco_areasearch_r.png" />
    <img class="deco_right" src="<?= get_assets_directory_uri() ?>/images/deco_areasearch_l.png" />
</div>

<section class="page_section areasearch_section">

    <div class="page_inner">
        <div class="section_ttl_wrap">
            <p class="section_ttl_en is_m">Flow</p>
            <h2 class="section_ttl_ja">
                <span>ご利用の流れ</span>
            </h2>
        </div>

        <div class="flow_list">
            <div class="flow">
                <span class="num"><img src="<?= get_assets_directory_uri() ?>/images/flow_01.svg"></span>
                <p class="flow_txt">近くの農園を探す</p>
            </div>
            <div class="flow">
                <span class="num"><img src="<?= get_assets_directory_uri() ?>/images/flow_02.svg"></span>
                <p class="flow_txt">無料見学のお申し込み</p>
            </div>
            <div class="flow">
                <span class="num"><img src="<?= get_assets_directory_uri() ?>/images/flow_03.svg"></span>
                <p class="flow_txt">予約日時に農園へ行く</p>
                <p class="flow_subtxt">気に入ればご見学後その場でご契約！</p>
            </div>
        </div>
    </div>    

    <div id="pagebreak"></div>

    <div class="tab_container">
        <div class="tab_area">
            <div class="tabs">
                <a class="tab_button tab_button_map" href="/farms/#pagebreak">エリアからさがす</a>
                <span class="tab_button tab_button_flag active">現在地・地図からさがす</span>
            </div>
        </div>

        <!-- 現在地・地図から探す -->
        <div class="tab_content" id="tab1">
            <div class="mapsearch_form">
                <button id="get-location" class="btn_locationsearch">現在地から検索</button>
                <span class="search_form_wrap">
                    <input type="text" id="location-input" class="area_input" placeholder="駅名・住所・農園名など">
                    <img class="search_icon" src="<?= get_assets_directory_uri() ?>/images/ico_search.png">
                </span>
            </div>
            <div class="map_area">
                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>

            <div id="map_scale" class="map_scale" style="display: none;">
                <span class="map_scale_caption">距離で絞り込む</span>
                <div class="map_scale_toggle">
                    <input class="toggle_item toggle_left" id="distance-5" name="distance" type="radio" value="5" checked>
                    <label class="toggle_label" for="distance-5">5km</label>
                    <input class="toggle_item toggle_right" id="distance-10" name="distance" type="radio" value="10">
                    <label class="toggle_label" for="distance-10">10km</label>
                </div>
            </div>

            <div class="other_farms_inner">
                <div id="farm_list" class="farm_list"></div>
            </div>
        </div>
    </div>
</section>

<script id="map-data" type="application/json">
    <?php echo json_encode($locations); ?>
</script>
<script>
    var restUrl = '<?php echo esc_url(rest_url('api/v1/nearby-farms')); ?>';
</script>