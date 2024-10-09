<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
    return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change 'twentyseventeen' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'twentyseventeen' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.

    add_theme_support( 'title-tag' );
    */
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

    add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'top'    => __( 'Top Menu', 'twentyseventeen' ),
        'social' => __( 'Social Links Menu', 'twentyseventeen' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
      */
    add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

    // Define and register starter content to showcase the theme on new sites.
    $starter_content = array(
        'widgets' => array(
            // Place three core-defined widgets in the sidebar area.
            'sidebar-1' => array(
                'text_business_info',
                'search',
                'text_about',
            ),

            // Add the core-defined business info widget to the footer 1 area.
            'sidebar-2' => array(
                'text_business_info',
            ),

            // Put two core-defined widgets in the footer 2 area.
            'sidebar-3' => array(
                'text_about',
                'search',
            ),
        ),

        // Specify the core-defined pages to create and add custom thumbnails to some of them.
        'posts' => array(
            'home',
            'about' => array(
                'thumbnail' => '{{image-sandwich}}',
            ),
            'contact' => array(
                'thumbnail' => '{{image-espresso}}',
            ),
            'blog' => array(
                'thumbnail' => '{{image-coffee}}',
            ),
            'homepage-section' => array(
                'thumbnail' => '{{image-espresso}}',
            ),
        ),

        // Create the custom image attachments used as post thumbnails for pages.
        'attachments' => array(
            'image-espresso' => array(
                'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
                'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
            ),
            'image-sandwich' => array(
                'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
                'file' => 'assets/images/sandwich.jpg',
            ),
            'image-coffee' => array(
                'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
                'file' => 'assets/images/coffee.jpg',
            ),
        ),

        // Default to a static front page and assign the front and posts pages.
        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),

        // Set the front page section theme mods to the IDs of the core-registered pages.
        'theme_mods' => array(
            'panel_1' => '{{homepage-section}}',
            'panel_2' => '{{about}}',
            'panel_3' => '{{blog}}',
            'panel_4' => '{{contact}}',
        ),

        // Set up nav menus for each of the two areas registered in the theme.
        'nav_menus' => array(
            // Assign a menu to the "top" location.
            'top' => array(
                'name' => __( 'Top Menu', 'twentyseventeen' ),
                'items' => array(
                    'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_blog',
                    'page_contact',
                ),
            ),

            // Assign a menu to the "social" location.
            'social' => array(
                'name' => __( 'Social Links Menu', 'twentyseventeen' ),
                'items' => array(
                    'link_yelp',
                    'link_facebook',
                    'link_twitter',
                    'link_instagram',
                    'link_email',
                ),
            ),
        ),
    );

    /**
     * Filters Twenty Seventeen array of starter content.
     *
     * @since Twenty Seventeen 1.1
     *
     * @param array $starter_content Array of starter content.
     */
    $starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

    add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

    $content_width = $GLOBALS['content_width'];

    // Get layout.
    $page_layout = get_theme_mod( 'page_layout' );

    // Check if layout is one column.
    if ( 'one-column' === $page_layout ) {
        if ( twentyseventeen_is_frontpage() ) {
            $content_width = 644;
        } elseif ( is_page() ) {
            $content_width = 740;
        }
    }

    // Check if is single post and there is no sidebar.
    if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
        $content_width = 740;
    }

    /**
     * Filter Twenty Seventeen content width of the theme.
     *
     * @since Twenty Seventeen 1.0
     *
     * @param int $content_width Content width in pixels.
     */
    $GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
    $fonts_url = '';

    /*
     * Translators: If there are characters in your language that are not
     * supported by Libre Franklin, translate this to 'off'. Do not translate
     * into your own language.
     */
    $libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

    if ( 'off' !== $libre_franklin ) {
        $font_families = array();

        $font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
        'before_widget' => '<div class="areas">',
        'after_widget'  => '</div>',
        'before_title'  => '<p>',
        'after_title'   => '</p>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'twentyseventeen' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'twentyseventeen' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
    if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
        return;
    }

    require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
    $hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
    <style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
        <?php echo twentyseventeen_custom_colors_css(); ?>
    </style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

    // Theme stylesheet.
    wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

    // Load the dark colorscheme.
    if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
        wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
    }

    // Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
    if ( is_customize_preview() ) {
        wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
        wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
    }

    // Load the Internet Explorer 8 specific stylesheet.
    wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
    wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

    // Load the html5 shiv.
    wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    // wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

    $twentyseventeen_l10n = array(
        'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
    );

    if ( has_nav_menu( 'top' ) ) {
        wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
        $twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
        $twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
        $twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
    }

    wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

    wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

    wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
    $width = $size[0];

    if ( 740 <= $width ) {
        $sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
    }

    if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
        if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
             $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
        }
    }

    return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
    if ( isset( $attr['sizes'] ) ) {
        $html = str_replace( $attr['sizes'], '100vw', $html );
    }
    return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
    if ( is_archive() || is_search() || is_home() ) {
        $attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
    } else {
        $attr['sizes'] = '100vw';
    }

    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyseventeen_widget_tag_cloud_args( $args ) {
    $args['largest']  = 1;
    $args['smallest'] = 1;
    $args['unit']     = 'em';
    $args['format']   = 'list';

    return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

// フロントーレンダリングブロックしているJavascriptの読み込みをFooterで読込させ、JSやサイトオリジナルJSを読み込む
function move_scripts_head_to_footer_ex() {
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-core');
    wp_deregister_script('jquery-migrate');
    wp_deregister_style('common');
}
add_action('wp_enqueue_scripts', 'move_scripts_head_to_footer_ex');

/*
 * 管理画面ー通常の「投稿」をマイファームブログに名称変更
 */
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'マイファームブログ';
    $submenu['edit.php'][5][0] = 'マイファームブログ一覧';
    $submenu['edit.php'][10][0] = '新しいマイファームブログ';
}
add_action('admin_menu', 'change_post_menu_label');

function change_post_object_label() {
    global $wp_post_types;
    global $wp_taxonomies;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'マイファームブログ';
    $labels->singular_name = 'マイファームブログ';
    $labels->add_new = _x('追加', 'マイファームブログ');
    $labels->add_new_item = 'マイファームブログの新規追加';
    $labels->edit_item = 'マイファームブログの編集';
    $labels->new_item = '新規マイファームブログ';
    $labels->view_item = 'マイファームブログを表示';
    $labels->search_items = 'マイファームブログを検索';
    $labels->not_found = '記事が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';

    return true;
}
add_action('init', 'change_post_object_label');

/*
 * 管理画面ーカスタム投稿タイプ：農園登録
 */
