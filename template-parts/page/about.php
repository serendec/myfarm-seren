<?php
// よくある質問（体験農園について）を取得
$args = array(
    'posts_per_page' => 3,
    'post_type' => 'faq',
    'tax_query' => array(
        array(
            'taxonomy' => 'faq-category',
            'field'    => 'slug',
            'terms'    => 'faq-farming-activities',
        ),
    ),
    'post_status' => 'publish',
    'orderby'     => 'date',
    'order'       => 'DESC',
);

$faq_query = new WP_Query($args);

?>

<div class="about_header pc">
    <div class="about_header_inner">
        <p class="section_ttl_en is_m">About Services</p>
        <h1 class="section_ttl_ja is_bggray">
            <span>体験農園とは？</span>
        </h1>
        <p class="about_header_main">体験農園マイファームは、<br>
            「とっておきの野菜づくり」をすることで<br>
            <span>自産自消のある暮らしを楽しめる貸し農園</span>です。
        </p>
        <p class="about_header_sub">この場所で、「農」と「私らしさ」を融合させ、こころとからだでワクワクしてほしい。<br>
            ワクワクの方向は、十人十色。味わう、健やかになる、学ぶ、関わりを広げる、くつろぐ etc…<br>
            ジブン色のワクワクが見つかったとき、つくる・食べるを超えた、「とっておきの野菜づくり」が始まります。</p>
    </div>
</div>

<div class="about_header_sp sp">
    <img src="<?= get_assets_directory_uri() ?>/images/ph_about.jpg" alt="体験農園とは？">
    
    <div class="about_header_sp_inner">
        <p class="section_ttl_en is_m">About Services</p>
        <h1 class="section_ttl_ja is_bggray">
            <span>体験農園とは？</span>
        </h1>
        <p class="about_header_main">体験農園マイファームは、<br>
            「とっておきの野菜づくり」をすることで<br>
            <span>自産自消のある暮らしを楽しめる貸し農園</span>です。
        </p>
        <p class="about_header_sub">この場所で、「農」と「私らしさ」を融合させ、<br class="sp">こころとからだでワクワクしてほしい。<br>
            ワクワクの方向は、十人十色。<br class="sp">味わう、健やかになる、学ぶ、<br class="sp">関わりを広げる、くつろぐ etc…<br>
            ジブン色のワクワクが見つかったとき、<br class="sp">つくる・食べるを超えた、<br class="sp">「とっておきの野菜づくり」が始まります。</p>
    </div>
</div>

<div class="separator_wave about_separator">
    <img src="<?= get_assets_directory_uri() ?>/images/about_separator.png" alt="">
</div>

