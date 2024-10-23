<?php
global $post;
$body_class = '';
if (is_front_page()) {
    $body_class = 'home';
} elseif (is_page() || is_404()) {
    $body_class = 'page page_' . $post->post_name;
} elseif (is_archive() || is_home()) {
    $body_class = 'archive';
} else {
    $body_class = 'single';
}

$title_jp = '';
$title_en = '';
if (is_404()) {
    $title_jp = 'エラー';
    $title_en = 'Error';
} elseif (is_post_type_archive('faq') || is_tax('faq-category')) {
    $title_jp = 'よくある質問';
    $title_en = 'Q&A';
} elseif (is_post_type_archive('event')) {
    $title_jp = 'イベント';
    $title_en = 'EVENT';
} elseif (is_post_type_archive('news') || is_singular('news')) {
    $title_jp = 'お知らせ';
    $title_en = 'NEWS';
} elseif (is_post_type_archive('farms') || is_page('farms-map')) {
    $title_jp = '農園をさがす';
    $title_en = 'AREA SEARCH';
} elseif (is_archive() || is_home()) {
    $title_jp = '農園ブログ';
    $title_en = 'BLOG';
} elseif (is_single() && get_post_type() === 'post') {
    $title_jp = get_the_title();
    $title_en = 'BLOG';
} elseif (is_page('about')) {
    $title_jp = '体験農園とは';
    $title_en = 'TRIAL FARM';
} elseif (is_page()) {
    $title_jp = get_the_title();

    if (strpos($post->post_name, '-') !== false) {
        $title_en_ary = explode('-', $post->post_name);
        foreach ($title_en_ary as $key => $val) {
            $title_en .= strtoupper($val);
            if ($key < count($title_en_ary) - 1) {
                $title_en .= ' ';
            }
        }
    } else {
        $title_en = strtoupper($post->post_name);
    }
}