add_action('init', 'my_custom_init');
function my_custom_init() {
    $custom_post_slug = 'farms';   //カスタム投稿タイプのスラッグ
    $labels = array(
        'name' => _x('農園登録', 'post type general name'),
        'singular_name' => _x('農園一覧', 'post type singular name'),
        'add_new' => _x('新しく登録する', 'farms'),
        'all_items' => __('農園一覧'),
        'add_new_item' => __('農園を登録'),
        'edit_item' => __('農園を編集'),
        'new_item' => __('新しい農園'),
        'view_item' => __('農園を見る'),
        'search_items' => __('農園を探す'),
        'not_found' =>  __('農園はありません'),
        'not_found_in_trash' => __('ゴミ箱に農園はありません'),
        'parent_item_colon' => ''
    );
    $args = array(
        'slug' => $custom_post_slug,
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'farms', 'with_front' => false),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'post_slug', 'post-format', 'custom-fields', 'excerpt', 'author', 'trackbacks', 'editor', 'revisions', 'page-attributes'),
        'has_archive' => true
    );
    register_post_type('farms', $args);

    //カスタムタクソノミー、タグタイプ
    register_taxonomy(
        'farms-tag',
        'farms',
        array(
            'slug' => 'farms-tag',
            'hierarchical' => false,
            'update_count_callback' => '_update_post_term_count',
            'label' => '農園のタグ',
            'singular_label' => '農園のタグ',
            'public' => true,
            'show_ui' => true,
            'rewrite' => array(
                'slug' => 'farms/farms-tag',
                'with_front' => false
            ),
        )
    );

    $custom_post_slug = 'event';   //カスタム投稿タイプのスラッグ
    $labels = array(
        'name' => _x('イベント登録', 'post type general name'),
        'singular_name' => _x('イベント一覧', 'post type singular name'),
        'add_new' => _x('新しく登録する', 'farms'),
        'all_items' => __('イベント一覧'),
        'add_new_item' => __('イベントを登録'),
        'edit_item' => __('イベントを編集'),
        'new_item' => __('新しいイベント'),
        'view_item' => __('イベントを見る'),
        'search_items' => __('イベントを探す'),
        'not_found' =>  __('イベントはありません'),
        'not_found_in_trash' => __('ゴミ箱にイベントはありません'),
        'parent_item_colon' => ''
    );
    $args = array(
        'slug' => $custom_post_slug,
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'rewrite' => true,
        'rewrite' => array('slug' => 'event', 'with_front' => false),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'post_slug', 'post-format', 'custom-fields', 'excerpt', 'author', 'trackbacks', 'editor', 'revisions', 'page-attributes', 'thumbnail'),
        'has_archive' => true
    );
    register_post_type('event', $args);

    //イベントエリア
    register_taxonomy(
        'event-area',
        'event',
        array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'label' => 'イベントのエリア',
            'singular_label' => 'イベントのエリア',
            'public' => true,
            'show_ui' => true,
                        'rewrite' => array(
                'slug' => 'event/event-area',
                'with_front' => false
            ),
        )
    );

    //イベントカテゴリ
    register_taxonomy(
        'event-category',
        'event',
        array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'label' => 'イベントのカテゴリー',
            'singular_label' => 'イベントのカテゴリー',
            'public' => true,
            'show_ui' => true,
            'rewrite' => array(
                'slug' => 'event/event-category',
                'with_front' => false
            ),
        )
    );

    //お知らせ
    $custom_post_slug = 'news';
    $labels = array(
        'name' => _x('お知らせ', 'post type general name'),
        'singular_name' => _x('お知らせ', 'post type singular name'),
        'add_new' => _x('新しく登録する', 'news'),
        'all_items' => __('お知らせ一覧'),
        'add_new_item' => __('お知らせを登録'),
        'edit_item' => __('お知らせを編集'),
        'new_item' => __('新しいお知らせ'),
        'view_item' => __('お知らせを見る'),
        'search_items' => __('お知らせを探す'),
        'not_found' =>  __('お知らせはありません'),
        'not_found_in_trash' => __('ゴミ箱にお知らせはありません'),
        'parent_item_colon' => ''
    );
    $args = array(
        'slug' => $custom_post_slug,
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'news', 'with_front' => false),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'post_slug', 'custom-fields', 'author', 'editor', 'thumbnail'),
        'has_archive' => true
    );
    register_post_type('news', $args);

    //よくある質問
    $labels = array(
        'name' => _x('よくある質問', 'post type general name'),
        'singular_name' => _x('よくある質問', 'post type singular name'),
        'add_new' => _x('新しく登録する', 'faq'),
        'all_items' => __('よくある質問一覧'),
        'add_new_item' => __('よくある質問を登録'),
        'edit_item' => __('よくある質問を編集'),
        'new_item' => __('新しいよくある質問'),
        'view_item' => __('よくある質問を見る'),
        'search_items' => __('よくある質問を探す'),
        'not_found' =>  __('よくある質問はありません'),
        'not_found_in_trash' => __('ゴミ箱によくある質問はありません'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'faq', 'with_front' => false),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'post-format', 'custom-fields', 'excerpt', 'author', 'trackbacks', 'editor', 'revisions', 'page-attributes'),
        'has_archive' => true
    );
    register_post_type('faq', $args);

    // よくある質問カテゴリ
    register_taxonomy(
        'faq-category',
        'faq',
        array(
            'hierarchical' => true,
            'label' => 'よくある質問のカテゴリー',
            'public' => true,
            'show_ui' => true,
            'rewrite' => array(
                'slug' => 'faq-category',
                'with_front' => false
            ),
        )
    );
}

/*
 * 管理画面ー投稿時のメッセージなど
 */
add_filter('post_updated_messages', 'book_updated_messages');
function book_updated_messages($messages) {
    $post_ID = get_the_ID();
    $post_date = get_the_date();

    $messages['farms'] = array(
        0 => '', // ここは使用しません
        1 => sprintf(__('農園を更新しました <a href="%s">記事を見る</a>'), esc_url(get_permalink($post_ID))),
        2 => __('カスタムフィールドを更新しました'),
        3 => __('カスタムフィールドを削除しました'),
        4 => __('農園更新'),
        5 => isset($_GET['revision']) ? sprintf(__(' %s 前に農園を保存しました'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('農園が公開されました <a href="%s">記事を見る</a>'), esc_url(get_permalink($post_ID))),
        7 => __('農園を保存'),
        8 => sprintf(__('農園を送信 <a target="_blank" href="%s">プレビュー</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(
            __('農園を予約投稿しました: <strong>%1$s</strong>. <a target="_blank" href="%2$s">プレビュー</a>'),
            date_i18n(__('M j, Y @ G:i'), strtotime($post_date)),
            esc_url(get_permalink($post_ID))
        ),
        10 => sprintf(__('農園の下書きを更新しました <a target="_blank" href="%s">プレビュー</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );

    return $messages;
}

/*
 * 管理画面ー追加したカスタム投稿タイプの投稿ページ上部にあるプルダウンするヘルプ内テキスト
 */
add_action('contextual_help', 'add_help_text', 10, 3);
function add_help_text($contextual_help, $screen_id, $screen) {

    if ('farms' == $screen->id) {
        $contextual_help =
            '<p>' . __('農園登録について') . '</p>' .
            '<ul>' .
            '<li>' . __('分類、対象エリア、タグはそれぞれ必須で選択します') . '</li>' .
            '<li>' . __('施策内容はそれぞれ50文字程度まで') . '</li>' .
            '</ul>';
    } elseif ('edit-book' == $screen->id) {
        $contextual_help =
            '<p>' . __('') . '</p>';
    }
    return $contextual_help;
}

/*
 * 管理画面ー投稿一覧にフィールドを追加
 */
function add_posts_columns($columns) {
    $columns['postid'] = 'ID';
    $columns['empty_status'] = '空き状況';
    $columns['slug'] = 'スラッグ';
    $columns['farms-tag'] = 'タグ';

    return $columns;
}
add_filter('manage_farms_posts_columns', 'add_posts_columns');

/*
 * 管理画面ー投稿一覧にソートフィールド指定
 */
function add_posts_sortable_columns($columns) {
    $columns['postid'] = 'ID';

    return $columns;
}
add_filter('manage_edit-farms_sortable_columns', 'add_posts_sortable_columns');

/*
 * 管理画面ー投稿一覧に追加したフィールドのデータを表示
 */
function add_posts_columns_row($column_name, $post_id) {
    if ('slug' == $column_name) {
        $slug = get_post($post_id)->post_name;
        echo $slug;
    }
    if ($column_name == 'postid') {
        echo $post_id;
    }
    if ($column_name == 'farms-tag') {
        $string = get_the_term_list($post_id, 'farms-tag', '', ',', '');
        echo $string;
    }
    if ($column_name == 'empty_status') {
        $empty_status = get_post_meta($post_id, 'empty_status', true);
        echo ($empty_status) ? $empty_status : '－';
    }
}
add_action('manage_farms_posts_custom_column', 'add_posts_columns_row', 10, 2);

/*
 * 管理画面ー投稿一覧に追加したフィールドで並べ替え（現在はpostidでのみ実施）
 */
function custom_orderby_columns($vars) {


    if (isset($vars['orderby']) && 'postid' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'orderby' => 'ID',
        ));
    }
    if (isset($vars['orderby']) && 'スラッグ' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'orderby' => 'post_name',
        ));
    }
    if (isset($vars['orderby']) && 'empty_status' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'orderby' => 'empty_status',
            'meta_query' => array(
                array(
                    'key' => 'empty_status',
                    'value' => array(0), // 値が0のものを除く
                    'compare' => '>',
                )
            )
        ));
    }
    //print_r($vars);
    return $vars;
}
add_filter('request', 'custom_orderby_columns');


