<?php
// よくある質問取得
$args = array(
    'post_type' => 'faq',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'faq-category',
            'field'    => 'slug',
            'terms'    => 'faq-advisor',
        ),
    ),
);

$faq_query = new WP_Query($args);

?>

<section class="page_section">
    <p class="section_ttl_en is_m">About Farm Advisor</p>
    <h2 class="section_ttl_ja is_bggray">
        <span>農園アドバイザーとは？</span>
    </h2>

    <img class="advisors_img" src="<?= get_assets_directory_uri() ?>/images/advisors.jpg" alt="農園アドバイザーとは？">

    <div class="recruit_top_message">
        <div class="recruit_top_message_inner">
            <span class="pc_txt">『農』の楽しみを人に伝え、分かち合うこと</span><br>
            <span class="pc_txt">のできるやりがいのあるお仕事です。</span>
            <span class="sp_txt">『農』の楽しみを人に伝え、</span><br>
            <span class="sp_txt">分かち合うことのできる</span><br>
            <span class="sp_txt">やりがいのあるお仕事です。</span>
        </div>
    </div>
</section>

<img class="separator" src="<?= get_assets_directory_uri() ?>/images/advisor_sep.jpg" />

<section class="advisor_section">
    <div class="advisor_columns">
        <div class="advisor_txt_column">
            <p>
                マイファームは2007年に第一号の体験農園をオープンしました。以来、現在全国でおよそ120箇所以上展開する農園では、「自産自消」を楽しむ利用者様が年々増えています。<br>
                そんな利用者様をサポートする「農園アドバイザー」は、マイファームの農園の一番の魅力です。野菜づくりのサポート、農園の維持管理といった業務はもちろん、これまでのご経験や知識を存分に発揮して「利用者様の農園で過ごす楽しい時間」の演出をお願いしております。<br>
                「自分でつくって、自分で食べる」ことを通じて、「農」の楽しみを人に伝え、分かち合うことのできる「農園アドバイザー」は、やりがいのあるお仕事です。<br>
                マイファームの農園で「農園アドバイザー」として、一緒に自産自消のある社会をつくりませんか？
            </p>
            <div class="section_btn_wrap">
                <a href="https://hrmos.co/pages/myfarm/jobs" class="section_btn advisor_btn">
                    <span>農園アドバイザー募集一覧</span>
                </a>
            </div>
        </div>
        <div class="advisor_img_column">
            <img src="<?= get_assets_directory_uri() ?>/images/advisors_photo.png" alt="農園アドバイザー">
        </div>
    </div>

    <div class="marquee-container recruit_marquee_w">
        <div class="marquee">
            <span>FARM Advisor</span>
            <span>FARM Advisor</span>
            <span>FARM Advisor</span>
            <span>FARM Advisor</span>
        </div>
    </div>
</section>

<section class="page_section padding_xl">
    <div class="page_inner">
        <p class="section_ttl_en is_m">Introduction</p>
        <h2 class="section_ttl_ja is_bggray">
            <span>アドバイザー紹介</span>
        </h2>

        <p class="advisor_top_txt">現在マイファームの農園で働いている先輩アドバイザーたちを一部ご紹介します！</p>

        <div class="advisor_list">
            <div class="advisor_item">
                <div class="advisor_text_column">
                    <div class="advisor_info">
                        <span class="advisor_carrier">アドバイザー暦 13年</span>
                        <span class="advisor_area">羽曳野・八尾エリア／関西</span>
                    </div>

                    <div class="advisor_name">
                        <span>三井 正一さん</span>
                    </div>

                    <div class="advisor_img_column sp">
                        <img src="<?= get_assets_directory_uri() ?>/images/advisor_01.jpg" alt="農園アドバイザー">
                    </div>

                    <div class="advisor_description">
                        緑を見るのが大好きという三井さん。<br>
                        豊富な農業知識をお持ちで、穏やかで丁寧なアドバイスが人気です。<br>
                        また、「餅つき大会」「味噌づくり」などのイベント発起人としても活躍され、野菜栽培についてもっと学びたくなるような環境をつくられています。
                    </div>
                </div>

                <div class="advisor_img_column">
                    <img class="pc" src="<?= get_assets_directory_uri() ?>/images/advisor_01.jpg" alt="農園アドバイザー">
                </div>
            </div>

            <div class="advisor_item">
                <div class="advisor_text_column">
                    <div class="advisor_info">
                        <span class="advisor_carrier">アドバイザー暦 10年</span>
                        <span class="advisor_area">横浜かたくら担当/ 関東</span>
                    </div>

                    <div class="advisor_name">
                        <span>原尻 美保さん</span>
                    </div>

                    <div class="advisor_img_column sp">
                        <img src="<?= get_assets_directory_uri() ?>/images/advisor_02.png" alt="農園アドバイザー">
                    </div>

                    <div class="advisor_description">
                        昆虫や小動物との共生、環境に負担をかけない野菜づくりを心がけた無農薬無肥料不耕起栽培で、お野菜・和洋ハーブを育てている地元神奈川区民のハマっ子原尻さん。もともとデザイン関連の仕事をしていましたが、植物への情熱が高じ、アドバイザーへ。現在は、アドバイバー業務をしながら、自家栽培のハーブを生かし、ハーブコーディネーターとしても活動中です。
                    </div>
                </div>

                <div class="advisor_img_column ">
                    <img class="pc" src="<?= get_assets_directory_uri() ?>/images/advisor_02.png" alt="農園アドバイザー">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page_section advisor_faq_section">

    <div class="marquee-container recruit_marquee">
        <div class="marquee">
            <span>FARM Advisor</span>
            <span>FARM Advisor</span>
            <span>FARM Advisor</span>
            <span>FARM Advisor</span>
        </div>
    </div>

    <div class="page_inner">
        <?php if ($faq_query->have_posts()): ?>
            <p class="section_ttl_en is_m">Q&A</p>
            <h2 class="section_ttl_ja is_bggray">
                <span>よくあるご質問</span>
            </h2>

            <div class="faq_list advisor_faq_list">
                <?php while ($faq_query->have_posts()): $faq_query->the_post(); ?>
                    <div class="faq_item">
                        <div class="faq_question">
                            <span><?= get_the_title() ?></span>
                        </div>
                        <div class="faq_answer">
                            <span><?= the_content() ?></span>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="section_btn_wrap">
            <a href="https://hrmos.co/pages/myfarm/jobs" class="section_btn advisor_btn">
                <span>農園アドバイザー募集一覧</span>
            </a>
        </div>
    </div>
</section>