<section class="page_section trial_feature_section">
    <div class="page_inner">
        <div class="section_ttl_wrap">
            <h2 class="section_ttl_ja">
                <span>体験農園サービスの特長</span>
            </h2>
        </div>

        <div class="trial_feature_column">
            <div class="trial_feature_item">
                <span class="num">01</span>
                <h3>個性ゆたかな<br class="sp"><span>農園アドバイザー</span></h3>
                <img class="trial_feature_img" src="<?= get_assets_directory_uri() ?>/images/trial_feature01.jpg" alt="個性ゆたかな農園アドバイザー">
                <p>経験豊富な「自産自消アドバイザー」が初心者からこだわり派まで、野菜づくりをサポートします。栽培のアドバイスだけでなく、体験農園マイファームでのいろいろな楽しみ方も皆さまにお伝えします。
                </p>
            </div>
            <div class="trial_feature_item">
                <span class="num">02</span>
                <h3>有機の<span>野菜づくり</span></h3>
                <img class="trial_feature_img" src="<?= get_assets_directory_uri() ?>/images/trial_feature02.jpg" alt="有機の野菜づくり">
                <p>化学肥料や化学農薬を使わず栽培することが、体験農園マイファームの基本ルールです。自然からの恵みを大切にし、持続可能な野菜づくりを一緒に楽しみましょう。</p>
            </div>
        </div>
        <div class="trial_feature_item last">
            <span class="num">03</span>
            <img class="trial_feature_img" src="<?= get_assets_directory_uri() ?>/images/trial_feature03.jpg" alt="未来を育む体験農園">
            <div class="trial_feature_item_inner">
                <h3>未来を育む<span>体験農園</span></h3>
                <p>体験農園マイファームでは、野菜づくりだけでなく、貸し農園という場所として地域や自然に寄り添った農園作りをしています。それに向けてマイファームは「グリーン未来活動」の取り組みに挑戦しています。一緒に心地よい自然との関わり方を見つけましょう。
                </p>
                <a href="/green/" class="section_btn"><span>グリーン未来活動を見る</span></a>
            </div>
        </div>

        <div class="section_ttl_wrap">
            <h2 class="section_ttl_ja is_margin_s">
                <span>設備・資材について</span>
            </h2>
            <p class="section_top_txt">野菜づくりに必要なものが農園に揃っています。<br>
                種、苗、資材などの持ち込みOK!自分好みに選ぶところから楽しめます。<br>
                困ったときは、自産自消アドバイザーに聞いてみましょう！</p>

            <div class="trial_equipment_column">
                <div class="trial_equipment_item">
                    <h3>「体験農園」にあるもの</h3>
                    <ul>
                        <li>農具 (鍬・シャベル・ハサミなど)</li>
                        <li>肥料 (油粕・鶏糞・石灰など)</li>
                        <li>つくる通信 (年4回発刊)、固定種の種 (毎月)</li>
                    </ul>
                    <img src="<?= get_assets_directory_uri() ?>/images/trial_equip01.jpg" alt="設備・資材について">
                </div>
                <div class="trial_equipment_item">
                    <h3>お持ち込みいただけるもの</h3>
                    <ul>
                        <li>種、苗</li>
                        <li>支柱やネット等の資材</li>
                        <li><span>衣類・靴<br><small>※ご自身の区画にて保管いただくことになります。</small></span></li>
                    </ul>
                    <img src="<?= get_assets_directory_uri() ?>/images/trial_equip02.jpg" alt="設備・資材について">
                </div>
            </div>
            <div class="section_btn_wrap">
                <a href="/farms-map/" class="section_btn mapsearch_btn"><span>近くの農園を探す</span></a>
            </div>
        </div>
    </div>
</section>

