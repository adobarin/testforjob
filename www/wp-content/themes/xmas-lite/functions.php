<?php
/**
 * Xmas Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Xmas_Lite
 */

if ( ! function_exists( 'xmas_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function xmas_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Xmas Lite, use a find and replace
		 * to change 'xmas-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'xmas-lite' , get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'topbar-menu' => esc_html__( 'Top Bar Menu', 'xmas-lite' ),
			'menu-1' => esc_html__( 'Primary', 'xmas-lite' ),
			'social-nav' => esc_html__( 'Social Nav', 'xmas-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'xmas_lite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

        add_image_size( 'xmas-lite-large-img', 850, 600, true );
        add_image_size( 'xmas-lite-small-img', 410, 294, true );
    }
endif;
add_action( 'after_setup_theme', 'xmas_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xmas_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xmas_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'xmas_lite_content_width', 0 );

/**
 * function for google fonts
 */
if (!function_exists('xmas_lite_fonts_url')) :

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function xmas_lite_fonts_url()
    {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Source Serif Pro, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Source Serif Pro font: on or off', 'xmas-lite')) {
            $fonts[] = 'Source+Serif+Pro:400,700';
        }
        /* translators: If there are characters in your language that are not supported by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Source Sans Pro font: on or off', 'xmas-lite')) {
            $fonts[] = 'Source+Sans+Pro:400,400i,700,700i';
        }

        /* translators: If there are characters in your language that are not supported by Libre Franklin, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Libre Franklin font: on or off', 'xmas-lite')) {
            $fonts[] = 'Libre+Franklin:400,600';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
endif;

/**
 * Enqueue scripts and styles.
 *
 * @since Xmas Lite 1.0
 *
 */
function xmas_lite_scripts() {

    $min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

    wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/lib/ionicons/css/ionicons' . $min . '.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/magnific-popup.css');
	wp_enqueue_style('owl', get_template_directory_uri() . '/assets/lib/owlcarousel/css/owl.carousel.css');
    wp_enqueue_style( 'xmas-lite-style', get_stylesheet_uri() );
    $fonts_url = xmas_lite_fonts_url();
    if (!empty($fonts_url)) {
        wp_enqueue_style('xmas-lite-google-fonts', $fonts_url, array(), null);
    }
    wp_enqueue_script( 'xmas-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('owl', get_template_directory_uri() . '/assets/lib/owlcarousel/js/owl.carousel' . $min . '.js', '', '', true);
    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/jquery.magnific-popup' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('typed', get_template_directory_uri() . '/assets/lib/typed/typed' . $min . '.js', '', '', true);
	wp_enqueue_script('masonry');
	wp_enqueue_script('script', get_template_directory_uri() . '/assets/saga/js/script.js', '', '', true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xmas_lite_scripts' );

/**
 * Enqueue admin scripts and styles.
 *
 * @since Xmas Lite 1.0
 */
function xmas_lite_admin_scripts($hook)
{
    if ('widgets.php' === $hook) {
        wp_enqueue_media();
        wp_enqueue_script('xmas_litewidgets', get_template_directory_uri() . '/js/widgets.js', array('jquery'), '1.0.0', true);
    }

}

add_action('admin_enqueue_scripts', 'xmas_lite_admin_scripts');

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Xmas Lite 1.0
 *
 */
function xmas_lite_post_nav_background() {
    if ( ! is_single() ) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    $css      = '';

    if ( is_attachment() && 'attachment' == $previous->post_type ) {
        return;
    }

    if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
        $prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ( $next && has_post_thumbnail( $next->ID ) ) {
        $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style( 'xmas-lite-style', $css );
}
add_action( 'wp_enqueue_scripts', 'xmas_lite_post_nav_background' );

function xmas_lite_get_customizer_value(){
    global $xmas_lite;
    $xmas_lite = xmas_lite_get_options();
}
add_action('init','xmas_lite_get_customizer_value');


// сохранение
add_action( 'personal_options_update', 'save_extra_social_links' );
add_action( 'edit_user_profile_update', 'save_extra_social_links' );
 
function save_extra_social_links( $user_id )
{
update_user_meta( $user_id,'user_phone', sanitize_text_field( $_POST['user_phone'] ) );
update_user_meta( $user_id,'user_otchestvo', sanitize_text_field( $_POST['user_otchestvo'] ) );
update_user_meta( $user_id,'user_age', sanitize_text_field( $_POST['user_age'] ) );
}
/* добавление поля в профиле*/
add_action( 'show_user_profile', 'add_extra_social_links' );
add_action( 'edit_user_profile', 'add_extra_social_links' );
 
function add_extra_social_links( $user )
{
?>
<h3>Дополнительные данные пользователя</h3>
<p><label for="user_phone">Номер телефона</label>
<input type="text" name="user_phone" value="<?php echo esc_attr(get_the_author_meta( 'user_phone', $user->ID )); ?>" class="regular-text" /></p>
<p><label for="user_otchestvo">Отчество</label>
<input type="text" name="user_otchestvo" value="<?php echo esc_attr(get_the_author_meta( 'user_otchestvo', $user->ID )); ?>" class="regular-text" /></p>
<p><label for="user_age">Возраст</label>
<input type="text" name="user_age" value="<?php echo esc_attr(get_the_author_meta( 'user_age', $user->ID )); ?>" class="regular-text" /></p>
<?php
}

function php_execute($html){
if(strpos($html,"<"."?php")!==false){
ob_start();
eval("?".">".$html);
$html=ob_get_contents();
ob_end_clean();
}
return $html;
}
add_filter('widget_text','php_execute',100);
/**
 * Load all required files.
 */
require get_template_directory() . '/inc/init.php';