/*
 *  管理画面ー農園（farms）に関してデフォルトでのソート指定
 */
function custom_post_sort($query) {
    if (! $query->is_main_query())
        return;

    elseif (is_admin() && $_SERVER['QUERY_STRING'] === "post_type=farms") {
        wp_safe_redirect(admin_url() . 'edit.php?post_type=farms&orderby=ID&order=asc');
    }
}
add_action('pre_get_posts', 'custom_post_sort');

/*
 * 管理画面ーカスタム投稿のタグ一覧にフィールドを追加
 */
function add_farms_tag_columns($columns) {
    $columns['sort_field'] = '並び順';
    return $columns;
}
add_filter('manage_edit-farms-tag_columns', 'add_farms_tag_columns');
/*
 * 管理画面ーカスタム投稿のタグ一覧にフィールドを表示
 */
function add_farms_tag_custom_column($string, $column_name, $term_id) {
    if ($column_name == 'sort_field') {
        $sort_field = get_field('sort_field', 'farms-tag_' . $term_id);
        echo $sort_field;
    }
}
add_filter('manage_farms-tag_custom_column', 'add_farms_tag_custom_column', 10, 3);

add_action('generate_rewrite_rules', 'my_rewrite');
function my_rewrite($wp_rewrite) {
    $taxonomies = get_taxonomies();
    $taxonomies = array_slice($taxonomies, 4, count($taxonomies) - 1);
    foreach ($taxonomies as $taxonomy) :

        $post_types = get_taxonomy($taxonomy)->object_type;

        foreach ($post_types as $post_type) {
            $new_rules[$post_type . '/' . $taxonomy . '/(.+?)/?$'] = 'index.php?taxonomy=' . $taxonomy . '&term=' . $wp_rewrite->preg_index(1);
        }

        $wp_rewrite->rules = array_merge($new_rules, $wp_rewrite->rules);

    endforeach;
}

/*
 * get_param_val関数の定義 （全GET属性をセット）
 */
function get_param_val($atts2) {
    // デフォルトの配列
    $atts1 = array(
        // デフォルト値の設定（ここではデフォルトは値なし）
        'name' => ''
    );

    // デフォルトの配列に引数で受け取った配列をマージ
    extract(shortcode_atts($atts1, $atts2));

    // パラメーターの値を取得
    $val = (isset($_GET[$name]) && $_GET[$name] != '') ? $_GET[$name] : '';
    // エスケープ処理
    $val = htmlspecialchars($val, ENT_QUOTES);

    // $valを戻り値として設定（ショートコードの値となる）
    // テンプレート側では do_shortcode('[param name="purposes"]'); などとして?porposes=sougyou のvalueを取得する
    return $val;
}
// ショートコード[param]にget_param_val関数をセット
add_shortcode('param', 'get_param_val');

/*
 * エリアを指定し、全地域を取得（名称取得）（do_shortcodeで実施する場合は引数は配列で取得する
 */
function get_area_all_by_region($region = null) {
    if (is_array($region)):
        $region_name = $region[0];
    else:
        $region_name = $region;
    endif;

    switch ($region_name) {
        case '関東':
            $names = '神奈川・県央～湘南,神奈川・横浜,埼玉・茨城,千葉・市内～印旛,千葉・東葛～京葉,東京・23区～市部';
            break;
        case '東海':
            $names = '愛知・尾張～西三河,愛知・名古屋';
            break;
        case '関西':
            $names = '大阪・市内～東部,大阪・南部,大阪・北摂,京都・市内洛西～洛南,京都・山城～滋賀,兵庫・神戸～阪神北,兵庫・阪神南,和歌山・奈良';
            break;
        case 'その他':
            $names = 'その他';
            break;
        default:
            $names = 'error';
            break;
    }
    return $names;
}
add_shortcode('far_get_area_all_by_region', 'get_area_all_by_region');

/*
 * エリアを指定し、リージョンを取得（名称取得）（do_shortcodeで実施する場合は引数は配列で取得する
 */
function get_region_by_area($area = null) {
    if (!empty($area) && is_array($area)):
        $area_name = $area[0];
    else:
        $area_name = $area;
    endif;

    switch ($area_name) {
        case '神奈川・県央～湘南':
        case '神奈川・横浜':
        case '埼玉・茨城':
        case '千葉・市内～印旛':
        case '千葉・東葛～京葉':
        case '東京・23区～市部':
            $names = 'kanto,関東';
            break;
        case '愛知・尾張～西三河':
        case '愛知・名古屋':
            $names = 'tokai,東海';
            break;
        case '大阪・市内～東部':
        case '大阪・南部':
        case '大阪・北摂':
        case '京都・市内洛西～洛南':
        case '京都・山城～滋賀':
        case '兵庫・神戸～阪神北':
        case '兵庫・阪神南':
        case '奈良・和歌山':
            $names = 'kansai,関西';
            break;
        case 'その他':
            $names = 'sonota,その他';
            break;
        default:
            $names = 'error';
            break;
    }
    return $names;
}
add_shortcode('far_get_region_by_area', 'get_region_by_area');

/*
 * 都道府県を指定し、農園データを取得（do_shortcodeで実施する場合は引数は配列で取得する
 */
