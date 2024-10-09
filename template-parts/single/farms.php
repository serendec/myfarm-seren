<?php
$empty_status = get_field('empty_status');
$farm_id = get_the_ID();

// 関連ブログ取得
$args = [
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'meta_query'     => [
        [
            'key'     => 'related-farms',
            'value'   => $farm_id,
            'compare' => 'LIKE'
        ]
    ],
    'orderby'        => 'date',
    'order'          => 'DESC'
];
$blog_query = new WP_Query($args);

// 関連イベント取得
$args = [
    'post_type'      => 'event',
    'posts_per_page' => 3,
    'meta_query'     => [
        [
            'key'     => 'related-farms',
            'value'   => $farm_id,
            'compare' => 'LIKE'
        ]
    ],
    'orderby'        => 'date',
    'order'          => 'DESC'
];
$event_query = new WP_Query($args);

?>

<article class="post_body farm_detail_body">
    <h1><?= the_title() ?></h1>

    <div class="farm_detail_body">
        <!-- <p class="farm_detail_access"><?= get_field('access_by_walk') ?></p> -->

        <div class="farm_info">
            <ul class="farm_info_list">
                <?php if (get_field('monthly_fee2') != ''): ?>
                    <li class="farm_info_item">
                        <dl>
                            <dt>月額利用料金</dt>
                            <dd><span class="number"><?= number_format(get_field('monthly_fee2')) ?></span><span class="unit">円</span>(税込) / <span class="unit">月</span></dd>
                        </dl>
                    </li>
                <?php endif; ?>
                <?php if (get_field('operating_costs') != ''): ?>
                    <li class="farm_info_item">
                        <dl>
                            <dt>運営費<br class="farm_info_br">（１年目）</dt>
                            <dd><span class="number"><?= number_format(get_field('operating_costs')) ?></span><span class="unit">円</span>(税込) / <span class="unit">年</span></dd>
                        </dl>
                    </li>
                <?php endif; ?>
                <?php if (get_field('menseki2') != ''): ?>
                    <li class="farm_info_item">
                        <dl>
                            <dt>区画面積</dt>
                            <dd><span class="number"><?= get_field('menseki2') ?></span><span class="unit_l">m²</span></dd>
                        </dl>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="farm_detail_btns">
                <?php switch ($empty_status):
                        case '◯':
                    ?>
                        <span class="btn_vacant">〇 空きあり</span>
                        <a class="btn_apply enable" href="<?= (function_exists('get_myfarm_visit_url')) ? get_myfarm_visit_url() : '/free-visit/' ?>">無料見学申し込み</a>
                        <?php break; ?>
                    <?php case '△': ?>
                        <span class="btn_vacant">△ 空きわずか</span>
                        <a class="btn_apply enable" href="<?= (function_exists('get_myfarm_visit_url')) ? get_myfarm_visit_url() : '/free-visit/' ?>">無料見学申し込み</a>
                        <?php break; ?>
                    <?php case '満席': ?>
                        <span class="btn_vacant">× 空き無し</span>
                        <span class="btn_disable">申込受付を<br class="xs">停止しています</span>
                        <?php break; ?>
                    <?php case '満席(空き待ち可)': ?>
                        <span class="btn_vacant">× 空き無し</span>
                        <a class="btn_apply enable" href="<?= (function_exists('get_myfarm_waitlist_url')) ? get_myfarm_waitlist_url() : '/waiting-for-availability/' ?>">空き待ち登録（無料）</a>
                        <?php break; ?>
                    <?php case 'ハタムスビ': ?>
                        <span class="btn_vacant">ハタムスビ</span>
                        <a class="btn_apply enable" href="<?= get_field('hatamusubi') ?>">お申込みはこちら</a>
                        <?php break; ?>
                <?php endswitch; ?>
            </div>
        </div>

        <div class="farm_detail_content">
            <div class="swiper farm_img_slider">
                <div class="swiper-wrapper">
                    <?php
                        for ($i = 1; $i < 5; $i++):
                            $farm_image = get_field( 'farm_image' . $i );
                            if (isset($farm_image) && $farm_image !== '' ):
                    ?>
                                <div class="swiper-slide">
                                    <img src="<?= $farm_image ?>" alt="">
                                </div>
                    <?php
                            endif;
                        endfor;
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <p class="section_ttl_en size_m">Farm Introduction</p>
            <h2 class="section_ttl_ja is_bggray"><span>農園のご紹介</span></h2>

            <div class="post_body_content">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <?= the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</article>
