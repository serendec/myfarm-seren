<?php
// ACFで指定されたブログ・イベントを取得し、順番に格納
$selected_posts = array();
for ($i = 1; $i <= 6; $i++) {
    $blog = get_field('blog_' . $i);
    if ($blog) {
        $selected_posts[$i] = $blog; // $i-1 でゼロベースのインデックスに対応
    }
}
$specific_blog_num = count($selected_posts);
if ($specific_blog_num < 6) {
    $args = array(
        'post_type'      => array('post', 'event'),
        'posts_per_page' => (6 - $specific_blog_num),
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post__not_in'   => wp_list_pluck($selected_posts, 'ID'), // 既に選ばれている投稿のIDを除外
    );
    $latest_posts = get_posts($args);

    // 最新記事を順次空いている位置に追加
    foreach ($latest_posts as $post) {
        for ($i = 1; $i < 7; $i++) {
            if (!isset($selected_posts[$i])) {
                $selected_posts[$i] = $post;
                break;
            }
        }
    }
}
ksort($selected_posts);

// お知らせ3件取得
$args = array(
    'post_type'      => 'news',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$news_query = new WP_Query($args);

get_header();

?>

<div class="mv">
    <div class="mv_columns">
        <div class="mv_txt">
            <img src="<?= get_assets_directory_uri() ?>/images/mv_txt.png" alt="とっておきの野菜づくり 私らしい自産自消のある暮らし" />
        </div>
        <div class="mv_img">
            <img class="mv_pc" src="<?= get_assets_directory_uri() ?>/images/mv_photo.jpg" />
            <img class="mv_sp" src="<?= get_assets_directory_uri() ?>/images/mv_sp.jpg" />
        </div>
    </div>
</div>

<section class="about_section">
    <img class="about_content" src="<?= get_assets_directory_uri() ?>/images/top_about_content.png" alt="農✖️私らしさ こころとからだで感じるとっておきの野菜づくり">
    <a class="section_btn about_btn" href="/about/">
        <span>体験農園<br />マイファームとは</span>
    </a>
</section>

<section class="search">
    <div class="search_bg"></div>
    <div class="search_box">
        <div class="search_icon_wrap"><span></span></div>
        <h2>近くの<span>農園を検索</span>する</h2>
        <p>
            マイファーム体験農園は、関東・関西・東海エリアを中心に開園しています。<br />
            ご自宅から通いやすい農園や少し足を延ばした自然に囲まれた農園がきっと見つかります。
        </p>
        <div class="section_btn_wrap">
            <a href="/farms-map/" class="section_btn mapsearch_btn"><span>現在地で探す</span></a>
        </div>
        <img class="search_img" src="<?= get_assets_directory_uri() ?>/images/search_illust.png" />
    </div>
</section>

<div class="separator_bg story">
    <img src="<?= get_assets_directory_uri() ?>/images/story_sep.png" />
</div>
<section class="nextstory">
    <div class="section_ttl_wrap">
        <p class="section_ttl_en">Next Story</p>
        <h2 class="section_ttl_ja">
            <span>次の一歩へ、</span><br /><span>自産自消ストーリー</span>
        </h2>
        <img class="cloud_left" src="<?= get_assets_directory_uri() ?>/images/nextstory_cloud_left.png" />
        <img class="cloud_right" src="<?= get_assets_directory_uri() ?>/images/nextstory_cloud_right.png" />
    </div>

    <svg width="0" height="0" viewBox="0 0 461 380">
        <defs>
            <clipPath id="imgMask" clipPathUnits="objectBoundingBox">
                <path transform="scale(0.0021692,0.00263158)" d="M422.287 259.857C400.542 276.468 378.219 284.023 359.589 304.035C330.664 335.137 305.341 368.447 261.434 377.416C224.521 384.948 184.631 375.914 154.529 353.383C128.212 333.679 105.682 311.148 77.3798 293.631C62.1671 284.243 43.5378 277.595 30.0333 265.976C6.46386 245.742 -4.84761 211.018 1.96235 180.822C8.0567 153.807 25.878 141.768 44.2072 123.655C62.3979 105.653 74.6789 82.3264 84.4437 58.9561C96.2862 30.5936 124.634 10.2715 155.521 2.87165C179.045 -2.76109 201.898 0.0221491 223.829 9.67512C242.573 17.9365 260.441 28.7823 281.54 29.3124C313.005 30.1076 347.078 21.6916 373.025 44.8632C393.431 63.1088 396.663 93.2826 417.393 111.263C426.673 119.304 437.246 125.975 445.326 135.208C476.698 171.081 456.891 233.372 422.287 259.835V259.857Z" />
            </clipPath>
        </defs>
    </svg>

    <div class="swiper nextstory_slider infinite_slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="nextstory_masked" src="<?= get_assets_directory_uri() ?>/images/ns03.jpg" alt="利用者Rさんご夫婦" />
                <h3>
                    <span>自然と共に、健康と楽しみを見出す</span><br /><span>利用者Rさんご夫婦</span>
                </h3>
                <p>
                    定年後、自然との触れ合いと健康維持のために畑を始めました。育てた野菜の力強い生命力を感じながら、シンプルな素材の良さを活かし、これからも健康的な畑生活を続けていきたいです。
                </p>
                <span class="story_tag">#リタイア後の仲良し夫婦の週末</span>
            </div>
            <div class="swiper-slide">
                <img class="nextstory_masked" src="<?= get_assets_directory_uri() ?>/images/ns01.jpg" alt="利用者Hさん" />
                <h3>
                    <span>どうしたら美味しく作れるかを探求する</span><br /><span>利用者Hさん</span>
                </h3>
                <p>
                    食材にこだわり、安心して食べてもらえるラーメン屋を経営しています。野菜のことを学ぶと、甘みの原因も理解でき、料理の味の組み立て方が次第と分かってきます。畑での学びが仕事と繋がり、日々ワクワクを楽しんでいます。
                </p>
                <span class="story_tag">#体験農園→AIC→ラーメン屋</span>
            </div>
            <div class="swiper-slide">
                <img class="nextstory_masked" src="<?= get_assets_directory_uri() ?>/images/ns05.jpg" alt="利用者Iさんご夫婦" />
                <h3>
                    <span>趣味で始めて生業としての果樹園へ</span><br /><span>利用者Iさんご夫婦</span>
                </h3>
                <p>
                    畑で季節の移り変わりを感じることやアドバイザーさんに会うことは、大きな楽しみでした。趣味として始めた家庭菜園でしたが、ここでの経験や出会いが、移住や就農という人生の大きな決断につながりました。
                </p>
                <span class="story_tag">#アドバイザーとの出会い、移住・就農への決断</span>
            </div>
            <div class="swiper-slide">
                <img class="nextstory_masked" src="<?= get_assets_directory_uri() ?>/images/ns02.jpg" alt="利用者Mさん" />
                <h3>
                    <span>16㎡のカラダにやさしい庭</span><br /><span>利用者Mさん</span>
                </h3>
                <p>
                    16㎡のエディブルガーデンは、さまざまな国のハーブや野菜、果物が仲良く混在し、アドバイザーさんの協力で実現しました。畑で花や葉の香りと味を楽しみながら、集まる蜂や蝶の羽音に耳をすませるひとときは、私の小さな楽園です。
                </p>
                <span class="story_tag">#畑で自分のやりたい世界観を表現</span>
            </div>
            <div class="swiper-slide">
                <img class="nextstory_masked" src="<?= get_assets_directory_uri() ?>/images/ns04.jpg" alt="利用者Yさん" />
                <h3>
                    <span>心地よい空間で迎える、畑仕事前の朝ごはん</span><br /><span>利用者Yさん</span>
                </h3>
                <p>
                    野菜だけでなく花も育て、植物や自分にとって心地よい空間作りを意識しています。植物と昆虫が共存する環境で、畑作業の前に朝ごはんを楽しんだりも。将来、自宅の庭にこのくつろぎの空間を持てるよう、農園で実践しています。
                </p>
                <span class="story_tag">#夢を形にする畑づくり</span>
            </div>
        </div>
    </div>
    <div class="section_btn_wrap">
        <a class="section_btn more" href="/blog/2024-08-next_story_riyosyanokoe/"><span>もっと読む</span></a>
    </div>
</section>

<section class="farmblog">
    <img class="note_top" src="<?= get_assets_directory_uri() ?>/images/note_top.png" />
    <div class="container">
        <p class="section_ttl_en">Farm Blog & Event</p>
        <h2 class="section_ttl_ja">
            <span>農園ブログ＆イベント</span>
        </h2>

        <div class="farmblog_posts first-page">
            <?php if (!empty($selected_posts)): foreach ($selected_posts as $post): setup_postdata($post); ?>
                    <?php get_template_part('template-parts/components/blog-card'); ?>
            <?php endforeach;
            endif; ?>
        </div>
        <div class="section_btn_wrap">
            <a class="section_btn more" href="/blog/"><span>もっと読む</span></a>
        </div>
    </div>
    <img class="farmblog_illust_bottom" src="<?= get_assets_directory_uri() ?>/images/blog_img02.png" />
</section>

<section class="myfarmtv">
    <div class="section_ttl_wrap">
        <p class="section_ttl_en">MyFarm TV</p>
        <h2 class="section_ttl_ja">
            <span>マイファームTV</span>
        </h2>
        <img class="cloud_left" src="<?= get_assets_directory_uri() ?>/images/myfarmtv_cloud_left.png" />
        <img class="cloud_right" src="<?= get_assets_directory_uri() ?>/images/myfarmtv_cloud_right.png" />
    </div>

    <div class="movie_list">
        <?php
        /** 制御クラスの読み込み */
        require_once __DIR__ . '/../../../php_libs/App.php';
        $args = array(
            'playlist' => 'PL7wZ0WWnn0XyNYTxLB2S58UNel9u8PNoZ', //プレイリストID
            'token' => 'AIzaSyAgSv7B5oRPu3swkIXhlgkilYBR-TfVn1g', //アクセストークン
            'maxResults' => 4, //表示数 指定なし''デフォルト設定数の20個
        );
        $youtube = new Util_Youtube();
        call_user_func_array(array($youtube, 'setResponse'), $args);
        ?>
    </div>
    <div class="movie_list_bg_bottom">
        <img src="<?= get_assets_directory_uri() ?>/images/tv_bg_bottom.png" />
    </div>
    <div class="section_btn_wrap">
        <a href="https://www.youtube.com/@myfarmTV" class="section_btn more" target="_blank" rel="noopener noreferre"><span>もっと見る</span></a>
    </div>
</section>

<div class="separator_bg news">
    <img src="<?= get_assets_directory_uri() ?>/images/news_sep.png" />
    <img class="news_illust" src="<?= get_assets_directory_uri() ?>/images/news_illust.png" />
</div>

<section class="news">
    <p class="section_ttl_en">News</p>
    <h2 class="section_ttl_ja">
        <span>お知らせ</span>
    </h2>
    <div class="news_posts">
        <?php if ($news_query->have_posts()): while ($news_query->have_posts()): $news_query->the_post(); ?>
                <?php get_template_part('template-parts/components/news-card'); ?>
        <?php endwhile;
        endif; ?>
    </div>
    <div class="section_btn_wrap">
        <a href="/news/" class="section_btn more"><span>もっと見る</span></a>
    </div>
</section>

<div class="separator_bg info">
    <img src="<?= get_assets_directory_uri() ?>/images/story_sep.png" />
</div>
<section class="information">
    <p class="section_ttl_en">Information</p>
    <h2 class="section_ttl_ja">
        <span>マイファームからご案内</span>
    </h2>

    <div class="info_columns">
        <div class="info_img_column">
            <img src="<?= get_assets_directory_uri() ?>/images/info02.png" />
        </div>
        <div class="info_txt_column first">
            <h3><span><small>法人・団体向け</small>『マイファームplus』</span></h3>
            <p>通常の農園利用に栽培管理などのオプションを付けられる、法人・団体様向けサービスです。福利厚生で農園を利用したい、自家栽培の野菜をお店で提供したい等、様々な用途で活用いただけます。</p>
            <a href="/plus/" class="section_btn info_btn"><span>もっと見る</span></a>
        </div>
    </div>
    <div class="info_columns">
        <div class="info_img_column">
            <img src="<?= get_assets_directory_uri() ?>/images/info03.png" />
        </div>
        <div class="info_txt_column second">
            <h3>農体験プロデュース</h3>
            <p>
                企業・自治体みなさま、農業への一歩を踏み出す為の課題を解決し、マンションや保育園や施設の屋上を活用して農に触れるシーンを創ります。ぜひ、ご自身の手で農体験プロデュースしてみませんか？
            </p>
            <a href="https://myfarm.co.jp/service/experience/produce" class="section_btn info_btn external" target="_blank" rel="noopener noreferrer"><span>もっと見る</span></a>
        </div>
    </div>
    <div class="info_columns">
        <div class="info_img_column">
            <img src="<?= get_assets_directory_uri() ?>/images/info04.png" />
        </div>
        <div class="info_txt_column third">
            <h3>農地の有効活用</h3>
            <p>
                眠っている農地・遊休地・生産緑地を体験農園としてリメイクしませんか？<br>
                畑に、新しいにぎわいが生まれます。眠っている農地・遊休地・生産緑地を体験農園としてリメイクしませんか？
            </p>
            <a href="https://myfarm.co.jp/farmland.html" class="section_btn info_btn external" target="_blank" rel="noopener noreferrer"><span>もっと見る</span></a>
        </div>
    </div>
    <div class="info_footer">
        <img class="info_footer_bg" src="<?= get_assets_directory_uri() ?>/images/ft_bg.png" />
        <div class="scroll_infinity_wrap">
            <div class="scroll_infinity_inner mod_01">
                <img src="<?= get_assets_directory_uri() ?>/images/ft_infinity.png" />
            </div>
            <div class="scroll_infinity_inner mod_02">
                <img src="<?= get_assets_directory_uri() ?>/images/ft_infinity.png" />
            </div>
        </div>
    </div>
</section>

<?php get_footer();