function get_data_by_pref($pref = null) {
    if (is_array($pref)):
        $pref_name = $pref[0];
    else:
        $pref_name = $pref;
    endif;
    $metaquerysp = array();
    // カスタムフィールド
    $metaquerysp[] = array(
        'key' => 'pref',
        'value' => $pref_name,
    );

    $resources = get_posts(
        array(
            'post_type' => 'farms',
            'numberposts' => -1, //表示する記事の数
            'meta_query' => $metaquerysp
        )
    );
    if ($resources) :
        $return = "";
        foreach ($resources as $post) :

            $title = $post->post_title;
            $permalink = get_permalink($post->ID);
            $address = get_post_meta($post->ID, "address", true);
            $monthly_fee2 = get_post_meta($post->ID, "monthly_fee2", true);
            if (!empty($monthly_fee2)) {
                $monthly_fee2 = number_format($monthly_fee2) . '円';
            } else {
                $monthly_fee2 = "";
            }
            $menseki2 = get_post_meta($post->ID, "menseki2", true);
            if (!empty($menseki2)) {
                $menseki2 = number_format($menseki2) . '㎡';
            } else {
                $menseki2 = "";
            }
            $discount_2year = get_post_meta($post->ID, "discount_2year", true);
            if ($discount_2year == true) {
                $discount_2year = '◯';
            } else {
                $discount_2year = '×';
            }
            $return .= <<< EOM
                      <tr data-href="{$permalink}">
                          <td class="farmname">{$title}</td>
                          <td class="tleft">{$address}</td>
                          <td>{$monthly_fee2}</td>
                          <td>{$menseki2}</td>
                      </tr>
EOM;
        endforeach;
    endif;
    return $return;
}
add_shortcode('far_get_data_by_pref', 'get_data_by_pref');

/*
 * エリアを指定し、農園データを取得（do_shortcodeで実施する場合は引数は配列で取得する
 */
function get_data_by_area($area = null) {
    if (is_array($area)):
        $area_name = $area[0];
    else:
        $area_name = $area;
    endif;
    $metaquerysp = array();
    // カスタムフィールド
    $metaquerysp[] = array(
        'key' => 'area',
        'value' => $area_name,
    );

    $resources = get_posts(
        array(
            'post_type' => 'farms',
            'numberposts' => -1, //表示する記事の数
            'meta_query' => $metaquerysp
        )
    );
    if ($resources) :
        $return = "";
        foreach ($resources as $post) :

            $title = $post->post_title;
            $permalink = get_permalink($post->ID);
            $address = get_post_meta($post->ID, "address", true);
            $monthly_fee2 = get_post_meta($post->ID, "monthly_fee2", true);
            if (!empty($monthly_fee2)) {
                $monthly_fee2 = number_format($monthly_fee2) . '円';
            } else {
                $monthly_fee2 = "";
            }
            $menseki2 = get_post_meta($post->ID, "menseki2", true);
            if (!empty($menseki2)) {
                $menseki2 = number_format($menseki2) . '㎡';
            } else {
                $menseki2 = "";
            }
            $discount_2year = get_post_meta($post->ID, "discount_2year", true);
            if ($discount_2year == true) {
                $discount_2year = '◯';
            } else {
                $discount_2year = '×';
            }
            $return .= <<< EOM
                      <tr data-href="{$permalink}">
                          <td class="farmname">{$title}</td>
                          <td class="tleft">{$address}</td>
                          <td>{$monthly_fee2}</td>
                          <td>{$menseki2}</td>
                          <td>{$discount_2year}</td>
                      </tr>
EOM;
        endforeach;
    endif;
    return $return;
}
add_shortcode('far_get_data_by_area', 'get_data_by_area');

/*
 * post_idを指定し、Google Map用農園データを取得（do_shortcodeで実施する場合は引数は配列で取得する
 */
function get_gmapdata_by_ID($ID = null) {
    if (is_array($ID)):
        $post_ID = $ID[0];
    else:
        $post_ID = $ID;
    endif;

    $latitude = get_post_meta($post_ID, "latitude", true);
    $longitude = get_post_meta($post_ID, "longitude", true);
    $post = get_post($post_ID);
    $title = get_the_title($post);
    $permalink = get_permalink($post_ID);
    $latitude = get_post_meta($post_ID, "latitude", true);
    $longitude = get_post_meta($post_ID, "longitude", true);
    $recommend_vegetable = get_post_meta($post_ID, "recommend_vegetable", true);
    $farm_image1 = get_post_meta($post_ID, "farm_image1", true);
    if (!empty($farm_image1)):
        $thumb = wp_get_attachment_image($farm_image1, 'thumbnail');
    else :
        $thumb = "";
    endif;
    $return = <<< EOM
      {
        position: [{$latitude}, {$longitude}],
        title: '{$title}',
        content: '<div class="pins"><dl><dt>{$thumb}</dt><dd>{$recommend_vegetable}</dd><dd class="orange-btn"><a href="{$permalink}">詳細はこちら</a></dd></dl></div>'
      },
EOM;

    return $return;
}
add_shortcode('far_get_gmapdata_by_ID', 'get_gmapdata_by_ID');


/*
 * エリアを指定し、Google Map用農園データを取得（do_shortcodeで実施する場合は引数は配列で取得する
 */
function get_gmapdata_by_area($area = null) {
    if (is_array($area)):
        $area_name = $area[0];
    else:
        $area_name = $area;
    endif;
    $metaquerysp = array();
    // カスタムフィールド
    $metaquerysp[] = array(
        'key' => 'area',
        'value' => $area_name,
    );

    $resources = get_posts(
        array(
            'post_type' => 'farms',
            'numberposts' => -1, //表示する記事の数
            'meta_query' => $metaquerysp
        )
    );
    if ($resources) :
        $return = "";
        foreach ($resources as $post) :

            $title = $post->post_title;
            $permalink = get_permalink($post->ID);
            $latitude = get_post_meta($post->ID, "latitude", true);
            $longitude = get_post_meta($post->ID, "longitude", true);
            $recommend_vegetable = get_post_meta($post->ID, "recommend_vegetable", true);
            $farm_image1 = get_post_meta($post->ID, "farm_image1", true);
            if (!empty($farm_image1)):
                $thumb = wp_get_attachment_image($farm_image1, 'thumbnail');
            else :
                $thumb = "";
            endif;
            $return .= <<< EOM
            {
              position: [{$latitude}, {$longitude}],
              title: '{$title}',
              content: '<div class="pins"><dl><dt>{$thumb}</dt><dd>{$recommend_vegetable}</dd><dd class="orange-btn"><a href="{$permalink}">詳細はこちら</a></dd></dl></div>'
            },
EOM;
        endforeach;
    endif;
    return $return;
}
add_shortcode('far_get_gmapdata_by_area', 'get_gmapdata_by_area');

/*
 * エリアを指定し、Google Map用エリアの中心座標の緯度・経度・倍率をを取得（do_shortcodeで実施する場合は引数は配列で取得する
 */
