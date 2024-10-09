<?php
// 検索
$keyword = (isset($_GET['s']) && !empty($_GET['s'])) ? sanitize_text_field($_GET['s']) : '';
if ($keyword == ''){
    $pref = (isset($_GET['pref']) && !empty($_GET['pref'])) ? sanitize_text_field($_GET['pref']) : '';
}
$args = array(
    'post_type'      => 'farms',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
    's'              => $keyword,
);
if ($pref) {
    $args['meta_query'] = array(
        array(
            'key'   => 'pref',
            'value' => getfullPrefName($pref),
            'compare' => '='
        ),
    );
}
$farms_query = new WP_Query($args);

?>

<section class="page_section">
    <div class="page_content_inner">
        <p class="section_top_txt">
            体験農園マイファームは、関東・関西・東海エリアを中心に開園しています。<br class="pc">
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
                <span class="tab_button tab_button_map active">エリアからさがす</span>
                <a class="tab_button tab_button_flag" href="/farms-map/#pagebreak">現在地・地図からさがす</a>
            </div>
        </div>

        <!-- エリアからさがす -->
        <div class="tab_content" id="tab1">

            <form class="areasearch_form" id="form-search" method="get" action="./#pagebreak">
                <div class="area_buttons">
                    <?php
                        $pref_options = ['東京', '神奈川', '千葉', '埼玉', '愛知', '滋賀', '奈良', '京都', '大阪', '兵庫', '福岡'];
                        foreach ($pref_options as $pref_option):
                            $class = (!empty($pref) && $pref == $pref_option) ? 'on' : 'off';
                    ?>
                        <span class="area_button <?= $class ?>" data-state="<?= $class ?>" data-pref="<?= $pref_option ?>"><?= $pref_option ?></span>
                        <?php if ($class == 'on'): ?>
                            <input type="hidden" name="pref" value="<?= $pref_option ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <label>キーワード検索</label>
                <span class="search_form_wrap">
                    <input type="text" id="area_input" class="area_input" name="s" placeholder="駅名・住所・農園名など" value="<?= $keyword ?>" >
                    <img class="search_icon" src="<?= get_assets_directory_uri() ?>/images/ico_search.png">
                </span>
            </form>

            <div class="farm_list">
                <?php if ($farms_query->have_posts()): ?>
                    <?php while ($farms_query->have_posts()): $farms_query->the_post(); ?>
                        <?php
                            $address = '';
                            if (!empty(get_field('pref')) && !empty(get_field('address'))) {
                                if (mb_strpos(get_field('address'), get_field('pref')) === 0) {
                                    //get_field('address']に都道府県名が入っている 
                                    $address = get_field('address');
                                } else {
                                    $address = get_field('pref').get_field('address');
                                }
                            } elseif (!empty(get_field('pref'))) {
                                $address = get_field('pref');
                            } elseif (!empty(get_field('address'))) {
                                $address = get_field('address');
                            }
                        ?>
                        <div class="farm_item">
                            <h3 class="farm_name"><?= get_the_title() ?></h3>
                            <div class="farm_item_content">
                                <p class="farm_feature"><?= get_field('characteristic') ?></p>
                                <div class="farm_item_column">
                                    <div class="farm_img">
                                        <img src="<?= get_field('farm_image1') ?>" alt="<?= get_the_title() ?>">
                                    </div>
                                    <div class="farm_item_detail">
                                        <p class="farm_address"><?= $address ?></p>
                                        <?php if (!empty(get_field('access_by_walk')) || !empty(get_field('access_by_car'))): ?>
                                            <p class="farm_access">
                                                <?php if (!empty(get_field('access_by_walk'))): ?>
                                                    徒歩の場合：<?= get_field('access_by_walk') ?>
                                                <?php elseif (!empty(get_field('access_by_car'))): ?>
                                                    車の場合：<?= get_field('access_by_car') ?>
                                                <?php endif; ?>
                                            </p>
                                        <?php endif; ?>
                                        <table class="farm_detail_table">
                                            <tr>
                                                <th>駐車場</th>
                                                <th>月額<br class="xs">利用料金</th>
                                                <th>区画面積</th>
                                                <th>空き</th>
                                            </tr>
                                            <tr>
                                                <td><?= get_field('parking_available') ? '〇' : '×' ?></td>
                                                <td><span class="num"><?= get_field('monthly_fee2') != '' ? number_format(get_field('monthly_fee2')) : '' ?></span><span class="unit">円</span></td>
                                                <td><span class="num"><?= get_field('menseki2') ?></span><span class="unit">㎡</span></td>
                                                <td><?= display_vacancy_status(get_field('empty_status')) ?></td>
                                            </tr>
                                        </table>
                                        <div class="farm_item_btn_wrap">
                                            <a href="<?= get_permalink( $farm['ID'] ) ?>" class="section_btn more"><span>詳細を見る</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>該当する農園はございません。</p>
                <?php endif; ?>

                <?php 
                    set_query_var('custom_query', $farms_query);
                    get_template_part('template-parts/components/pagination');
                ?>
            </div>
        </div>
    </div>
</section>