// プラグイン用
$request_uri = $_SERVER['REQUEST_URI'];
$request_uri = rtrim($request_uri, '/');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TP8LFS2');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WN655MY2E4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-WN655MY2E4');
    </script>
    <!-- End Global site tag (gtag.js) - Google Analytics 4 -->

    <?php include(get_stylesheet_directory() . '/meta.php'); ?>
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="<?= get_assets_directory_uri() ?>/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?= get_assets_directory_uri() ?>/css/reset.css" />
    <link rel="stylesheet" href="<?= get_assets_directory_uri() ?>/css/style.css?v=<?= filemtime(get_stylesheet_directory() . '/assets/css/style.css') ?>" />

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <?php if (is_page('tsukuru')): ?>
        <link
            href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Fredoka:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&family=Outfit:wght@100..900&family=Overpass:ital,wght@0,100..900;1,100..900&family=Righteous&display=swap"
            rel="stylesheet">
    <?php else: ?>
        <link
            href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Outfit:wght@100..900&family=Passion+One:wght@400;700;900&family=Zen+Kaku+Gothic+New:wght@400;500;700&&display=swap"
            rel="stylesheet" />
    <?php endif; ?>

    <!-- SwiperCSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body class="<?= $body_class ?>">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TP8LFS2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header>
        <div class="header_container">
            <h1 class="header_logo">
                <a href="/"><img src="<?= get_assets_directory_uri() ?>/images/logo.png" alt="体験農園マイファーム" /></a>
            </h1>

            <div class="nav_pc_wrap">
                <nav class="nav_pc">
                    <div class="nav_pc_upper">
                        <ul class="nav_pc_link is_yellow">
                            <li><a href="https://mypage.myfarmer.jp/customers/sign_in">マイページ</a></li>
                            <li><a href="https://myfarm.co.jp/contact/farm">お問い合わせ</a></li>
                        </ul>
                        <a href="tel:0120-975-257" class="nav_pc_tel_link">
                            <div class="nav_pc_tel">
                                <span class="nav_pc_tel_label">カスタマーセンター</span>
                                <span class="nav_pc_tel_number">0120-975-257</span>
                            </div>
                        </a>
                    </div>
                    <ul class="nav_pc_link">
                        <li><a href="/about/">体験農園とは</a></li>
                        <li><a href="/about/#flow">ご利用の流れ</a></li>
                        <li><a href="/news/">お知らせ</a></li>
                        <li><a href="/blog/">農園ブログ</a></li>
                        <li><a href="/event/">イベント</a></li>
                        <li><a href="/faq/">よくある質問</a></li>
                    </ul>
                </nav>
                <div class="nav_pc_btns">
                    <div class="balloon_btn_wrap">
                        <div class="btn_balloon"><span>無料見学申し込み</span></div>
                        <a class="btn_apply" href="/farms/">近くの農園を探す</a>
                    </div>
                </div>
            </div>

            <div class="nav_sp">
                <input type="checkbox" id="open" name="menuopen" />
                <label for="open" class="menu_btn">
                    <span class="top_bar"></span>
                    <span class="center_bar"></span>
                    <span class="under_bar"></span>
                </label>
            </div>
            <div class="drawer">
                <div class="drawer_logo">
                    <a href="/"><img src="<?= get_assets_directory_uri() ?>/images/logo.png" alt="体験農園マイファーム" /></a>
                </div>
                <ul class="drawer_menu">
                    <li><a href="/about/">体験農園とは</a></li>
                    <li><a href="/about/#flow">ご利用の流れ</a></li>
                    <li><a href="/news/">お知らせ</a></li>
                    <li><a href="/blog/">農園ブログ</a></li>
                    <li><a href="/event/">イベント</a></li>
                    <li><a href="https://myfarm.co.jp/contact/farm">お問い合わせ</a></li>
                    <li><a href="/recruit/">アドバイザー募集</a></li>
                    <li><a href="https://mypage.myfarmer.jp/customers/sign_in">マイページ</a></li>
                </ul>
                <!-- /.drawer_menu -->
            </div>
            <!-- /.drawer -->
        </div>
    </header>
    <!-- /header -->

    <div class="content <?= is_page() ? 'page_content' : ''; ?>">
        <?php if (!is_front_page()) : ?>
            <?php if (is_page('tsukuru')): ?>
                <div class="tsukuru_header">
                    <img class="tsukuru_logo" src="<?= get_assets_directory_uri() ?>/images/paper_ttl.png">
                </div>
                <div class="tsukuru_section">
                    <?php get_template_part('template-parts/header/breadcrumb'); ?>
                <?php elseif (is_page('about')): ?>
                    <!-- nobreadcrumb -->
                <?php elseif (preg_match('#^/visit(/|$)#', $request_uri) || preg_match('#^/waitlist(/|$)#', $request_uri)): ?>
                    <!-- nobreadcrumb -->
                <?php elseif (is_page('plus')): ?>
                    <div class="page_header myfarmplus_header">
                        <div class="page_inner">
                            <h1 class="myfarmplus_ttl">
                                <span class="myfarmplus_ttl_sub">法人・団体さま向けサービス</span>
                                <span class="myfarmplus_ttl_main"><span class="is_green">マイファームplus</span>のご紹介</span>
                            </h1>
                        </div>
                    </div>
                    <?php get_template_part('template-parts/header/breadcrumb'); ?>
                <?php elseif (is_page('green')): ?>
                    <div class="gfa_header_wrap">
                        <div class="gfa_header">
                            <img class="gfa_mv" src="<?= get_assets_directory_uri() ?>/images/gfa_mv.jpg" alt="グリーン未来活動">
                            <img class="gfa_floating02 flo01" src="<?= get_assets_directory_uri() ?>/images/gfa_floating01.png">
                            <img class="gfa_floating05 flo02" src="<?= get_assets_directory_uri() ?>/images/gfa_floating02.png">
                            <img class="gfa_floating02 flo03" src="<?= get_assets_directory_uri() ?>/images/gfa_floating03.png">
                            <img class="gfa_floating05 flo04" src="<?= get_assets_directory_uri() ?>/images/gfa_floating04.png">
                            <img class="gfa_floating02 flo05" src="<?= get_assets_directory_uri() ?>/images/gfa_floating01.png">
                            <img class="flo06" src="<?= get_assets_directory_uri() ?>/images/gfa_floating05.png">
                            <img class="gfa_floating01 flo07" src="<?= get_assets_directory_uri() ?>/images/gfa_floating06.png">
                            <img class="gfa_floating03 flo08" src="<?= get_assets_directory_uri() ?>/images/gfa_floating07.png">
                            <img class="gfa_floating04 flo09" src="<?= get_assets_directory_uri() ?>/images/gfa_floating08.png">
                        </div>
                    </div>
                    <?php get_template_part('template-parts/header/breadcrumb'); ?>
                <?php elseif (is_page() || is_archive() || is_home() || (is_single() && get_post_type() === 'post') || is_post_type_archive('news') || is_singular('news') || is_post_type_archive('farms')): ?>
                    <div class="page_header <?= $post->post_name ?>_header">
                        <div class="page_header_inner">
                            <h1><span class="en"><?= $title_en ?></span><span class="ja"><?= $title_jp ?></span></h1>
                        </div>
                        <?php get_template_part('template-parts/header/breadcrumb'); ?>
                    </div>
                <?php else: ?>
                    <?php get_template_part('template-parts/header/breadcrumb'); ?>
                <?php endif; ?>
            <?php endif; ?>