function get_pos_by_area($area = null) {
    if (is_array($area)):
        $area_name = $area[0];
    else:
        $area_name = $area;
    endif;

    if (wp_is_mobile()):
        // モバイルの場合、縮尺を-1する
        $mobile_view = -1;
    else:
        $mobile_view = 0;
    endif;

    switch ($area_name) {
        case '神奈川・県央～湘南':
            $scale = 12 + $mobile_view;
            $pos = '35.412584,139.351336,' . $scale; //o
            break;
        case '神奈川・横浜':
            $scale = 12 + $mobile_view;
            $pos = '35.499352,139.577117,' . $scale; // o
            break;
        case '埼玉・茨城':
            $scale = 11 + $mobile_view;
            $pos = '35.925894,139.8158191,' . $scale; // o
            break;
        case '千葉・市内～印旛':
            $scale = 11 + $mobile_view;
            $pos = '35.731676,140.142771,' . $scale; // o
            break;
        case '千葉・東葛～京葉':
            $scale = 12 + $mobile_view;
            $pos = '35.768476,140.011319,' . $scale; // o
            break;
        case '東京・23区～市部':
            $scale = 11 + $mobile_view;
            $pos = '35.672935,139.547833,' . $scale; // o
            break;
        case '愛知・尾張～西三河':
            $scale = 10 + $mobile_view;
            $pos = '35.17483,136.977327,' . $scale; // o
            break;
        case '愛知・名古屋':
            $scale = 11 + $mobile_view;
            $pos = '35.181862,136.930719,' . $scale; // o
            break;
        case '大阪・市内～東部':
            $scale = 11 + $mobile_view;
            $pos = '34.753308,135.535222,' . $scale; // o
            break;
        case '大阪・南部':
            $scale = 12 + $mobile_view;
            $pos = '34.528091,135.484481,' . $scale; // o
            break;
        case '大阪・北摂':
            $scale = 12 + $mobile_view;
            $pos = '34.912789,135.490361,' . $scale; // o
            break;
        case '京都・市内洛西～洛南':
            $scale = 13 + $mobile_view;
            $pos = '34.977601,135.687062,' . $scale; // o
            break;
        case '京都・山城～滋賀':
            $scale = 11 + $mobile_view;
            $pos = '34.935465,135.820458,' . $scale; // o
            break;
        case '兵庫・神戸～阪神北':
            $scale = 11 + $mobile_view;
            $pos = '34.798119,135.19575,' . $scale; // o
            break;
        case '兵庫・阪神南':
            $scale = 13 + $mobile_view;
            $pos = '34.772742,135.372882,' . $scale; // o
            break;
        case '奈良・和歌山':
            $scale = 10 + $mobile_view;
            $pos = '34.543738,135.542019,' . $scale; // o
            break;
        case 'その他':
            $scale = 15 + $mobile_view;
            $pos = '33.605729,130.475725,' . $scale;
            break;
        default:
            $names = 'error';
            break;
    }
    return $pos;
}
add_shortcode('far_get_pos_by_area', 'get_pos_by_area');

/*
 * 特徴をsort_field順で全て取得
 */
function get_feature_all() {
    //get_field('sort_field','farms-tag_'.$term_id);
    $return = "";
    $taxonomy_name = 'farms-tag'; //表示したいtaxonomynameを設定
    $taxonomies = get_terms($taxonomy_name, 'hide_empty=0'); //空のタームを表示する
    //print_r($taxonomies);
    if (!is_wp_error($taxonomies) && count($taxonomies)):
        $farmsTag_array = [];
        foreach ($taxonomies as $taxonomy):
            $term_id = esc_html($taxonomy->term_id);
            $sort_field = get_field('sort_field', 'farms-tag_' . $term_id);
            $farmsTag_array[$sort_field]['term_id'] = esc_html($taxonomy->term_id);
            $farmsTag_array[$sort_field]['name'] = esc_html($taxonomy->name);
            $farmsTag_array[$sort_field]['slug'] = esc_html($taxonomy->slug);
            $term_idsp = "{$taxonomy_name}_{$term_id}"; //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」
            $photo = get_field('icon_image', $term_idsp);
            $photosp = wp_get_attachment_image_src($photo, 'full');
            $farmsTag_array[$sort_field]['photosp'] = $photosp[0];
            $farmsTag_array[$sort_field]['sort_field'] = get_field('sort_field', 'farms-tag_' . $term_id);
        endforeach;
    endif;

    if (count($farmsTag_array) > 0):
        ksort($farmsTag_array);
        foreach ($farmsTag_array as $key => $farmsTag):
            $return .= "
                <li>
                    <a href=\"/{$taxonomy_name}?tag={$farmsTag['slug']}\" class=\"bg-arrow\">
                        <p class=\"is\"><img src=\"{$farmsTag['photosp']}\" alt=\"\"/></p>
                        <span><p>{$farmsTag['name']}</p></span>
                    </a>
                </li>";
        endforeach;
    endif;

    return $return;
}
add_shortcode('far_get_feature_all', 'get_feature_all');

/*
 * 特徴（タグ）のスラッグとリージョンに該当するfarmsを取得
 */
function get_farms_by_feature_region($tag = null, $region = null) {

    if (is_array($tag)):
        $slug = $tag[0];
        $region = $tag[1];
    endif;

    $return = "";

    $metaquerysp = array(
        'meta_query' =>
        array(
            'key' => 'region',
            'value' => $region,
        )
    );

    $resources = get_posts(
        array(
            'numberposts' => -1, //表示する記事の数
            'post_type' => 'farms', //投稿タイプ名(支援機関登録)
            'meta_query' => $metaquerysp,
            'orderby' => 'rand',
            'farms-tag' => $slug  //タクソノミーのスラッグからidを取得する
        )
    );
    if (count($resources) > 0):
        foreach ($resources as $post):
            $title = $post->post_title;
            $permalink = get_permalink($post->ID);
            $address = get_post_meta($post->ID, "address", true);
            $monthly_fee2 = get_post_meta($post->ID, "monthly_fee2", true);
            if (!empty($monthly_fee2)) {
                $monthly_fee2 = number_format($monthly_fee2) . '円';
            } else {
                $monthly_fee2 = "";
            }
            $menseki2 = get_post_meta($post->ID, "menseki2", true);
            if (!empty($menseki2)) {
                $menseki2 = number_format($menseki2) . '㎡';
            } else {
                $menseki2 = "";
            }
            $discount_2year = get_post_meta($post->ID, "discount_2year", true);
            if ($discount_2year == true) {
                $discount_2year = '◯';
            } else {
                $discount_2year = '×';
            }
            $return .= <<< EOM
                      <tr data-href="{$permalink}">
                          <td class="farmname">{$title}</td>
                          <td class="tleft">{$address}</td>
                          <td>{$monthly_fee2}</td>
                          <td>{$menseki2}</td>
                          <td>{$discount_2year}</td>
                      </tr>
EOM;
        endforeach;
    endif;

    return $return;
}
add_shortcode('far_get_farms_by_feature_region', 'get_farms_by_feature_region');


//（ショートコード設定
function shortcode_url() {
    return get_template_directory_uri();
}
add_shortcode('url', 'shortcode_url');

/*
 * global変数宣言
 */
//全都道府県名称取得（ソート済み）（do_shortcodeで実施する場合は引数は配列で取得する
$global_pref_all_sort = array(
    0 => '東京都',
    1 => '神奈川県',
    2 => '千葉県',
    3 => '埼玉県',
    4 => '茨城県',
    5 => '愛知県',
    6 => '大阪府',
    7 => '兵庫県',
    8 => '滋賀県',
    9 => '奈良県',
    10 => '和歌山県',
    11 => '福岡県'
);
$global_area_all_sort = array(0 => '関東', 1 => '東海', 2 => '関西', 3 => 'その他');

