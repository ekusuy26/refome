<?php
/**
 * Tour functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @subpackage Tour
 * @author ayatemplates
 * @since Tour 1.0.0
 *
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'TOUR_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'tour_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function tour_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, TOUR_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'tour_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function tour_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'tour' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'tour' ),
				PHP_VERSION,
				TOUR_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );

if ( ! function_exists( 'tour_setup' ) ) :
/**
 * Tour setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function tour_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'tour', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 0, true );

	// This theme uses wp_nav_menu() in header menu
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'tour' ),
		'footer'    => __( 'Footer Menu', 'tour' ),
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

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );

	// add the visual editor to resemble the theme style
	add_editor_style( 'css/editor-style.css' );

	// add custom background				 
	add_theme_support( 'custom-background', 
					array ( 'default-color' 	 => '#555555',
						    'default-attachment' => 'fixed',
						    'default-image' => '%1$s/images/background.jpg',
						  )
				 	);

	// add content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900;
	}

	// add custom header
    add_theme_support( 'custom-header', array (
                       'default-image'          => '',
                       'random-default'         => '',
                       'flex-height'            => true,
                       'flex-width'             => true,
                       'uploads'                => true,
                       'width'                  => 900,
                       'height'                 => 100,
                       'default-text-color'     => '#6baffd',
                       'wp-head-callback'       => 'tour_header_style',
                    ) );


    // add custom logo
    add_theme_support( 'custom-logo', array (
                       'width'                  => 75,
                       'height'                 => 75,
                       'flex-height'            => true,
                       'flex-width'             => true,
                    ) );

}
endif; // tour_setup
add_action( 'after_setup_theme', 'tour_setup' );

if ( ! function_exists( 'tour_sanitize_checkbox' ) ) :
	/**
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function tour_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // tour_sanitize_checkbox

if ( ! function_exists( 'tour_sanitize_url' ) ) :

	function tour_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}

endif; // tour_sanitize_url

/**
 * Register theme settings in the customizer
 */
