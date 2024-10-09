<div class="gfa_topics">
    <?php if (has_post_thumbnail()): ?>
        <?= the_post_thumbnail('full', ['alt' => get_the_title(), 'class' => 'gfa_topics_img']); ?>
    <?php endif; ?>
    <div class="gfa_topics_ttl">
        <a href="<?= get_permalink() ?>"><?= get_the_title() ?></a>
        <div class="gfa_topics_cat">
            <?php
                $category = '';
                $categories = get_the_category();
                if (!empty($categories)) {
                    $category = esc_html($categories[0]->name);
                }
            ?>
            <span><?= $category ?></span>
        </div>
    </div>
</div>