//WPログイン画面のロゴをオリジナルに変更
function login_logo_image() {
    echo '<style type="text/css">
            #login h1 a {
                background: url(' . get_bloginfo('template_directory') . '/common/img/logo.svg) no-repeat !important;
                background-size:300px 60px !important;

            }
            #login h1 a{
                width:300px !important;
                height:60px !important;
                display:block;
            }
    </style>';
}
add_action('login_head', 'login_logo_image');

// remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

function remove_year_rewrite_rules($date_rewrite) {
    if ($date_rewrite) {
        foreach ($date_rewrite as $key => $query) {
            if (! strpos($query, '&monthnum=')) {
                unset($date_rewrite[$key]);
            }
        }
    }
    return $date_rewrite;
}
add_filter('date_rewrite_rules', 'remove_year_rewrite_rules');

function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function get_day($date) {

    $week = [
        '日', //0
        '月', //1
        '火', //2
        '水', //3
        '木', //4
        '金', //5
        '土', //6
    ];

    return $week[$date];
}

function pagination($pages, $paged, $addParam, $range = 2) {

    $pages = (int) $pages;
    $paged = $paged ?: 1;

    //     $text_first   = "« 最初へ";
    $text_before  = '<div class="back disabled"></div>';
    $text_next    = '<div class="forward"></div>';
    //     $text_last    = "最後へ »";

    if ($pages === 1) {
        echo '<div class="pagination flex"><div class="pagelisting flex"><div class="active">01</div></div></div>';
        return;
    }

    if (1 !== $pages) {
        echo '<div class="pagination flex"><div class="pagelisting flex">';
        //         if ( $paged > $range + 1 ) {
        //             // 「最初へ」 の表示
        //             echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
        //         }
        if ($paged > 1) {
            // 「前へ」 の表示
            echo '<a href="', get_pagenum_link($paged - 1), $addParam, '">', $text_before, '</a>';
            //             echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
        }
        for ($i = 1; $i <= $pages; $i++) {

            if ($i <= $paged + $range && $i >= $paged - $range) {
                // $paged +- $range 以内であればページ番号を出力
                if ($paged == $i) {
                    echo '<a href="?pageNum=',  $i, $addParam, '"><div class="list active">', str_pad($i, 2, 0, STR_PAD_LEFT), '</div></a>';
                } else {
                    echo '<a href="?pageNum=',  $i, $addParam, '"><div class="list">', str_pad($i, 2, 0, STR_PAD_LEFT), '</div></a>';
                }
            }
        }
        if ($paged < $pages) {
            // 「次へ」 の表示
            echo '<a href="?pageNum=', $paged + 1, $addParam, '">', $text_next, '</a>';
            //             echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
        }
        //         if ( $paged + $range < $pages ) {
        //             // 「最後へ」 の表示
        //             echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
        //         }
        echo '</div></div>';
    }
}

//ビジュアルテキストエディタにクイックタグを追加する
function my_add_mce_button() {
    // ユーザー権限を確認
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    // リッチテキストエディタを使えるか
    if ('true' == get_user_option('rich_editing')) {
        add_filter('mce_external_plugins', 'my_add_tinymce_plugin');
        add_filter('mce_buttons', 'my_register_mce_button');
    }
}
add_action('admin_head', 'my_add_mce_button');

// プラグインを追加
function my_add_tinymce_plugin($plugin_array) {
    $plugin_array['my_mce_button'] = get_template_directory_uri() . '/assets/js/mce-button.js';
    return $plugin_array;
}

// リッチテキストエディタにボタンを追加する
function my_register_mce_button($buttons) {
    array_push($buttons, 'my_mce_button');
    return $buttons;
}

//スラッグからページ番号を取得し、返す
function get_page_id($slug) {
    $page = get_page_by_path($slug);
    return $page->ID;
}

/*
 * 都道府県を指定し、農園データを取得（do_shortcodeで実施する場合は引数は配列で取得する
 * LP用に作成。キャンペーン対象除外の農園のみを取得
 */
function get_data_by_pref2($pref = null) {
    if (is_array($pref)):
        $pref_name = $pref[0];
    else:
        $pref_name = $pref;
    endif;
    $metaquerysp = array();
    // カスタムフィールド
    $metaquerysp[] = array(
        'key' => 'pref',
        'value' => $pref_name,
    );

    $resources = get_posts(
        array(
            'post_type' => 'farms',
            'numberposts' => -1, //表示する記事の数
            'meta_query' => $metaquerysp
        )
    );
    if ($resources) :
        $return = "";
        $i = 1;
        foreach ($resources as $post) :

            $title = $post->post_title;
            $farm_id = $post->post_name;
            $permalink = get_permalink($post->ID);
            $address = get_post_meta($post->ID, "address", true);

            $farm_id_ignore = array(
                '11',
                '20',
                '22',
                '34',
                '36',
                '67',
                '88',
                '108',
                '120',
                '131',
                '146',
                '149',
                '155',
                '157',
                '159',
                '163',
                '164',
                '167',
                '168',
                '169',
                '175',
                '187',
                '189',
                '194',
                '202',
                '207',
                '215',
                '217',
                '220',
                '223',
                '230',
                '245',
                '78',
                '179',
                '241',
                '243',
                '248',
                '249',
                '250',
                '800',
                '801'
            );
            $farm_filter = in_array($farm_id, $farm_id_ignore);

            if (!$farm_filter) :
                $return .= <<< EOM
                      <tr data-href="{$permalink}">
                        <!--<td style="width:7%">{$i}</td>
                        <td style="width:7%;">{$farm_id}</td>-->
                        <td class="farmname">{$title}</td>
                        <td class="tleft">{$address}</td>
                      </tr>
EOM;
                $i++;
            endif;
        endforeach;
    endif;
    return $return;
}
add_shortcode('far_get_data_by_pref2', 'get_data_by_pref2');


/*
 * 都道府県を指定し、農園データを取得（do_shortcodeで実施する場合は引数は配列で取得する
 * ちょいトク割 LP用に作成。
 */
function get_data_by_pref3($pref = null) {
    if (is_array($pref)):
        $pref_name = $pref[0];
    else:
        $pref_name = $pref;
    endif;
    $metaquerysp = array();
    // カスタムフィールド
    $metaquerysp[] = array(
        'key' => 'pref',
        'value' => $pref_name,
    );

    $resources = get_posts(
        array(
            'post_type' => 'farms',
            'numberposts' => -1, //表示する記事の数
            'meta_query' => $metaquerysp
        )
    );
    if ($resources) :
        $return = "";
        $i = 1;
        foreach ($resources as $post) :

            $title = $post->post_title;
            $farm_id = $post->post_name;
            $permalink = get_permalink($post->ID);
            $address = get_post_meta($post->ID, "address", true);

            $farm_id_ignore = array();
            $farm_filter = in_array($farm_id, $farm_id_ignore);

            if (!$farm_filter) :
                $return .= <<< EOM
                      <tr data-href="{$permalink}">
                        <!--<td style="width:7%">{$i}</td>
                        <td style="width:7%;">{$farm_id}</td>-->
                        <td class="farmname">{$title}</td>
                        <td class="tleft">{$address}</td>
                      </tr>
EOM;
                $i++;
            endif;
        endforeach;
    endif;
    return $return;
}
add_shortcode('far_get_data_by_pref3', 'get_data_by_pref3');

