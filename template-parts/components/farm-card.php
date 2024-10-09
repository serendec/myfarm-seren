<?php
$farm = get_query_var('farm');
$farm_meta = get_farm_detail($farm['ID']);
$address = '';
if (!empty($farm_meta['pref']) && !empty($farm_meta['address'])) {
    if (mb_strpos($farm_meta['address'], $farm_meta['pref']) === 0) {
        //$farm_meta['address']に都道府県名が入っている 
        $address = $farm_meta['address'];
    } else {
        $address = $farm_meta['pref'].$farm_meta['address'];
    }
} elseif (!empty($farm_meta['pref'])) {
    $address = $farm_meta['pref'];
} elseif (!empty($farm_meta['address'])) {
    $address = $farm_meta['address'];
}

?>

<div class="farm_item">
    <h3 class="farm_name"><?= $farm['post_title'] ?></h3>
    <div class="farm_item_content">
        <p class="farm_feature"><?= $farm_meta['characteristic'] ?></p>
        <div class="farm_item_column">
            <div class="farm_img">
                <img src="<?= $farm_meta['farm_image1'] ?>" alt="<?= $farm['post_title'] ?>">
            </div>
            <div class="farm_item_detail">
                <p class="farm_address"><?= $address ?></p>
                <?php if (!empty($farm_meta['access_by_walk']) || !empty($farm_meta['access_by_car'])): ?>
                    <p class="farm_access">
                        <?php if (!empty($farm_meta['access_by_walk'])): ?>
                            徒歩の場合：<?= $farm_meta['access_by_walk'] ?>
                        <?php elseif (!empty($farm_meta['access_by_car'])): ?>
                            車の場合：<?= $farm_meta['access_by_car'] ?>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
                <table class="farm_detail_table">
                    <tr>
                        <th>駐車場</th>
                        <th>月額<br class="xs">利用料金</th>
                        <th>区画面積</th>
                        <th>空き</th>
                    </tr>
                    <tr>
                        <td><?= $farm_meta['parking_available'] ? '〇' : '×' ?></td>
                        <td><span class="num"><?= $farm_meta['monthly_fee2'] != '' ? number_format($farm_meta['monthly_fee2']) : '' ?></span><span class="unit">円</span></td>
                        <td><span class="num"><?= $farm_meta['menseki2'] ?></span><span class="unit">㎡</span></td>
                        <td><?= display_vacancy_status($farm_meta['empty_status']) ?></td>
                    </tr>
                </table>
                <div class="farm_item_btn_wrap">
                    <a class="section_btn more" href="<?= get_permalink( $farm['ID'] ) ?>"><span>詳細を見る</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