function tour_customize_register( $wp_customize ) {

	/**
	 * Add Social Sites Section
	 */
	$wp_customize->add_section(
		'tour_social_section',
		array(
			'title'       => __( 'Social Sites', 'tour' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add facebook url
	tour_customize_add_social_site($wp_customize, 'tour_social_facebook',
		__( 'Facebook Page URL', 'tour' ));

	// Add twitter url
	tour_customize_add_social_site($wp_customize, 'tour_social_twitter',
		__( 'Twitter URL', 'tour' ));

	// Add LinkedIn
	tour_customize_add_social_site($wp_customize, 'tour_social_linkedin',
		__( 'LinkedIn', 'tour' ));

	// Add Instagram
	tour_customize_add_social_site($wp_customize, 'tour_social_instagram',
		__( 'Instagram', 'tour' ));

	// Add RSS Feeds url
	tour_customize_add_social_site($wp_customize, 'tour_social_rss',
		__( 'RSS Feeds URL', 'tour' ));

	// Add Tumblr Text Control
	tour_customize_add_social_site($wp_customize, 'tour_social_tumblr',
		__( 'Tumblr', 'tour' ));

	// Add YouTube channel url
	tour_customize_add_social_site($wp_customize, 'tour_social_youtube',
		__( 'YouTube channel URL', 'tour' ));

	// Add Pinterest Text Control
	tour_customize_add_social_site($wp_customize, 'tour_social_pinterest',
		__( 'Pinterest', 'tour' ));

	// Add VK Text Control
	tour_customize_add_social_site($wp_customize, 'tour_social_vk',
		__( 'VK', 'tour' ));

	// Add Flickr Text Control
	tour_customize_add_social_site($wp_customize, 'tour_social_flickr',
		__( 'Flickr', 'tour' ));

	// Add Vine Text Control
	tour_customize_add_social_site($wp_customize, 'tour_social_vine',
		__( 'Vine', 'tour' ));

	/**
	 * Add Slider Section
	 */
	$wp_customize->add_section(
		'tour_slider_section',
		array(
			'title'       => __( 'Slider', 'tour' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add display slider option
	$wp_customize->add_setting(
			'tour_slider_display',
			array(
					'default'           => 0,
					'sanitize_callback' => 'tour_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tour_slider_display',
							array(
								'label'          => __( 'Display Slider on a Static Front Page', 'tour' ),
								'section'        => 'tour_slider_section',
								'settings'       => 'tour_slider_display',
								'type'           => 'checkbox',
							)
						)
	);

	for ( $i = 1; $i <= 3; ++$i ) {

		$slideImageId = 'tour_slide'.$i.'_image';
		$defaultSliderImagePath = get_template_directory_uri().'/images/slider/'.$i.'.jpg';

		// Add slide background image
		$wp_customize->add_setting( $slideImageId,
			array(
				'default' => $defaultSliderImagePath,
	    		'sanitize_callback' => 'tour_sanitize_url'
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
				array(
					'label'   	 => sprintf( esc_html__( 'Slide #%s Image', 'tour' ), $i ),
					'section' 	 => 'tour_slider_section',
					'settings'   => $slideImageId,
				) 
			)
		);
	}

	/**
	 * Add Footer Section
	 */
	$wp_customize->add_section(
		'tour_footer_section',
		array(
			'title'       => __( 'Footer', 'tour' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add footer copyright text
	$wp_customize->add_setting(
		'tour_footer_copyright',
		array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tour_footer_copyright',
        array(
            'label'          => __( 'Copyright Text', 'tour' ),
            'section'        => 'tour_footer_section',
            'settings'       => 'tour_footer_copyright',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Animations Section
	 */
	$wp_customize->add_section(
		'tour_animations_display',
		array(
			'title'       => __( 'Animations', 'tour' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display Animations option
	$wp_customize->add_setting(
			'tour_animations_display',
			array(
					'default'           => 1,
					'sanitize_callback' => 'tour_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
						'tour_animations_display',
							array(
								'label'          => __( 'Enable Animations', 'tour' ),
								'section'        => 'tour_animations_display',
								'settings'       => 'tour_animations_display',
								'type'           => 'checkbox',
							)
						)
	);
}

add_action('customize_register', 'tour_customize_register');

/**
 * Add Social Site control into Customizer
 */
function tour_customize_add_social_site($wp_customize, $controlId, $label) {

	$wp_customize->add_setting(
		$controlId,
		array(
		    'sanitize_callback' => 'tour_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $controlId,
        array(
            'label'          => $label,
            'section'        => 'tour_social_section',
            'settings'       => $controlId,
            'type'           => 'text',
            )
        )
	);
}

/**
 * the main function to load scripts in the Tour theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function tour_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( ) );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
	wp_enqueue_style( 'tour-style', get_stylesheet_uri(), array() );
	
	wp_enqueue_style( 'tour-fonts', tour_fonts_url(), array(), null );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Load Utilities JS Script
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js',
			array( 'jquery' ) );

	wp_enqueue_script( 'tour-js', get_template_directory_uri() . '/js/utilities.js',
			array( 'jquery', 'viewportchecker' ) );

	// Load Slider JS Script
	wp_enqueue_script( 'pgwslider', get_template_directory_uri() . '/js/pgwslider.js', array( 'jquery' ) );

	$data = array(
		'loading_effect' => ( get_theme_mod('tour_animations_display', 1) == 1 ),
	);
	wp_localize_script('tour-js', 'tour_options', $data);
}

add_action( 'wp_enqueue_scripts', 'tour_load_scripts' );

/**
 *	Load google font url used in the Tour theme
 */
function tour_fonts_url() {

    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by PT Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $yanone = _x( 'on', 'Yanone Kaffeesatz font: on or off', 'tour' );

    if ( 'off' !== $yanone ) {
        $font_families = array();
 
        $font_families[] = 'Yanone Kaffeesatz';
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

/**
 * Display website's logo image
 */
function tour_show_website_logo_image_and_title() {

	if ( has_custom_logo() ) {

        the_custom_logo();
    }

    $header_text_color = get_header_textcolor();

    if ( 'blank' !== $header_text_color ) {
    
        echo '<div id="site-identity">';
        echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
        echo '<h1 class="entry-title">' . esc_html( get_bloginfo('name') ) . '</h1>';
        echo '</a>';
        echo '<strong>' . esc_html( get_bloginfo('description') ) . '</strong>';
        echo '</div>';
    }
}

/**
 *	Displays the copyright text.
 */
function tour_show_copyright_text() {

	$footerText = get_theme_mod('tour_footer_copyright', null);

	if ( !empty( $footerText ) ) {

		echo esc_html( $footerText ) . ' | ';		
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function tour_widgets_init() {
	
	// Register Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'tour'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'tour'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );

	// Register Footer Column #1
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #1', 'tour' ),
							'id' 			 =>  'footer-column-1-widget-area',
							'description'	 =>  __( 'The Footer Column #1 widget area', 'tour' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #2
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #2', 'tour' ),
							'id' 			 =>  'footer-column-2-widget-area',
							'description'	 =>  __( 'The Footer Column #2 widget area', 'tour' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #3
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #3', 'tour' ),
							'id' 			 =>  'footer-column-3-widget-area',
							'description'	 =>  __( 'The Footer Column #3 widget area', 'tour' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
}

add_action( 'widgets_init', 'tour_widgets_init' );

/**
 * Displays the slider
 */
function tour_display_slider() { 

	if ( ! tour_slider_has_images() ) {

		return;
	}

?>
	<div id="slider-content-wrapper">
		<ul class="pgwSlider">

			<?php
				// display slides
				for ( $i = 1; $i <= 3; ++$i ) {

					$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';
					$slideImage = get_theme_mod( 'tour_slide'.$i.'_image', $defaultSlideImage );

					if ( $slideImage != '' ) :
			?>
						<li>
							<img src="<?php echo esc_url($slideImage); ?>" />
						</li>
			<?php
					endif;
			} ?>

		</ul>
	</div>
<?php
}

/**
 * Checks if slider has at least one image
 */
function tour_slider_has_images() {

	$result = false;

	for ( $i = 1; $i <= 5; ++$i ) {

		$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';
		$slideImage = get_theme_mod( 'tour_slide'.$i.'_image', $defaultSlideImage );

		if ( $slideImage != '' ) {

			$result = true;
			break;
		}
	}

	return $result;
}

function tour_header_style() {

    $header_text_color = get_header_textcolor();

    if ( ! has_header_image()
        && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
             || 'blank' === $header_text_color ) ) {

        return;
    }

    $headerImage = get_header_image();
?>
    <style type="text/css">
        <?php if ( has_header_image() ) : ?>

                #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

        <?php endif; ?>

        <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                    && 'blank' !== $header_text_color ) : ?>

                #header-main-fixed, #header-main-fixed h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

        <?php endif; ?>
    </style>
<?php
}

function tour_display_single_social_site($socialSiteID, $title, $cssClass) {

	$socialURL = get_theme_mod( $socialSiteID );
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( $title )
							. '" class="' . esc_attr( $cssClass ) . '"></a></li>';
	}
}

/**
 * Display Social Websites
 */
function tour_display_social_sites() {

	tour_display_single_social_site('tour_social_facebook', __('Follow us on Facebook', 'tour'), 'facebook16' );

	tour_display_single_social_site('tour_social_twitter', __('Follow us on Twitter', 'tour'), 'twitter16' );

	tour_display_single_social_site('tour_social_linkedin', __('Follow us on LinkedIn', 'tour'), 'linkedin16' );

	tour_display_single_social_site('tour_social_instagram', __('Follow us on Instagram', 'tour'), 'instagram16' );

	tour_display_single_social_site('tour_social_rss',  __('Follow our RSS Feeds', 'tour'), 'rss16' );

	tour_display_single_social_site('tour_social_tumblr', __('Follow us on Tumblr', 'tour'), 'tumblr16' );

	tour_display_single_social_site('tour_social_youtube', __('Follow us on Youtube', 'tour'), 'youtube16' );

	tour_display_single_social_site('tour_social_pinterest', __('Follow us on Pinterest', 'tour'), 'pinterest16' );

	tour_display_single_social_site('tour_social_vk', __('Follow us on VK', 'tour'), 'vk16' );

	tour_display_single_social_site('tour_social_flickr', __('Follow us on Flickr', 'tour'), 'flickr16' );

	tour_display_single_social_site('tour_social_vine', __('Follow us on Vine', 'tour'), 'vine16' );
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function tour_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'tour_skip_link_focus_fix' );

?>
