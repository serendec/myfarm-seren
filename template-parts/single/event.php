<?php
$areas = wp_get_post_terms($post->ID, 'event-area');
$categories = wp_get_post_terms($post->ID, 'event-category');

// 開催日
$event_start_date = get_field('event_start_date');
$event_end_date = get_field('event_end_date');
if (!empty($event_start_date)){
    $event_start_dayOfWeek = getJapaneseDayOfWeek($event_start_date);
    $event_start_date = new DateTime($event_start_date);
}
if (!empty($event_end_date)){
    $event_end_dayOfWeek = getJapaneseDayOfWeek($event_end_date);
    $event_end_date = new DateTime($event_end_date);
}

// 似たイベント
$similar_events = get_related_events($post->ID);

?>

<article class="post_body event_body">
    <div class="event_category">
        <?php if (!empty($areas)): foreach ($areas as $area): ?>
            <span><?= esc_html($area->name) ?></span>
        <?php endforeach; endif; ?>
        <?php if (!empty($categories)): foreach ($categories as $category): ?>
            <span><?= esc_html($category->name) ?></span>
        <?php endforeach; endif; ?>
    </div>
    <h1><?= the_title() ?></h1>

    <div class="event_detail_body">
        <div class="event_detail_content">
            <div class="event_img">
                <?php if (has_post_thumbnail()): ?>
                    <?= the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                <?php endif; ?>
            </div>

            <div class="event_info_table_btn sp">
                <span class="event_info_table_btn_enable"><?= get_field('event_status')['label'] ?></span>
                <?php if (!empty(get_field('event_form_url'))): ?>
                    <a class="event_info_table_btn_apply" href="<?= get_field('event_form_url') ?>">お申込みはこちら</a>
                <?php endif; ?>
            </div>

            <div class="event_info">
                <table class="event_info_table">
                    <tbody>
                        <tr>
                            <th>開催日</th>
                            <td>
                                <div class="event_info_table_date_wrap">
                                    <span class="event_info_table_date">
                                        <?php if (!empty($event_start_date)): ?>
                                            <?= $event_start_date->format('Y') ?>/<span><?= $event_start_date->format('n') ?>/<?= $event_start_date->format('j') ?></span>(<?= $event_start_dayOfWeek ?>)
                                        <?php endif; ?>
                                        <?php if (!empty($event_end_date)): ?>
                                            &nbsp;-&nbsp;<?= $event_end_date->format('Y') ?>/<span><?= $event_end_date->format('n') ?>/<?= $event_end_date->format('j') ?></span>(<?= $event_end_dayOfWeek ?>)
                                        <?php endif; ?>
                                        <br><?= get_field('event_time') ?>
                                    </span>
                                    <div class="event_info_table_btn pc">
                                        <span class="event_info_table_btn_enable"><?= get_field('event_status')['label'] ?></span>
                                        <?php if (!empty(get_field('event_form_url'))): ?>
                                            <a class="event_info_table_btn_apply" href="<?= get_field('event_form_url') ?>">お申込みはこちら</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>場所</th>
                            <td>
                                <span><?= get_field('event_place') ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th>料金</th>
                            <td>
                                <span><?= get_field('event_fee') ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th>募集人数</th>
                            <td>
                                <span><?= get_field('participants_number') ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="post_body_content">
                <?= the_content() ?>
            </div>

            <!-- /.event_list -->
            <div class="section_btn_wrap">
                <?php if (!empty(get_field('event_form_url'))): ?>
                    <a class="btn_apply event_apply_btn" href="<?= get_field('event_form_url') ?>"><span>お申込みはこちら</span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="post_footer">
        <div class="separator_bg info">
            <img src="<?= get_assets_directory_uri() ?>/images/relatedpost_sep.png" />
        </div>
        <div class="post_footer_inner">
            <section class="other_event_wrap">
                <div class="section_ttl_wrap">
                    <p class="section_ttl_en is_m">Other Event</p>
                    <h2 class="section_ttl_ja">
                        <span>似たイベントはこちら</span>
                    </h2>
                    <img class="deco_left" src="<?= get_assets_directory_uri() ?>/images/relatedpost_illust_left.png" />
                    <img class="deco_right" src="<?= get_assets_directory_uri() ?>/images/relatedpost_illust_right.png" />
                </div>
                <div class="event_list">

                    <?php if (!empty($similar_events)): foreach ($similar_events as $post): setup_postdata($post); ?>
                        <?php get_template_part('template-parts/components/event-card-portrait'); ?>
                    <?php endforeach; endif; ?>
                </div>
                <!-- /.event_list -->
                <div class="section_btn_wrap">
                    <a class="section_btn back" href="/event/"><span>イベント一覧に戻る</span></a>
                </div>
            </section>
        </div>
    </div>
</article>
