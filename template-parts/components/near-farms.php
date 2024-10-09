<!-- この農園に近いおすすめの農園 ここから -->
<?php 
$near_farms = get_query_var('near_farms');
if (!empty($near_farms)):
?>

<section class="other_farms">
    <div class="separator_bg other_farms_sep">
        <img class="separator" src="<?= get_assets_directory_uri() ?>/images/farmoutline_sep.jpg" />
        <div class="other_farms_ttl">
            <div class="section_ttl_wrap">
                <p class="section_ttl_en is_m">Other Farms</p>
                <h2 class="section_ttl_ja">
                    <span>この農園に近い<br class="xs"><span class="recommend">おすすめの農園</span></span>
                </h2>
                <img class="deco_left" src="<?= get_assets_directory_uri() ?>/images/otherfarm_left.png" />
                <img class="deco_right" src="<?= get_assets_directory_uri() ?>/images/otherfarm_right.png" />
            </div>
        </div>
    </div>
    <div class="other_farms_inner">
        <div class="farm_list">
            <?php if (empty($near_farms)): ?>
                <p>20km圏内に位置する農園はありません。</p>
            <?php else: ?>
                <?php set_query_var('near_farms', $near_farms); ?>
                <?php get_template_part('template-parts/components/farm-cards'); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- この農園に近いおすすめの農園 ここまで -->
