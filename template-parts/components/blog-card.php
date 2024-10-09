<article>
    <a href="<?php the_permalink(); ?>">
        <div class="post_thumbnail">
            <?php if (has_post_thumbnail()): ?>
                <?= the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
            <?php endif; ?>
        </div>
        <div class="posts_info">
            <?php
                $category = '';
                $category_slug = '';
                $categories = get_the_category();
                if (!empty($categories)) {
                    $category = esc_html($categories[0]->name);
                    $category_slug = esc_html($categories[0]->slug);
                } elseif (get_post_type() == 'event'){
                    $category = 'イベント';
                    $category_slug = 'frontpage-event';
                }
            ?>
            <span class="cat <?= $category_slug ?>"><?= $category ?></span>
            <time><?= get_the_date('Y.m.d') ?></time>
        </div>
        <h3><?= get_the_title() ?></h3>
    </a>
</article>