/**
 * エスケープする
 */
if (! function_exists('fn_esc')) {
    function fn_esc($data, $charset = 'UTF-8')
    {
        if (is_array($data)) {
            return array_map('fn_esc', $data);
        }

        if (is_bool($data)) {
            return $data;
        }

        return htmlspecialchars($data, ENT_QUOTES, $charset);
    }
}
/*
 * 農園を探すで、タイトルもしくはカスタムフィールド項目のキーワード検索に対応させるために必要
 * 参考：https://meshikui.com/2019/04/01/1605/
 */
add_action('pre_get_posts', function ($q) {
    if ($title = $q->get('_meta_or_title')) {
        add_filter('get_meta_sql', function ($sql) use ($title) {
            global $wpdb;

            // Only run once:
            static $nr = 0;
            if (0 != $nr++) return $sql;

            // Modify WHERE part:
            $sql['where'] = sprintf(
                " AND ( %s OR %s ) ",
                $wpdb->prepare("{$wpdb->posts}.post_title LIKE '%s'", '%' . $title . '%'),
                mb_substr($sql['where'], 5, mb_strlen($sql['where']))
            );
            return $sql;
        });
    }
});

/*
 * 距離が近い農園を検索する処理
 */
function get_near_farms($farm_name, $farm_lat, $farm_lng, $distance = 20, $limit = 10) {

    global $wpdb;

    $sql = "SELECT DISTINCT 
        {$wpdb->prefix}posts.*,
        map_lat.meta_value as latitude,
        map_lng.meta_value as longitude,
        meta_1.meta_value as address,
      ( 6371 * acos( cos( radians(%s) ) * cos( radians( map_lat.meta_value ) ) * cos( radians( map_lng.meta_value ) - radians(%s) ) + sin( radians(%s) ) * sin( radians( map_lat.meta_value ) ) ) ) AS distance
      FROM {$wpdb->prefix}posts 
      INNER JOIN {$wpdb->prefix}postmeta map_lat ON {$wpdb->prefix}posts.ID =  map_lat.post_ID 
      INNER JOIN {$wpdb->prefix}postmeta map_lng ON {$wpdb->prefix}posts.ID =  map_lng.post_ID 
      INNER JOIN {$wpdb->prefix}postmeta meta_1 ON {$wpdb->prefix}posts.ID =  meta_1.post_ID 
      WHERE 1 = 1 
      AND {$wpdb->prefix}posts.post_type = 'farms' 
      AND {$wpdb->prefix}posts.post_status = 'publish' 
      AND map_lat.meta_key = 'latitude' 
      AND map_lng.meta_key = 'longitude' 
      AND meta_1.meta_key = 'address' 
      AND {$wpdb->prefix}posts.post_title != '%s' 
      HAVING distance < %d 
      ORDER BY distance";
    if ($limit > 0){
        $sql .= " LIMIT 0 , %d";
        $_prepared  = $wpdb->prepare($sql, $farm_lat, $farm_lng, $farm_lat, $farm_name, $distance, $limit);
    } else {
        $_prepared  = $wpdb->prepare($sql, $farm_lat, $farm_lng, $farm_lat, $farm_name, $distance);
    }

    $near_farms = $wpdb->get_results($_prepared);

    return $near_farms;
}


function get_farm_detail($post_ID = null) {
    return [
        'pref'              => get_post_meta($post_ID, 'pref', true),
        'address'           => get_post_meta($post_ID, 'address', true),
        'farm_image1'       => get_field('farm_image1', $post_ID),
        'empty_status'      => get_post_meta($post_ID, 'empty_status', true),
        'monthly_fee2'      => get_post_meta($post_ID, 'monthly_fee2', true),
        'monthly_fee3'      => get_post_meta($post_ID, 'monthly_fee3', true),
        'menseki2'          => get_post_meta($post_ID, 'menseki2', true),
        'menseki3'          => get_post_meta($post_ID, 'menseki3', true),
        'parking'           => get_post_meta($post_ID, 'comming_car', true),
        'characteristic'    => get_post_meta($post_ID, 'characteristic', true),
        'access_by_walk'    => get_post_meta($post_ID, 'access_by_walk', true),
        'parking_available' => get_post_meta($post_ID, 'parking_available', true),
    ];
}

////////////////////////////////////////
// 追加functions
////////////////////////////////////////
// Util
function getJapaneseDayOfWeek($date) {
    $dateTime = new DateTime($date);
    $dayOfWeekIndex = $dateTime->format('w');
    $daysOfWeek = ['日', '月', '火', '水', '木', '金', '土'];
    return $daysOfWeek[$dayOfWeekIndex];
}
function getShortPrefName($fullPrefName){
    if (empty($fullPrefName)) return '';

    $prefs = ['北海道' => '北海道', '青森県' => '青森', '岩手県' => '岩手', '宮城県' => '宮城', '秋田県' => '秋田', '山形県' => '山形', '福島県' => '福島', '茨城県' => '茨城', '栃木県' => '栃木', '群馬県' => '群馬', '埼玉県' => '埼玉', '千葉県' => '千葉', '東京都' => '東京', '神奈川県' => '神奈川', '新潟県' => '新潟', '富山県' => '富山', '石川県' => '石川', '福井県' => '福井', '山梨県' => '山梨', '長野県' => '長野', '岐阜県' => '岐阜', '静岡県' => '静岡', '愛知県' => '愛知', '三重県' => '三重', '滋賀県' => '滋賀', '京都府' => '京都', '大阪府' => '大阪', '兵庫県' => '兵庫', '奈良県' => '奈良', '和歌山県' => '和歌山', '鳥取県' => '鳥取', '島根県' => '島根', '岡山県' => '岡山', '広島県' => '広島', '山口県' => '山口', '徳島県' => '徳島', '香川県' => '香川', '愛媛県' => '愛媛', '高知県' => '高知', '福岡県' => '福岡', '佐賀県' => '佐賀', '長崎県' => '長崎', '熊本県' => '熊本', '大分県' => '大分', '宮崎県' => '宮崎', '鹿児島県' => '鹿児島', '沖縄県' => '沖縄'];
    return $prefs[$fullPrefName];
}
function getfullPrefName($shortPrefName){
    if (empty($shortPrefName)) return '';

    $prefs = ['北海道' => '北海道', '青森' => '青森県', '岩手' => '岩手県', '宮城' => '宮城県', '秋田' => '秋田県', '山形' => '山形県', '福島' => '福島県', '茨城' => '茨城県', '栃木' => '栃木県', '群馬' => '群馬県', '埼玉' => '埼玉県', '千葉' => '千葉県', '東京' => '東京都', '神奈川' => '神奈川県', '新潟' => '新潟県', '富山' => '富山県', '石川' => '石川県', '福井' => '福井県', '山梨' => '山梨県', '長野' => '長野県', '岐阜' => '岐阜県', '静岡' => '静岡県', '愛知' => '愛知県', '三重' => '三重県', '滋賀' => '滋賀県', '京都' => '京都府', '大阪' => '大阪府', '兵庫' => '兵庫県', '奈良' => '奈良県', '和歌山' => '和歌山県', '鳥取' => '鳥取県', '島根' => '島根県', '岡山' => '岡山県', '広島' => '広島県', '山口' => '山口県', '徳島' => '徳島県', '香川' => '香川県', '愛媛' => '愛媛県', '高知' => '高知県', '福岡' => '福岡県', '佐賀' => '佐賀県', '長崎' => '長崎県', '熊本' => '熊本県', '大分' => '大分県', '宮崎' => '宮崎県', '鹿児島' => '鹿児島県', '沖縄' => '沖縄県'];
    return $prefs[$shortPrefName];
}

