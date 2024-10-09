<article>
    <a href="<?= the_permalink() ?>">
        <?php if (has_post_thumbnail()): ?>
            <div class="post_thumbnail">
                <?= the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
            </div>
        <?php endif; ?>
        <div class="post_content">
            <h3><?= the_title() ?></h3>
            <time><?= get_the_date('Y.m.d') ?></time>
        </div>
    </a>
</article>
