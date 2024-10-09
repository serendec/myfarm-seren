<?php
global $post;
$areas = wp_get_post_terms($post->ID, 'event-area');
$categories = wp_get_post_terms($post->ID, 'event-category');

// 開催開始日
$event_start_dayOfWeek = '';
$event_start_date = get_field('event_start_date');
if (!empty($event_start_date)){
    $event_start_dayOfWeek = getJapaneseDayOfWeek($event_start_date);
    $event_start_date = new DateTime($event_start_date);
}

// 開催終了日
$event_end_dayOfWeek = '';
$event_end_date = get_field('event_end_date');
if (!empty($event_end_date)){
    $event_end_dayOfWeek = getJapaneseDayOfWeek($event_end_date);
    $event_end_date = new DateTime($event_end_date);
}

?>

<div class="event_item <?= get_field('event_status')['value'] ?>">
    <a href="<?= the_permalink() ?>">
        <div class="event_img">
            <?php if (has_post_thumbnail()): ?>
                <?= the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
            <?php endif; ?>
        </div>
        <div class="event_item_detail">
            <div class="event_category">
                <?php if (!empty($areas)): foreach ($areas as $area): ?>
                    <span><?= esc_html($area->name) ?></span>
                <?php endforeach; endif; ?>
                <?php if (!empty($categories)): foreach ($categories as $category): ?>
                    <span><?= esc_html($category->name) ?></span>
                <?php endforeach; endif; ?>
            </div>
            <h3 class="event_name"><?= the_title() ?></h3>
            <p class="event_date">
                <?= $event_start_date->format('Y') ?>/<span><?= $event_start_date->format('n') ?>/<?= $event_start_date->format('j') ?></span>(<?= $event_start_dayOfWeek ?>)
                <?php if (!empty($event_end_date) && $event_start_date != $event_end_date): ?>
                    &nbsp;- <?= $event_end_date->format('Y') ?>/<span><?= $event_end_date->format('n') ?>/<?= $event_end_date->format('j') ?></span>(<?= $event_end_dayOfWeek ?>)
                <?php endif; ?>
            </p>
        </div>
    </a>
</div>
<!-- /.event_item -->
