<form id="faq-search-form" class="faq_form" method="get" action="<?= esc_url(home_url('/faq/')) ?>">
    <label>キーワード検索</label>
    <span class="search_form_wrap">
        <input type="text" name="s" id="faq-search" class="area_input" placeholder="検索キーワードを入力してください" value="<?= get_search_query(); ?>">
        <input type="hidden" name="post_type" value="faq" />
        <img class="search_icon" src="<?= get_assets_directory_uri() ?>/images/ico_search.png" onclick="document.getElementById('faq-search-form').submit();">
    </span>
</form>
