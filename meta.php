<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="keywords" content="貸し農園,体験農園,農地活用,体験農園マイファーム" />
<meta content='株式会社マイファーム' name='author' />

<?php if (is_home() || is_front_page()) : ?>
	<title>マイファームで体験農園（貸し農園・市民農園）で、週末野菜づくりの楽しさを</title>
	<meta name="description" content="体験農園「マイファーム」は、休暇時間をつかって、 個性豊かなアドバイザーがサポートするから野菜づくりを楽しむことができる、農園サービス（貸し農園・市民農園）です。">
<?php elseif (is_post_type_archive('farms')): ?>
	<title>貸し農園・体験農園・市民農園を探すなら「マイファーム」　まずは見学から</title>
	<meta name="description" content="貸し農園・体験農園・市民農園を探すなら「マイファーム」　まずは見学から">
<?php else: ?>
	<?php if (get_field('page_tittle')): ?>
		<title><?php the_field('page_tittle'); ?></title>
	<?php else: ?>
		<title><?php echo wp_get_document_title(); ?></title>
	<?php endif; ?>

	<?php if (get_field('description')): ?>
		<meta name="description" content="<?php the_field('description'); ?>">
	<?php else: ?>
		<meta name="description" content="体験農園マイファームは、ご自宅の近くで、週末など空いた時間をつかって、だれでも気軽に野菜づくりを楽しむことができる、農園サービス（貸し農園）です。">
	<?php endif; ?>
<?php endif; ?>

<!-- ▼SNS用OGタグ -->
<meta property="fb:admins" content="216671248355196" />
<meta property="fb:app_id" content="1531607620390205" />
<meta property="og:locale" content="ja_JP">
<meta property="og:url" content="https://myfarmer.jp/" />
<meta property="og:image" content="https://myfarmer.jp/wp-content/themes/myfarmer/common/img/main-img_farmlist_201906_pc.jpg">
