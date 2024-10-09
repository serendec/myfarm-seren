<?php
// 農園ブログ（生物多様性）
$args = array(
    'posts_per_page' => 2,
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'category_name'  => 'biodiversity'
);
$biodiversity_query = new WP_Query($args);

// 農園ブログ（環境循環）
$args = array(
    'posts_per_page' => 2,
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'category_name'  => 'environmental-circulation'
);
$environment_query = new WP_Query($args);

// 農園ブログ（防災対策）
$args = array(
    'posts_per_page' => 2,
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'category_name'  => 'disaster-measures'
);
$disaster_query = new WP_Query($args);

// 農園ブログ（交流）
$args = array(
    'posts_per_page' => 2,
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'category_name'  => 'exchange'
);
$event_query = new WP_Query($args);

?>

<section class="page_section">
    <div class="page_inner">
        <div class="gfa_title_wrap">
            <img src="<?= get_assets_directory_uri() ?>/images/gfa_textlogo.svg" alt="Green Future Activities">
            <h1>グリーン未来活動とは？</h1>
        </div>

        <p class="section_top_txt">体験農園マイファームは、自然や地球とともに幸せに暮らせる未来を目指しています。<br>
            そのために、生物多様性・環境循環・防災対策・交流を軸に、<br class="pc">
            さまざまな活動を農園利用者や地域の皆さんと行っています。<br>
            ぜひ、体験農園のご利用を通して、心地よい自然との関わり方を一緒に探してみませんか？
        </p>
    </div>
</section>

<section class="page_section gfa_section">
    <div class="gfa_section_inner">
        <h2 class="gfa_section_title"><span>生物多様性</span></h2>
        <p>畑にはいろんな生き物がいます。ぜひ観察してみてください。私たちが美味しい野菜を収穫できるのも、多くの生き物のおかげ。体験農園マイファームでは、都市部でこの多様性を守り、豊かな自然を次の世代に繋いでいくことを目指しています。</p>
        <div class="gfa_images">
            <div class="gfa_image_wrap">
                <img class="gfa_image" src="<?= get_assets_directory_uri() ?>/images/gfa_1_1.jpg">
            </div>
            <div class="gfa_image_wrap">
                <img class="gfa_image" src="<?= get_assets_directory_uri() ?>/images/gfa_1_2.jpg">
            </div>
        </div>
    </div>

    <div class="page_inner">
        <div class="gfa_topics_box">
            <?php if ($biodiversity_query->have_posts()): while ($biodiversity_query->have_posts()): $biodiversity_query->the_post(); ?>
                <?php get_template_part('template-parts/components/green-blog-card'); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="page_section gfa_section">
    <div class="gfa_section_inner">
        <h2 class="gfa_section_title"><span>環境循環</span></h2>
        <p>人が作物を育てるように、人も自然に育てられています。体験農園マイファームでは、各農園において自然の恵みをいかした多様な循環型デザインを導入しております。さらに、新たな取り組みとして高機能バイオ炭を採用し、CO2削減に挑戦。これまで続けてきた取り組みを強化し、今後もグリーンな自産自消を推進します。</p>
        <div class="gfa_images">
            <div class="gfa_image_wrap">
                <img class="gfa_image" src="<?= get_assets_directory_uri() ?>/images/gfa_2_1.jpg">
            </div>
            <div class="gfa_image_wrap">
                <img class="gfa_image" src="<?= get_assets_directory_uri() ?>/images/gfa_2_2.jpg">
            </div>
        </div>
    </div>

    <div class="page_inner">
        <div class="gfa_topics_box">
            <?php if ($environment_query->have_posts()): while ($environment_query->have_posts()): $environment_query->the_post(); ?>
                <?php get_template_part('template-parts/components/green-blog-card'); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="page_section gfa_section">
    <div class="gfa_section_inner">
        <h2 class="gfa_section_title"><span>防災対策</span></h2>
        <p>日本は自然災害が多い国。万が一の際に、都市農地としての体験農園を、一次避難場所や地域の支援拠点として活用できるよう整備を進めています。また、体験農園を通じてコミュニティの結束を高め、地域の防災意識向上にも貢献しています。</p>
        <div class="gfa_images">
            <div class="gfa_image_wrap">
                <img class="gfa_image" src="<?= get_assets_directory_uri() ?>/images/gfa_3_1.jpg">
            </div>
            <div class="gfa_image_wrap">
                <img class="gfa_image" src="<?= get_assets_directory_uri() ?>/images/gfa_3_2.jpg">
            </div>
        </div>
    </div>
    <div class="page_inner">
        <div class="gfa_topics_box">
            <?php if ($disaster_query->have_posts()): while ($disaster_query->have_posts()): $disaster_query->the_post(); ?>
                <?php get_template_part('template-parts/components/green-blog-card'); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="page_section gfa_section">
    <div class="gfa_section_inner">
        <h2 class="gfa_section_title"><span>交流</span></h2>
        <p>体験農園には、小さなお子さん連れから定年後の趣味として畑をされている方まで、いろんな年代の方が集まる都市部では貴重な場です。そこで、イベントやワークショップ、地域の方々も参加できる農作業など、「開かれた場」としての農園を目指しています。地域の温かさを感じられる場として、多くの方にご利用いただいています。</p>
        <div class="gfa_images">
            <div class="gfa_image_wrap">
                <img class="gfa_image" src="<?= get_assets_directory_uri() ?>/images/gfa_4_1.jpg">
            </div>
            <div class="gfa_image_wrap">
                <img class="gfa_image" src="<?= get_assets_directory_uri() ?>/images/gfa_4_2.jpg">
            </div>
        </div>
    </div>

    <div class="page_inner">
        <div class="gfa_topics_box">
            <?php if ($event_query->have_posts()): while ($event_query->have_posts()): $event_query->the_post(); ?>
                <?php get_template_part('template-parts/components/green-blog-card'); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="gfa_search">
    <div class="search_box">
        <div class="search_icon_wrap"><span></span></div>
        <h2><span>体験農園マイファーム</span>を<br>のぞいてみる！</h2>
        <div class="section_btn_wrap">
            <a href="/farms-map/" class="section_btn mapsearch_btn"><span>近くの農園を探す</span></a>
        </div>
    </div>
</section>

<section class="page_section gfa_footer">
    <div class="page_inner">
        <div class="gfa_footer_columns">
            <div class="gfa_footer_column">
                <img class="gfa_peoples pc" src="<?= get_assets_directory_uri() ?>/images/gfa_footer_peoples.svg">
            </div>
            <div class="gfa_footer_txt_column">
                <p class="gfa_footer_ttl">一緒に<span>自産自消のできる社会</span>を<br>つくりませんか?</p>
                <a href="https://myfarm.co.jp/contact.html" class="section_btn more gfa_more"><span>農地活用、ビジネスコラボの<br>ご相談はこちら</span></a>
            </div>
        </div>
    </div>
    <img class="gfa_footer_illust pc" src="<?= get_assets_directory_uri() ?>/images/gfa_footer_bg.png">
    <img class="gfa_footer_illust sp" src="<?= get_assets_directory_uri() ?>/images/gfa_foooter_bg_sp.png">
</section>