// 管理バーを非表示にする
add_filter('show_admin_bar', '__return_false');

// assetsディレクトリのURIを取得
function get_assets_directory_uri() {
    return get_template_directory_uri() . '/assets/';
}

// よくある質問は6件, eventは9件表示
function modify_faq_posts_per_page($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->is_post_type_archive('faq') || is_tax('faq-category')) {
        $query->set('posts_per_page', 6);
    } elseif ($query->is_post_type_archive('event')) {
        $query->set('posts_per_page', 9);
    } elseif ($query->is_post_type_archive('farms')) {
        $query->set('posts_per_page', 4);
    }
}
add_action('pre_get_posts', 'modify_faq_posts_per_page');

// 検索機能
function add_faq_search_rewrite_rule() {
    add_rewrite_rule(
        '^faq/?$', 
        'index.php?post_type=faq&s=', 
        'top'
    );
    add_rewrite_rule(
        '^faq/page/([0-9]{1,})/?$', 
        'index.php?post_type=faq&s=&paged=$matches[1]', 
        'top'
    );
}
add_action('init', 'add_faq_search_rewrite_rule');

function modify_faq_search_query($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search() && isset($_GET['post_type']) && $_GET['post_type'] === 'faq') {
        $query->set('post_type', 'faq');
        if (get_query_var('paged')) {
            $query->set('paged', get_query_var('paged'));
        }
    }
}
add_action('pre_get_posts', 'modify_faq_search_query');

// 空き状況の表示
function display_vacancy_status($key){
    $display_words = [
        '◯' => '◯',
        '△' => '△',
        '満席' => '×',
        '満席(空き待ち可)' => '×（空き待ち可）',
        'ハタムスビ' => 'ハタムスビ'
    ];
    return $display_words[$key] ?? '';
}

// サイドバーの取得
function get_custom_sidebar($post_name = null) {
    if ($post_name) {
        get_template_part('template-parts/sidebar/'.$post_name);
    } else {
        get_sidebar();
    }
}

/**
 * 関連イベント取得
 *
 * @param int $post_id 現在の投稿のID
 * @param int $max_posts 取得する関連イベントの最大数。デフォルトは3。
 * @return array WP_Postオブジェクトの配列
 */
function get_related_events($post_id, $max_posts = 3): array
{
    $related_posts = [];
    $taxonomy = 'event-area';
    $terms = wp_get_post_terms($post_id, $taxonomy, ['fields' => 'ids']);
    if (!empty($terms)) {
        // クエリの共通引数
        $args = [
            'post_type' => 'event',
            'posts_per_page' => $max_posts,
            'post__not_in' => [$post_id],
            'tax_query' => [
                [
                    'taxonomy' => $taxonomy,
                    'field' => 'id',
                    'terms' => $terms,
                ],
            ],
            'orderby' => 'date',
            'order' => 'DESC',
        ];

        // 優先順位の高いステータスでの取得
        $query = new WP_Query(array_merge($args, [
            'meta_query' => [
                [
                    'key' => 'event_status',
                    'value' => ['accepting', 'in_session'],
                    'compare' => 'IN',
                ],
            ],
        ]));

        if ($query->have_posts()) {
            $related_posts = $query->posts;
        }

        // 足りない場合、ステータス'end'の記事を追加
        if (count($related_posts) < $max_posts) {
            $query = new WP_Query(array_merge($args, [
                'posts_per_page' => $max_posts - count($related_posts),
                'meta_query' => [
                    [
                        'key' => 'event_status',
                        'value' => 'end',
                        'compare' => '=',
                    ],
                ],
            ]));

            if ($query->have_posts()) {
                $related_posts = array_merge($related_posts, $query->posts);
            }
        }
    }

    return $related_posts;
}

// 向こう1年の月の選択肢を取得
function generateMonthOptions($event_month = '') {
    $currentYear = date('Y');
    $currentMonth = date('m');

    for ($i = 0; $i < 12; $i++) {
        $year = $currentYear;
        $month = $currentMonth + $i;
        if ($month > 12) {
            $month -= 12;
            $year++;
        }

        $formattedMonth = str_pad($month, 2, '0', STR_PAD_LEFT);
        $japaneseMonth = $month . '月';
        $selected = '';
        if ($event_month == $year . '-' . $formattedMonth) $selected = 'selected';
        echo '<option value="' . $year . '-' . $formattedMonth . '" ' . $selected . '>' . $year . '年' . $japaneseMonth . '</option>' . PHP_EOL;
    }
}

// 特定地点からの指定圏内にある農園を取得
add_action('rest_api_init', function() {
    register_rest_route('api/v1', '/nearby-farms', array(
        'methods' => 'GET',
        'callback' => 'get_nearby_farms_handler',
        'permission_callback' => '__return_true'
    ));
});
function get_nearby_farms_handler(WP_REST_Request $request) {
    $latitude = $request->get_param('latitude');
    $longitude = $request->get_param('longitude');
    $distance = $request->get_param('distance') ?? 5;

    if (!$latitude || !$longitude) {
        return new WP_Error('invalid_request', 'Latitude and Longitude are required', array('status' => 400));
    }

    // データベースクエリを使用して近隣の農園を取得
    $farms = get_near_farms('test', $latitude, $longitude, $distance, 0);

    if (!empty($farms)) {
        set_query_var('near_farms', $farms);
        ob_start();
        include locate_template('template-parts/components/farm-cards.php');
        $html = ob_get_clean();
        return rest_ensure_response($html);
    } else {
        return rest_ensure_response('指定された距離内に農園はありません。');
    }
}

add_action('init', function() {
    // 年別アーカイブ用のリライトルール
    add_rewrite_rule(
        '^blog/([0-9]{4})/page/([0-9]{1,})/?$', // ページネーション付きの年別アーカイブ
        'index.php?year=$matches[1]&paged=$matches[2]',
        'top'
    );
    
    add_rewrite_rule(
        '^blog/([0-9]{4})/?$', // 通常の年別アーカイブ
        'index.php?year=$matches[1]',
        'top'
    );
});

add_filter('query_vars', function($vars) {
    $vars[] = 'year';  // 年変数を追加
    return $vars;
});

//投稿タイプでタグをチェックボックス式にする
function change_tag_to_checkbox() {
  $args = get_taxonomy('post_tag');
  $args->hierarchical = true; // Gutenberg用
  $args->meta_box_cb = 'post_categories_meta_box'; // クラシックエディタ用
  register_taxonomy('post_tag', 'post', $args);
}
add_action('init', 'change_tag_to_checkbox', 1);
