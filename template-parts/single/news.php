<article class="post_body news">
    <time class="post_date"><?= get_the_date('Y.m.d') ?></time>
    <h1><?= the_title() ?></h1>

    <div>
        <main class="post_body_content">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?= the_content(); ?>
            <?php endwhile; endif; ?>
        </main>
        <div class="section_btn_wrap">
            <a href="/news/" class="section_btn more"><span>お知らせ一覧</span></a>
        </div>
    </div>
</article>