<img class="note_top_yellow separator" src="<?= get_assets_directory_uri() ?>/images/note_top_yellow.svg">
<section class="page_section trial_note_section">
    <div class="page_inner">
        <img class="trial_vegetable" src="<?= get_assets_directory_uri() ?>/images/trial_vegetable.svg">
        <h2 class="section_ttl_ja is_margin_s">
            <span>とっておきの<span class="is_green">野菜づくり</span>を</span>
            <span>してみませんか？</span>
        </h2>

        <p class="section_top_txt">
            楽しい、おいしい、心地良い。<br>
            畑は“気づき”と”学び”の場所です。<br>
            ワクワクする方向は、ひとそれぞれ。<br>
            たべるつくりを超えたもの、野菜づくりだけでなく、<br>
            <strong>農×わたしらしさを融合</strong>させて、自分なりのワクワクを探してみましょう。
        </p>

        <div class="trial_note_column">
            <div class="trial_note_item">
                <span class="num">01</span>
                <h3>味わう</h3>
                <img class="trial_note_img" src="<?= get_assets_directory_uri() ?>/images/trial_note01.jpg" alt="味わう">
                <div class="trial_note_ttl_wrap">
                    <p class="trial_note_ttl">16㎡のカラダにやさしい庭</p>
                    <p class="trial_note_user">利用者Mさん</p>
                </div>
                <p class="trial_note_txt">
                    ガーデニングのような雰囲気を出したかったので、アドバイザーさんと相談し、花壇の枠を作り、堆肥をすき込み、「16mの小さな庭」を再現しました。
                    この庭にあるような花や葉っぱを摘んで取り入れる提案や野菜の花を目でみて楽しんで、なおかつ食べられる。そんな風に、「育てて食べてみる」暮らしの提案をしたいと思っています。
                    今後は体験農園を1つの場所として、植物の力を伝えていく活動を続けたいと考えています。
                    <span class="story_tag">#畑で自分のやりたい世界観を表現</span>
                </p>
                <button class="read-more-btn">続きをみる</button>
            </div>
            <div class="trial_note_item">
                <span class="num">02</span>
                <h3>健やかになる</h3>
                <img class="trial_note_img" src="<?= get_assets_directory_uri() ?>/images/trial_note02.jpg" alt="健やかになる">
                <div class="trial_note_ttl_wrap">
                    <p class="trial_note_ttl">自然と共に、健康と楽しみを見出す</p>
                    <p class="trial_note_user">利用者Rさんご夫婦</p>
                </div>
                <p class="trial_note_txt">
                    定年後、自然との触れ合いと健康維持のために、私たちは畑を始めました。野菜の枯れに悩んでいた時、アドバイザーさんに「野菜の生命力があるから」と聞き、色々と試してみたら、立ち上がってくれました。
                    力強い野菜の生命力をいただく、そういうのがいいなと感じました。
                    今後は自家製のらっきょう作りやサツマイモの育成を楽しみながら、シンプルな素材の良さを活かし、健康な畑生活を続けていきます。
                    <span class="story_tag">#リタイア後の仲良し夫婦の週末</span>
                </p>
                <button class="read-more-btn">続きをみる</button>
            </div>
            <div class="trial_note_item">
                <span class="num">03</span>
                <h3>学ぶ</h3>
                <img class="trial_note_img" src="<?= get_assets_directory_uri() ?>/images/trial_note03.jpg" alt="学ぶ">
                <div class="trial_note_ttl_wrap">
                    <p class="trial_note_ttl">どうしたら美味しく作れるかを探求する</p>
                    <p class="trial_note_user">利用者Hさん</p>
                </div>
                <p class="trial_note_txt">
                    食材にこだわり、安心して食べてもらえるラーメン屋を経営しています。農園で自らつくった野菜を提供することもあります。
                    野菜のことを学ぶと、甘みの原因も理解でき、料理の味の組み立て方が次第と分かってきます。
                    お客さんが美味しいと言ってくれた時は本当にしいです。
                    畑での学びが仕事と繋がり、日々ワクワクを感じています。
                    <span class="story_tag">#体験農園→AIC→ラーメン屋</span>
                </p>
                <button class="read-more-btn">続きをみる</button>
            </div>
            <div class="trial_note_item">
                <span class="num">04</span>
                <h3>繋がる</h3>
                <img class="trial_note_img" src="<?= get_assets_directory_uri() ?>/images/trial_note04.jpg" alt="繋がる">
                <div class="trial_note_ttl_wrap">
                    <p class="trial_note_ttl">趣味で始めて生業としての果樹園へ</p>
                    <p class="trial_note_user">利用者Iさんご夫婦</p>
                </div>
                <p class="trial_note_txt">
                    畑で季節の移り変わりを感じるのが好きで、アドバイザーさんに会うことも大きな楽しみでした。
                    共通の趣味として始めた家庭菜園でしたが、次第に農業で生計を立て、自然豊かな場所で暮らしたいと思うようになりました。
                    体験農園を5年間楽しんだ後、長野県に移住し、今は果園を営んでいます。
                    アドバイザーさんとの出会いと体験農園での経験が、移住・就農という人生の大きな決断につながりました。
                    <span class="story_tag">＃アドバイザーとの出会い、移住・就農への決断</span>
                </p>
                <button class="read-more-btn">続きをみる</button>
            </div>
            <div class="trial_note_item">
                <span class="num">05</span>
                <h3>くつろぐ</h3>
                <img class="trial_note_img" src="<?= get_assets_directory_uri() ?>/images/trial_note05.jpg" alt="くつろぐ">
                <div class="trial_note_ttl_wrap">
                    <p class="trial_note_ttl">心地よい空間で迎える、畑仕事前の朝ごはん</p>
                    <p class="trial_note_user">利用者Yさん</p>
                </div>
                <p class="trial_note_txt">
                    畑では野菜だけでなく花も育て、全体のバランスをみて日当たりや株の高さを調整しながら、植物にも自分にも心地よい空間を意識して育てています。
                    植物と昆虫が共存している環境で、畑作業の前に朝ごはんを楽しんだりもしています。
                    愛を込めてお手入れをしながら、彼らと対話し、元気に成長していく姿を見ているととても嬉しくなります。
                    将来的に自宅の庭で、このくつろぎの空間を持てるよう、農園で学びながら実践しています。
                    <span class="story_tag">#夢を形にする畑づくり</span>
                </p>
                <button class="read-more-btn">続きをみる</button>
            </div>
        </div>
    </div>
