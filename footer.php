    </div>
    <!-- /.content -->

    <a class="pagetop" href="#"><img src="<?= get_assets_directory_uri() ?>/images/pagetop.png"></a>

    <footer>
        <div class="footer_container">
            <div class="footer_head">
                <img class="footer_logo" src="<?= get_assets_directory_uri() ?>/images/ft_logo.png" alt="体験農園マイファーム" />
                <div class="footer_btns">

                    <div class="balloon_btn_wrap">
                        <div class="footer_btn btn_balloon"><span>カスタマーセンター</span></div>
                        <a class="btn_tel" href="tel:0120-975-257">0120-975-257</a>
                    </div>

                    <div class="balloon_btn_wrap">
                        <div class="btn btn_balloon"><span>まずは近くの農園を探そう！</span></div>
                        <a class="btn_apply" href="/farms/">無料見学申し込み</a>
                    </div>

                </div>
            </div>
            <div class="footer_nav">
                <div class="footer_nav_main_wrap">
                    <ul class="footer_nav_main">
                        <li><a href="/about/">体験農園とは</a></li>
                        <li><a href="/about/#flow">ご利用の流れ</a></li>
                        <li><a href="/blog/">農園ブログ</a></li>
                        <li><a href="/event/">イベント</a></li>
                        <li><a href="/faq/">よくある質問</a></li>
                        <li><a href="/recruit/">アドバイザー募集</a></li>
                        <li><a href="https://myfarm.co.jp/farmland.html" class="external">農地活用</a></li>
                        <li><a href="https://myfarm.co.jp/company.html" class="external">運営会社</a></li>
                    </ul>
                    <div class="footer_sns pc">
                        <p class="followus">Follow Us</p>
                        <ul class="sns_list">
							<li><a href="https://www.facebook.com/myfarm.kyoto" target="_blank" rel="noopener noreferrer"><img src="<?= get_assets_directory_uri() ?>/images/ico_fb.png" alt="Facebook"></a></li>
							<li><a href="https://x.com/myfarmtweet?mx=2" target="_blank" rel="noopener noreferrer"><img src="<?= get_assets_directory_uri() ?>/images/ico_x.png" alt="X(Twitter)"></a></li>
							<li><a href="https://www.instagram.com/myfarm_photo/" target="_blank" rel="noopener noreferrer"><img src="<?= get_assets_directory_uri() ?>/images/ico_ig.png" alt="Instagram"></a></li>
							<li><a href="https://www.youtube.com/channel/UCWnnDWudmJ3YG6ifdhEf3iw" target="_blank" rel="noopener noreferrer"><img src="<?= get_assets_directory_uri() ?>/images/ico_yt.png" alt="Youtube"></a></li>
                        </ul>
                    </div>
                </div>

                <ul class="footer_links">
                    <li><a href="/tsukuru/">つくる通信</a></li>
                    <li><a href="/plus/">マイファームplus</a></li>
                    <li><a href="https://myfarm.co.jp/contact/farm">お問い合わせ</a></li>
                    <li><a href="https://myfarm.co.jp/privacypolicy.html">プライバシーポリシー</a></li>
                </ul>

                <div class="footer_area_wrap">
                    <p class="footer_area_ttl">農園一覧（全国）</p>
                    <ul class="footer_area">
                        <li><a href="/farms/?pref=東京#pagebreak">東京</a></li>
                        <li><a href="/farms/?pref=神奈川#pagebreak">神奈川</a></li>
                        <li><a href="/farms/?pref=千葉#pagebreak">千葉</a></li>
                        <li><a href="/farms/?pref=埼玉#pagebreak">埼玉</a></li>
                        <li><a href="/farms/?pref=愛知#pagebreak">愛知</a></li>
                        <li><a href="/farms/?pref=滋賀#pagebreak">滋賀</a></li>
                        <li><a href="/farms/?pref=奈良#pagebreak">奈良</a></li>
                        <li><a href="/farms/?pref=京都#pagebreak">京都</a></li>
                        <li><a href="/farms/?pref=大阪#pagebreak">大阪</a></li>
                        <li><a href="/farms/?pref=兵庫#pagebreak">兵庫</a></li>
                        <li><a href="/farms/?pref=福岡#pagebreak">福岡</a></li>
                        <li><a href="/farms/#pagebreak">全国</a></li>
                    </ul>
                </div>

                <?php get_template_part('template-parts/footer/banner'); ?>
            </div>
            <div class="footer_sns sp">
                <p class="followus">Follow Us</p>
                <ul class="sns_list">
                    <li><a href="https://www.facebook.com/myfarm.kyoto" target="_blank" rel="noopener noreferrer"><img src="<?= get_assets_directory_uri() ?>/images/ico_fb.png" alt="Facebook"></a></li>
                    <li><a href="https://x.com/myfarmtweet?mx=2" target="_blank" rel="noopener noreferrer"><img src="<?= get_assets_directory_uri() ?>/images/ico_x.png" alt="X(Twitter)"></a></li>
                    <li><a href="https://www.instagram.com/myfarm_photo/" target="_blank" rel="noopener noreferrer"><img src="<?= get_assets_directory_uri() ?>/images/ico_ig.png" alt="Instagram"></a></li>
                    <li><a href="https://www.youtube.com/channel/UCWnnDWudmJ3YG6ifdhEf3iw" target="_blank" rel="noopener noreferrer"><img src="<?= get_assets_directory_uri() ?>/images/ico_yt.png" alt="Youtube"></a></li>
                </ul>
            </div>
            <div class="copyright">
                Copyright &copy; マイファーム All Rights Reserved.
            </div>
        </div>
    </footer>

    <div id="loading-overlay" style="display: none;">
        <div id="loading-spinner"></div>
    </div>

	<?php wp_footer(); ?>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- matchHeight -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
    <!-- Js -->
    <script src="<?= get_assets_directory_uri() ?>/js/script.js?v=<?= filemtime(get_stylesheet_directory() . '/assets/js/script.js') ?>"></script>

    <?php if (is_post_type_archive('event')): ?>
        <script src="<?= get_assets_directory_uri() ?>/js/event.js?v=<?= filemtime(get_stylesheet_directory() . '/assets/js/event.js') ?>"></script>
    <?php elseif (is_post_type_archive('farms')): ?>
        <script src="<?= get_assets_directory_uri() ?>/js/farms.js?v=<?= filemtime(get_stylesheet_directory() . '/assets/js/farms.js') ?>"></script>
    <?php elseif (is_page('farms-map')): ?>
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_nKFDCEdLLWIXvGegcIeRv8IWwU1s84o&libraries=places"></script>
        <script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
        <script src="<?= get_assets_directory_uri() ?>/js/map.js?v=<?= filemtime(get_stylesheet_directory() . '/assets/js/map.js') ?>"></script>
    <?php endif; ?>

	<!-- Yahoo タグマネージャ -->
	<script type="text/javascript">
	(function () {
		var tagjs = document.createElement("script");
		var s = document.getElementsByTagName("script")[0];
		tagjs.async = true;
		tagjs.src = "//s.yjtag.jp/tag.js#site=WlexIoP";
		s.parentNode.insertBefore(tagjs, s);
	}());
	</script>
	<noscript>
	<iframe src="//b.yjtag.jp/iframe?c=WlexIoP" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
	</noscript>
	<!-- End Yahoo タグマネージャ -->
</body>
</html>