<!-- /.post_body -->

<?php if ($blog_query->have_posts()): ?>
    <section>
        <div class="other_farms_inner">
            <p class="section_ttl_en size_m">Related Blog</p>
            <h2 class="section_ttl_ja is_bggray"><span>関連ブログ</span></h2>
            <div class="farmblog_posts">
                <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                    <?php get_template_part('template-parts/components/blog-card'); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>

<?php if ($event_query->have_posts()): ?>
    <section>
        <div class="other_farms_inner">
            <p class="section_ttl_en size_m">Related Event</p>
            <h2 class="section_ttl_ja is_bggray"><span>関連イベント</span></h2>
            <div class="farmblog_posts">
                <?php while ( $event_query->have_posts() ) : $event_query->the_post(); ?>
                    <?php get_template_part('template-parts/components/blog-card'); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>

<section class="farm_outline">
    <div class="separator_bg farm_outline_sep">
        <img class="separator" src="<?= get_assets_directory_uri() ?>/images/farmoutline_sep.jpg" />
        <div class="farm_outline_ttl">
            <div class="section_ttl_wrap">
                <h2 class="section_ttl_ja">
                    <span>農園の概要</span>
                </h2>
                <img class="deco_left" src="<?= get_assets_directory_uri() ?>/images/farmoutline_deco1.png" />
                <img class="deco_right" src="<?= get_assets_directory_uri() ?>/images/relatedpost_illust_right.png" />
            </div>
        </div>
    </div>
    <div class="farm_outline_inner">
        <div class="farm_outline_table_wrap">
            <table class="farm_outline_table">
                <tr>
                    <th>農園名</th>
                    <td><?= get_the_title() ?></td>
                </tr>

                <?php if (get_field('pref') != '' || get_field('address') != ''): ?>
                    <tr>
                        <th>場所</th>
                        <td><?php the_field('pref');?><?= get_field('address') ?></td>
                    </tr>
                <?php endif; ?>

                <?php if (get_field('access_by_car') != '' || get_field('access_by_walk') != ''): ?>
                    <tr>
                        <th>アクセス</th>
                        <td>
                            <?php if (get_field('access_by_car') != ''): ?>
                                <div class="access_wrap">
                                    <strong>車でのアクセス</strong>
                                    <?= get_field('access_by_car') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (get_field('access_by_walk') != ''): ?>
                                <div class="access_wrap">
                                    <strong>交通機関からのアクセス</strong>
                                    <?= get_field('access_by_walk') ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if (get_field('parking') != ''): ?>
                    <tr>
                        <th>駐車場</th>
                        <td><?= get_field('parking') ?></td>
                    </tr>
                <?php endif; ?>

                <?php if (get_field('section') != ''): ?>
                    <tr>
                        <th>区画数</th>
                        <td><?= get_field('section') ?></td>
                    </tr>
                <?php endif; ?>

                <?php if (get_field('monthly_fee2') != '' || get_field('monthly_fee3') != ''): ?>
                    <tr>
                        <th>月額利用料・広さ</th>
                        <td>
                            <dl>
                                <dt>1 年目</dt>
                                <dd>
                                    <ul>
                                        <?php if (get_field('monthly_fee2') != ''): ?>
                                            <li><?= number_format(get_field('monthly_fee2')) ?>円<small>（税込）</small> / <?= get_field('menseki2') ?>m²</li>
                                        <?php endif; ?>
                                        <?php if (get_field('monthly_fee3') != ''): ?>
                                            <li><?= number_format(get_field('monthly_fee3')) ?>円<small>（税込）</small> / <?= get_field('menseki3') ?>m²</li>
                                        <?php endif; ?>
                                    </ul>
                                </dd>
                                <?php if (get_field('monthly_fee_2year2') != '' || get_field('monthly_fee_2year3') != ''): ?>
                                    <dt>2 年目以降</dt>
                                    <dd>
                                        <ul>
                                            <?php if (get_field('monthly_fee_2year2') != ''): ?>
                                                <li><?= number_format(get_field('monthly_fee_2year2')) ?>円<small>（税込）</small> / <?= get_field('menseki2') ?>m²</li>
                                            <?php endif; ?>
                                            <?php if (get_field('monthly_fee_2year3') != ''): ?>
                                                <li><?= number_format(get_field('monthly_fee_2year3')) ?>円<small>（税込）</small> / <?= get_field('menseki3') ?>m²</li>
                                            <?php endif; ?>
                                        </ul>
                                    </dd>
                                <?php endif; ?>
                            </dl>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if (get_field('operating_costs') != ''): ?>
                    <tr>
                        <th>運営費（年額）</th>
                        <td>
                            <dl>
                                <dt>初年度</dt>
                                <dd><?= number_format(get_field('operating_costs')) ?>円<small>（税込）</small></dd>
                                <?php if (get_field('operating_costs_2year') != ''): ?>
                                    <dt>2 年目以降</dt>
                                    <dd><?= number_format(get_field('operating_costs_2year')) ?>円<small>（税込）</small></dd>
                                <?php endif; ?>
                            </dl>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if (get_field('contract_period') != ''): ?>
                    <tr>
                        <th>契約期間</th>
                        <td><?= get_field('contract_period') ?></td>
                    </tr>
                <?php endif; ?>
                
                <tr>
                    <th>施設情報</th>
                    <td>
                        <ul class="facility_list">
                            <?php if (get_field('toilet') == 1): ?>
                                <li class="facility_item_on">
                                    <div class="icon_wrap"><img src="<?= get_assets_directory_uri() ?>/images/ico_wc.png" alt="トイレ"></div>
                                    <span>トイレ</span>
                                </li>
                            <?php endif; ?>
                            <?php if (get_field('water') == 1): ?>
                                <li class="facility_item_on">
                                    <div class="icon_wrap"><img src="<?= get_assets_directory_uri() ?>/images/ico_water.png" alt="水場"></div>
                                    <span>水場</span>
                                </li>
                            <?php endif; ?>
                            <?php if (get_field('parking_available') == 1): ?>
                                <li class="facility_item_on">
                                    <div class="icon_wrap"><img src="<?= get_assets_directory_uri() ?>/images/ico_parking.png" alt="駐車場"></div>
                                    <span>駐車場</span>
                                </li>
                            <?php endif; ?>
                            <?php if (get_field('rest_hut') == 1): ?>
                                <li class="facility_item_on">
                                    <div class="icon_wrap"><img src="<?= get_assets_directory_uri() ?>/images/ico_resthouse.png" alt="休憩小屋"></div>
                                    <span>休憩小屋</span>
                                </li>
                            <?php endif; ?>
                            <?php if (get_field('tools') == 1): ?>
                                <li class="facility_item_on">
                                    <div class="icon_wrap"><img src="<?= get_assets_directory_uri() ?>/images/ico_tools.png" alt="農具"></div>
                                    <span>農具</span>
                                </li>
                            <?php endif; ?>
                            <?php if (get_field('fertilizer') == 1): ?>
                                <li class="facility_item_on">
                                    <div class="icon_wrap"><img src="<?= get_assets_directory_uri() ?>/images/ico_hiryo.png" alt="肥料"></div>
                                    <span>肥料</span>
                                </li>
                            <?php endif; ?>
                            <?php if (get_field('advisor_available') == 1): ?>
                                <li class="facility_item_on">
                                    <div class="icon_wrap"><img src="<?= get_assets_directory_uri() ?>/images/ico_advisor.png" alt="アドバイザー"></div>
                                    <span>アドバイザー</span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </td>
                </tr>
                
                <?php if (get_field('characteristic') != ''): ?>
                    <tr>
                        <th>農園の特徴</th>
                        <td><?= get_field('characteristic') ?></td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
        <div class="section_btn_wrap">
            <?php if (in_array($empty_status, ['◯', '△'])): ?>
                <a class="btn_apply is_long" href="<?= (function_exists('get_myfarm_visit_url')) ? get_myfarm_visit_url() : '/free-visit/' ?>">無料見学申し込み</a>
            <?php elseif ($empty_status == '満席(空き待ち可)'): ?>
                <a class="btn_apply is_long" href="<?= (function_exists('get_myfarm_waitlist_url')) ? get_myfarm_waitlist_url() : '/waiting-for-availability/' ?>">空き待ち登録（無料）</a>
            <?php elseif ($empty_status == 'ハタムスビ'): ?>
                <a class="btn_apply is_long" href="<?= get_field('hatamusubi') ?>">お申込みはこちら</a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (get_field('advisor_name1') != '' || get_field('advisor_name2') != '' || get_field('advisor_name3') != '' || get_field('advisor_name4') != '' || get_field('advisor_name5') != ''): ?>
    <section class="farm_advisor">
        <div class="page_inner">
            <h2 class="section_ttl_ja is_bggray">
                <span>農園アドバイザー</span>
            </h2>
            <p class="section_top_txt">困ったときは頼ってください！</p>

            <div class="farm_advisors">
                <?php for ($i = 1; $i < 6; $i++): ?>
                    <?php if (get_field('advisor_name' . $i) == '') continue; ?>
                    <div class="advisor_wrap">
                        <div class="advisor_img">
                            <img src="<?= get_field('advisor_image' . $i) ?>" alt="<?= get_field('advisor_name' . $i) ?>">
                        </div>
                        <div class="advisor_detail">
                            <div class="advisor_name_wrap">
                                <p class="name"><?= get_field('advisor_name' . $i) ?></p>
                                <p class="kana"><?= get_field('advisor_name_kana' . $i) ?></p>
                            </div>
                            <p class="advisor_txt"><?= get_field('advisor_profile' . $i) ?></p>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="farm_calendar">
    <div class="page_inner">
        <h2 class="section_ttl_ja is_bggray">
            <span>アドバイザー出勤カレンダー</span>
        </h2>
        <p class="section_top_txt">アドバイザーの出勤・イベントの開催は、天候等により変更になる場合があります。<br>
            予めご了承のほど、よろしくお願いいたします。</p>
            <?php if (function_exists('get_myfarm_visit_url')): ?>
                <div style="max-width: 80%; margin: 4em auto 2em;">
                    <?= myfarm_advisor_calendar() ?>
                </div>
            <?php endif; ?>
        <div class="section_btn_wrap">
            <?php if (in_array($empty_status, ['◯', '△'])): ?>
                <a class="btn_apply is_long" href="<?= (function_exists('get_myfarm_visit_url')) ? get_myfarm_visit_url() : '/free-visit/' ?>">無料見学申し込み</a>
            <?php elseif ($empty_status == '満席(空き待ち可)'): ?>
                <a class="btn_apply is_long" href="<?= (function_exists('get_myfarm_waitlist_url')) ? get_myfarm_waitlist_url() : '/waiting-for-availability/' ?>">空き待ち登録（無料）</a>
            <?php elseif ($empty_status == 'ハタムスビ'): ?>
                <a class="btn_apply is_long" href="<?= get_field('hatamusubi') ?>">お申込みはこちら</a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
    // この農園に近いおすすめの農園
    $farm_pos_lat = get_field('latitude');
    $farm_pos_lng = get_field('longitude');
    $near_farms = get_near_farms(get_the_title(), $farm_pos_lat, $farm_pos_lng);
    set_query_var('near_farms', $near_farms);
    get_template_part('template-parts/components/near-farms');