</section>

<section class="page_section padding_xl trial_vision_section">
    <div class="page_inner">
        <div class="section_ttl_wrap">
            <h2 class="section_ttl_ja is_margin_s">
                <span>私たちが目指す</span>
                <span>『自産自消のできる社会』とは</span>
            </h2>
            <img class="cloud_left" src="<?= get_assets_directory_uri() ?>/images/nextstory_cloud_left.png" />
            <img class="cloud_right" src="<?= get_assets_directory_uri() ?>/images/nextstory_cloud_right.png" />
        </div>

        <p class="section_top_txt">
            そんな風に、とっておきの野菜づくりを楽しむ方々がいっぱいの世界が<br class="pc">
            マイファームが目指す「自産自消のできる社会」です。
        </p>
        <p class="section_top_txt">
            当社がサービス開始した2007年当時は、まだ体験農園が一般的ではありませんでした。<br class="pc">
            しかし、いまでは全国に広がり、体験農園の数は全国トップクラスになりました。
        </p>

        <div class="vision_circles">
            <span class="vision_circle">耕作放棄地<br>の増加</span>
            <span class="vision_circle">農家の<br>減少</span>
            <span class="vision_circle">フードロス</span>
        </div>

        <p class="section_top_txt">
            農業界の課題はたくさんありますが、<br class="pc">
            その原因は私たち、食べる人、一人ひとりの食への意識が下がってしまったことが原因です。
        </p>

        <p class="section_top_txt">だから、私たちは野菜づくりを通して、人と自然の距離を近づけます。 </p>

        <p class="section_top_txt">自然と同じように、多様性あふれる「自産自消(=とっておきの野菜づくり)」を楽しむ人が<br class="pc">
            体験農園マイファームを通じて増えることで、楽しく社会課題を解決しています。 </p>

        <div class="section_btn_wrap">
            <a href="/farms-map/" class="section_btn mapsearch_btn"><span>近くの農園を探す</span></a>
        </div>
    </div>
</section>

<section id="flow" class="page_section padding_xl trial_flow_section">
    <div class="page_inner">
        <h2 class="section_ttl_ja is_margin_s is_bggray">
            <span>ご利用の流れ</span>
        </h2>

        <div class="trial_flow_list">
            <div class="trial_flow_item">
                <h3><span class="num"><img src="<?= get_assets_directory_uri() ?>/images/box_01.svg"></span><span class="flow_ttl">農園見学</span>
                </h3>
                <p>事前にWEBまたはお電話で予約をいただき、農園見学にお越しください。<br>
                    当農園の「自産自消アドバイザー」がご案内し、ご利用方法について詳しく説明いたします。</p>
            </div>

            <div class="trial_flow_item">
                <h3><span class="num"><img src="<?= get_assets_directory_uri() ?>/images/box_02.svg"></span><span class="flow_ttl">お申込み</span>
                </h3>
                <p>農園現地で契約書に必要事項をご記入いただき、お申込み完了です。</p>
            </div>

            <div class="trial_flow_item">
                <h3><span class="num"><img src="<?= get_assets_directory_uri() ?>/images/box_03.svg"></span><span class="flow_ttl">ご利用開始</span>
                </h3>
                <p>初回は「自産自消アドバイザー」と一緒に作業を行います。<br>
                    道具の使い方や畝の立て方などをご紹介し、その後はご自身のペースでご来園いただけます。</p>
            </div>

            <div class="trial_flow_item">
                <h3><span class="num"><img src="<?= get_assets_directory_uri() ?>/images/box_04.svg"></span><span class="flow_ttl">お支払い</span>
                </h3>
                <p>初年度運営費(入会金)および1年間の区画利用料金をお支払いください。
                    なお、区画利用料金は各農園ごとに異なりますのでご注意ください。※見学時にお支払いは行いませんのでご留意ください。</p>
                <p class="flow_payment_ttl">〈お支払い方法〉</p>
                <ul>
                    <li>銀行振込(一括)</li>
                    <li>クレジットカード(12分割・一括)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="page_section padding_xl trial_faq_section">
    <div class="page_inner">
        <h2 class="section_ttl_ja is_bggray">
            <span>よくあるご質問</span>
        </h2>

        <div class="faq_list">
            <?php if ($faq_query->have_posts()): while ($faq_query->have_posts()): $faq_query->the_post(); ?>
                <div class="faq_item">
                    <div class="faq_question">
                        <span><?= get_the_title() ?></span>
                    </div>
                    <div class="faq_answer">
                        <span><?= the_content() ?></span>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>

        <div class="section_btn_wrap">
            <a href="/faq/faq-category/faq-farming-activities/" class="section_btn more"><span>もっと知りたい</span></a>
        </div>
    </div>
