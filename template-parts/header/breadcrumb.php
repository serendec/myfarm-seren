<div class="breadcrumbs_wrap <?= (is_page('plus') || is_page('green')) ? 'no_bg' : '' ?>">
    <div class="breadcrumb">
        <ul>
            <li><a href="/">TOP</a></li>
            <?php if (is_404()): ?>
                <li><span>エラー</span></li>
            <?php elseif (is_post_type_archive('faq')): ?>
                <li><span>よくある質問</span></li>
            <?php elseif (is_tax('faq-category')): ?>
                <?php $current_term = get_queried_object(); ?>
                <li><a href="/faq/">よくある質問</a></li>
                <li><span><?= esc_html($current_term->name); ?></span></li>
            <?php elseif (is_post_type_archive('event')): ?>
                <li><span>イベント</span></li>
            <?php elseif (is_singular('event')): ?>
                <li><a href="/event/">イベント</a></li>
                <li><span><?= get_the_title(); ?></span></li>
            <?php elseif (is_post_type_archive('news')): ?>
                <li><span>お知らせ</span></li>
            <?php elseif (is_singular('news')): ?>
                <li><a href="/news/">お知らせ</a></li>
                <li><span><?= get_the_title(); ?></span></li>
            <?php elseif (is_post_type_archive('farms') || is_page('farms-map')): ?>
                <?php if ((isset($_GET['pref']) && !empty($_GET['pref']))): ?>
                    <li><a href="/farms/">農園をさがす</a></li>
                    <li><span><?= sanitize_text_field($_GET['pref']) ?></span></li>
                <?php else: ?>
                    <li><span>農園をさがす</span></li>
                <?php endif; ?>
            <?php elseif (is_singular('farms')): ?>
                <li><a href="/farms/">農園をさがす</a></li>
                <li><span><?= get_the_title(); ?></span></li>
            <?php elseif (is_archive() || is_home()): ?>
                <li><span>農園ブログ</span></li>
            <?php elseif (is_single()): ?>
                <li><a href="/blog/">農園ブログ</a></li>
                <li><span><?= get_the_title(); ?></span></li>
            <?php elseif (is_page()): ?>
                <li><span><?= get_the_title(); ?></span></li>
            <?php endif; ?>
        </ul>
    </div>
</div>