</section>

<img class="separator" src="<?= get_assets_directory_uri() ?>/images/advisor_sep.jpg" />
<section class="page_section trial_farmland_section">

    <div class="trial_farmland_container">
        <img class="trial_farmland_left" src="<?= get_assets_directory_uri() ?>/images/trial_farmland_left.png">

        <div class="trial_farmland_content">
            <h2 class="section_ttl_ja is_margin_s">
                <span>体験農園マイファームの</span>
                <span class="is_green">農地について</span>
            </h2>

            <p class="section_top_txt">体験農園マイファームには日々、<br>
                農地を所有の方（オーナー様）からお問い合わせをいただきます。<br>
                そのほとんどは「この農地を守っていきたい」という切実なものです。<br>
                当社では体験農園を利益重視の不動産活用の手段として、<br>
                積極的な営業活動を行うのではなく、オーナー様の思いを重視して<br>
                新規開園・運営する方針です。
            </p>

            <p class="section_top_txt">
                そのため、時には元々が水田だったがために水はけが悪かったり、<br>
                ふかふかの土ではないような農園もございます。しかしながら、<br>
                数年単位で体験農園のご利用者様と楽しんで野菜づくりをすることで、<br>
                驚くほどに上質な土になった畑に生まれ変わることができます。
            </p>

            <p class="section_top_txt">
                都市部にある限り少ない農地を、利用者様・オーナー様・<br>
                当社が協力しながら守っていくことができれば幸いです。
            </p>
        </div>

        <img class="trial_farmland_right" src="<?= get_assets_directory_uri() ?>/images/trial_farmland_right.png">

        <img class="trial_farmland_sp" src="<?= get_assets_directory_uri() ?>/images/trial_farmland_sp.png">
    </div>

</section>

<section class="page_section padding_xl myfarmplus_search">
    <div class="page_inner">
        <div class="search_icon_wrap"><span></span></div>
        <h2 class="myfarmplus_search_ttl">
            農園をさがす
        </h2>
        <p class="myfarmplus_search_txt">マイファーム体験農園は、関東・関西・東海エリアを中心に開園しておりますので、<br class="pc">
            ご自宅から通いやすい農園や少し足を延ばした自然に囲まれた農園がきっと見つかります。<br class="pc">
            気になるエリアをクリックすると一覧が表示されます。</p>

        <div class="area_buttons">
            <a class="area_button off" data-state="off" href="/farms/?pref=東京#pagebreak">東京</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=神奈川#pagebreak">神奈川</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=千葉#pagebreak">千葉</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=埼玉#pagebreak">埼玉</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=愛知#pagebreak">愛知</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=滋賀#pagebreak">滋賀</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=奈良#pagebreak">奈良</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=京都#pagebreak">京都</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=大阪#pagebreak">大阪</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=兵庫#pagebreak">兵庫</a>
            <a class="area_button off" data-state="off" href="/farms/?pref=福岡#pagebreak">福岡</a>
        </div>
    </div>

    <div class="section_btn_wrap">
        <a href="/farms-map/" class="section_btn search_btn">
            <span>近くの農園を探す</span>
        </a>
    </div>
</section>
