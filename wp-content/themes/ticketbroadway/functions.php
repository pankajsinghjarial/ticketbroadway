<?php
/**
	* Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development and
 * https://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

add_action('admin_menu','wphidenag');
function wphidenag() {
remove_action( 'admin_notices', 'update_nag', 3 );
}
/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );


/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140711', true );

	$font_url = twentytwelve_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function twentytwelve_mce_css( $mce_css ) {
	$font_url = twentytwelve_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'twentytwelve_mce_css' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'First Sidebar Footer', 'twentytwelve' ),
		'id' => 'first-sidebar-footer',
		'description' => __( 'Appears on all the page in the footer', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Second Sidebar Footer', 'twentytwelve' ),
		'id' => 'second-sidebar-footer',
		'description' => __( 'Appears on all the page in the footer', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Information Sidebar Footer', 'twentytwelve' ),
		'id' => 'information-sidebar-footer',
		'description' => __( 'Appears on all the page in the footer', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Social Media Links Footer', 'twentytwelve' ),
		'id' => 'social-media',
		'description' => __( 'Appears on all the page in the footer', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Email header Section', 'twentytwelve' ),
		'id' => 'email-header-sidebar',
		'description' => __( 'Appears on header', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Email footer Section', 'twentytwelve' ),
		'id' => 'email-footer-sidebar',
		'description' => __( 'Appears on header', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo esc_attr( $html_id ); ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function twentytwelve_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_customize_preview_js() {
	wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );


add_action('woocommerce_archive_description', 'woocommerce_category_description', 2);

function woocommerce_category_description() {
    if (is_product_category()) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        return $cat->term_id; // the category needed.
    }
}

function getCast(){
	if( have_rows('actors') ):
		// loop through the rows of data
		while ( have_rows('actors') ) : the_row();
			$actor = get_sub_field('actor_name');
			$actor_rolename = get_sub_field('actor_role');
			$actor_description = get_sub_field('role_description');
			$summary_description = get_sub_field('summary_description');
			$actor_type = get_sub_field('cast_or_crew');
			$images = get_field('cast-crew-gallery', $actor->ID);
			if($images != false){
				$image = array($images[0]["cast-crew-gallery-image"]["sizes"]["thumbnail"]);
			}else{
				$image = array(get_template_directory_uri().'/images/default-user-icon-profile.png');
			}
			if($actor_type == 'Casting'){
				$url = "./?page=cast-crew/".$actor->post_name."-as-".strtolower(str_replace(' ', '-', $actor_rolename));
				?>
				<div class="row hr actors" >
					<div class="row imgTitleActors">
						<div class="col-md-1 col-xs-2 margin-10b">
							<img src="<?php echo $image[0]; ?>" alt="Image alt"/> 
						</div>
						<div class="col-xs-10 col-md-11 margin-10b actor_title">
							<a href="<?php echo $url; ?>"><?php echo $actor->post_title; ?></a><span class="roleActor"><b><?php echo $actor_rolename; ?></b></span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1 col-xs-0 margin-10b">
						</div>
						<div class="col-xs-12 col-md-11 margin-10b descriptionActorRes">
							<?php echo $summary_description; ?>
							<p><a href="<?php echo $url; ?>">Read More</a></p>
						</div>
					</div>
				</div>
			<?php
			}
		endwhile;
	endif;
	if( have_rows('less_important_actors') ):
		// loop through the rows of data
		while ( have_rows('less_important_actors') ) : the_row();
			$actor = get_sub_field('l_name');
			$actor_rolename = get_sub_field('l_role_name');
			$actor_type = get_sub_field('l_role');
			$actor_description = get_sub_field('l_description');
			$image = get_sub_field('l_image');
			if($actor_type == 'Casting'){?>
				<div class="row hr actors" style="margin-top: 10px;">
					<div class="col-md-1 col-xs-0 margin-10b">
						<?php if($image == false){?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/default-user-icon-profile.png" alt="Image alt"/> 
						<?php }else{?>
							<img src="<?php echo $image["url"]; ?>" alt="Image alt"/> 
						<?php } ?>
					</div>
					<div class="col-xs-12 col-md-11 margin-10b actor_description">
						<b><?php echo $actor; ?></b><span class="roleActor"><b><?php echo $actor_rolename; ?></b></span>
						<?php echo $actor_description; ?>
					</div>
				</div>
			<?php
			}
		endwhile;
	endif; 
}

function getCrew(){
	$i = 0;
	if( have_rows('actors') ):
		// loop through the rows of data
		while ( have_rows('actors') ) : the_row();
			$actor = get_sub_field('actor_name');
			$actor_rolename = get_sub_field('actor_role');
			$actor_description = get_sub_field('role_description');
			$summary_description = get_sub_field('summary_description');
			$actor_type = get_sub_field('cast_or_crew');
			$images = get_field('cast-crew-gallery', $actor->ID);
			if($images != false){
				$image = array($images[0]["cast-crew-gallery-image"]["sizes"]["thumbnail"]);
			}else{
				$image = array(get_template_directory_uri().'/images/default-user-icon-profile.png');
			}
			if($actor_type == 'Crew'){
				$url = "./?page=cast-crew/".$actor->post_name."-as-".strtolower(str_replace(' ', '-', $actor_rolename));
				?>
				<h2><?php echo $actor_rolename; ?><span class="showCrew" id="showCrew-<?php echo $i; ?>" onclick="showCrew(<?php echo $i; ?>)">-</span></h2>
				<div class="row crewMembers" id="crew-<?php echo $i; ?>">
					<div class="row imgTitleActors" >
						<div class="col-md-1 col-xs-2 margin-10b">
							<img src="<?php echo $image[0]; ?>" alt="Image alt"/> 
						</div>
						<div class="col-xs-10 col-md-11 margin-10b actor_title">
							<a href="<?php echo $url; ?>"><?php echo $actor->post_title; ?></a>
						
						</div>
					</div>
					<div class="row">
						<div class="col-md-1 col-xs-0 margin-10b actorImage">
						</div>
						<div class="col-xs-12 col-md-11 margin-10b descriptionActorRes">
							<?php echo $summary_description; ?>
							<p><a href="<?php echo $url; ?>">Read More</a></p>
						</div>
					</div>
				</div>
			<?php
			$i++;
			}
		endwhile;
	endif;
	if( have_rows('less_important_actors') ):
		// loop through the rows of data
		while ( have_rows('less_important_actors') ) : the_row();
			$actor = get_sub_field('l_name');
			$actor_rolename = get_sub_field('l_role_name');
			$actor_type = get_sub_field('l_role');
			$actor_description = get_sub_field('l_description');
			$image = get_sub_field('l_image');
			if($actor_type == 'Crew'){?>
				<div class="row">
					<h2><?php echo $actor_rolename; ?><span class="showCrew" id="showCrew-<?php echo $i; ?>" onclick="showCrew(<?php echo $i; ?>)">-</span></h2>
					<div class="crewMembers" id="crew-<?php echo $i; ?>">
						<div class="col-md-1 margin-10b actorImage">
							<?php if($image == false){?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/default-user-icon-profile.png" alt="Image alt"/> 
							<?php }else{?>
								<img src="<?php echo $image["url"]; ?>" alt="Image alt"/> 
							<?php } ?>
						</div>
						<div class="col-xs-12 col-md-11 margin-10b actor_description">
							<p><a href="<?php echo $url; ?>"><?php echo $actor; ?></a></p>
							<?php echo $actor_description; ?>
						</div>
					</div>
				</div>
			<?php
			$i++;
			}
		endwhile;
	endif; 
}

function getCastMain($type){
	if( have_rows('actors') ):
		// loop through the rows of data
		while ( have_rows('actors') ) : the_row();
			$actor = get_sub_field('actor_name');
			$actor_rolename = get_sub_field('actor_role');
			$actor_type = get_sub_field('cast_or_crew');
			if($actor_type == $type){
				$url = "./?page=cast-crew/".$actor->post_name."-as-".strtolower(str_replace(' ', '-', $actor_rolename));
				?>
				<div class="col-xs-12 col-md-12 margin-10b hr">
					<span><b><?php echo $actor_rolename; ?></b></span><span style="float: right; margin-right: 7%;"><a href="<?php echo $url; ?>"><?php echo $actor->post_title; ?></a></span>
				</div>
			<?php
			}
		endwhile;
	endif;
	
	echo getLessImportantCastAndCrewMain($type);
}

function getLessImportantCastAndCrewMain($type){
	if( have_rows('less_important_actors') ):
		// loop through the rows of data
		while ( have_rows('less_important_actors') ) : the_row();
			$actor = get_sub_field('l_name');
			$actor_rolename = get_sub_field('l_role_name');
			$actor_type = get_sub_field('l_role');
			$actor_description = get_sub_field('l_description');
			if($actor_type == $type){?>
				<div class="col-xs-12 col-md-12 margin-10b hr">
					<span><b><?php echo $actor_rolename; ?></b></span><span style="float: right; margin-right: 7%;"><?php echo $actor; ?></span>
				</div>
			<?php
			}
		endwhile;
	endif; 
}

function getReviews($id=null){
	if($id == null){
		$count = count(get_field('Magazine_reviews'));
		if($count > 0){
		$infoReviews = array();
		$all_note = 0;
		if( have_rows('Magazine_reviews') ):
			// loop through the rows of data
			while ( have_rows('Magazine_reviews') ) : the_row();
				$note = get_sub_field('note');
				$all_note = $all_note + $note;
			endwhile;
		endif;
		$mid = number_format($all_note / $count, 1);
		$width = number_format($mid * 20, 1);
		return $width;
		}
	}else{
		if($count > 0){
		$count = count(get_field('Magazine_reviews', $id));
		$infoReviews = array();
		$all_note;
		if( have_rows('Magazine_reviews', $id) ):
			// loop through the rows of data
			while ( have_rows('Magazine_reviews', $id) ) : the_row();
				$note = get_sub_field('note');
				$all_note = $all_note + $note;
			endwhile;
		endif;
		$mid = number_format($all_note / $count, 1);
		$width = number_format($mid * 20, 1);
		return $width;
		}
	}
}

function getTheatre(){
	$theatre = get_field('venue');
	?>
			 <a href="./venue/<?php echo $theatre->post_name; ?>"><?php echo $theatre->post_title; ?> ></a> 
<?php
}

function setMetaProducts($id_product, $page_type){
	preg_match('/(.*)-as-(.*)/', $page_type, $matches);
	if(substr($page_type, 0, 9) == 'cast-crew' && substr($page_type, 10) == ''){
		$title = get_post_custom_values('wpcf-meta-title-cast-crew', $id_product);
		$description = get_post_custom_values('wpcf-meta-description-cast-crew', $id_product);
		$keywords = get_post_custom_values('wpcf-meta-keywords-cast-crew', $id_product);
		?>
		<title><?php echo $title[0]; ?></title>
		<meta name="description" content="<?php echo htmlentities($description[0]); ?>">
		<meta name="keywords" content="<?php echo htmlentities($keywords[0]); ?>">
		<?php 
	}else if($page_type == 'reviews'){
		$title = get_post_custom_values('wpcf-meta-title-reviews', $id_product);
		$description = get_post_custom_values('wpcf-meta-description-reviews', $id_product);
		$keywords = get_post_custom_values('wpcf-meta-keywords-reviews', $id_product);
		?>
		<title><?php echo $title[0]; ?></title>
		<meta name="description" content="<?php echo htmlentities($description[0]); ?>">
		<meta name="keywords" content="<?php echo htmlentities($keywords[0]); ?>">
		<?php 
	}else if(substr($page_type, 0, 5) == 'venue'){
		$title = get_post_custom_values('wpcf-meta-title-venue', $id_product);
		$description = get_post_custom_values('wpcf-meta-description-venue', $id_product);
		$keywords = get_post_custom_values('wpcf-meta-keywords-venue', $id_product);
		?>
		<title><?php echo $title[0]; ?></title>
		<meta name="description" content="<?php echo htmlentities($description[0]); ?>">
		<meta name="keywords" content="<?php echo htmlentities($keywords[0]); ?>">
		<?php 
	}else if(isset($matches[1]) && $matches[1] != ''){
		$actor_name = substr($matches[1], 10);
		// check if the repeater field has rows of data
			if( have_rows('actors') ):

				// loop through the rows of data
				while ( have_rows('actors') ) : the_row();
					// display a sub field value
					if($actor_name == get_sub_field('actor_name')->post_name){
						echo '<title>'.get_sub_field('meta_title_actor').'</title>';
						echo '<meta name="description" content="'.htmlentities(get_sub_field('meta_description_actor')).'">';
						echo '<meta name="keywords" content="'.htmlentities(get_sub_field('meta_keyword_actor')).'">';
					}
				endwhile;
			else :
				// no rows found
			endif;

	}else if($page_type == 'product-category'){
		$term = get_term_by( 'id', $id_product, 'product_cat', 'ARRAY_A' );
	?>
		<title><?php echo $term['name'].' - Tickets Broadway'; ?></title>
		<meta name="description" content="<?php echo $term['name'].' - Tickets Broadway'; ?>">
		<meta name="keywords" content="<?php echo $term['name']; ?>">
	<?php 
	}else{
		$title = get_post_custom_values('wpcf-meta-title-main', $id_product);
		$description = get_post_custom_values('wpcf-meta-description-main', $id_product);
		$keywords = get_post_custom_values('wpcf-meta-keywords-main', $id_product);
		?>
		<title><?php echo $title[0]; ?></title>
		<meta name="description" content="<?php echo htmlentities($description[0]); ?>">
		<meta name="keywords" content="<?php echo htmlentities($keywords[0]); ?>">
		<?php 
	}
	

}

function createPage($post_ID)  {
	$post = get_post($post_ID);
	$post_name = $post->post_name;
	$title = $post->post_title;
	global $user_ID;
	$page['post_type']    = 'page';
	$page['post_content'] = $post_ID;
	$page['post_parent']  = 0;
	$page['post_author']  = $user_ID;
	$page['post_status']  = 'publish';
	$page['post_title']   =  $title.' Theaters';
	$page['post_name']   =  $post_name.'-theaters';
	$page['page_template']   = 'template-shows-theater.php';
	$pageid = wp_insert_post ($page);
	if ($pageid == 0) { /* Add Page Failed */ }
}
add_action ( 'publish_city', 'createPage' );

function redirect_login_page() {
    $login_page  = home_url( '/wp-admin/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);
 
    if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}
add_action('init','redirect_login_page');

function login_failed() {
	if(strpos($query_string, 'amazonLogin=1&access_token') === false ){
		$login_page  = home_url( '/login/' );
		wp_redirect( $login_page . '?login=failed' );
		exit;
	}
}
add_action( 'wp_login_failed', 'login_failed' );
//add_filter('site_url',  'wplogin_filter', 10, 3);
function wplogin_filter( $url, $path, $orig_scheme )
{
 $old  = array( "/(wp-login\.php)/");
 $new  = array( "login");
 return preg_replace( $old, $new, $url, 1);
}
 //add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

function my_enqueue_scripts() {

    wp_enqueue_script('jquery');
}
function verify_username_password( $user, $username, $password ) {
	//if(is_wp_error( $user)){
		//  echo $user->get_error_message();
	//}
	//die;
	//$query_string = $_SERVER['QUERY_STRING'];
	
	
	if(strpos($query_string, 'amazonLogin=1&access_token') === false ){
		$login_page  = home_url( '/login/' );
		if( $username == "" || $password == "" ) {
			wp_redirect( $login_page . "?login=empty" );
			exit;
		}
	}
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);

function logout_page() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page . "?login=false" );
    exit;
}
add_action('wp_logout','logout_page');

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
				if($post_type_object->labels->name != 'Products'){
					echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';
				}
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
				if($post_type_object->labels->name != 'Products'){
					echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';
				}
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                $product = get_post($post->ID);
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><a href="/shows/'.$product->post_name.'">' . get_the_title() . '</a></strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><a href="/shows/'.$product->post_name.'">' . get_the_title() . '</a></strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

function getPoster($id){
	
	if( wp_get_attachment_url(get_post_thumbnail_id($id)) != ""){
		$image = wp_get_attachment_url(get_post_thumbnail_id($id));
		return $image;
		
	}else{
		$product = new WC_Product($id);
		$image = get_template_directory_uri().'/images/nothumbnail.png';
		return $image;
	}
}

function retrieve_password_custom($user_login){
    global $wpdb, $wp_hasher;
    $user_login = sanitize_text_field($user_login);
    
    if ( empty( $user_login) ) {
        return false;
    } else if ( strpos( $user_login, '@' ) ) {
        $user_data = get_user_by( 'email', trim( $user_login ) );
        if ( empty( $user_data ) )
           return false;
    } else {
        $login = trim($user_login);
        $user_data = get_user_by('login', $login);
    }

    do_action('lostpassword_post');
    if ( !$user_data ) return false;
    // redefining user_login ensures we return the right case in the email
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;
    do_action('retreive_password', $user_login);  // Misspelled and deprecated
    do_action('retrieve_password', $user_login);
    $allow = apply_filters('allow_password_reset', true, $user_data->ID);
    if ( ! $allow )
        return false;
    else if ( is_wp_error($allow) )
        return false;
    $key = wp_generate_password( 20, false );
    do_action( 'retrieve_password_key', $user_login, $key );

    if ( empty( $wp_hasher ) ) {
        require_once ABSPATH . 'wp-includes/class-phpass.php';
        $wp_hasher = new PasswordHash( 8, true );
    }
    $hashed = $wp_hasher->HashPassword( $key );    
    $wpdb->update( $wpdb->users, array( 'user_activation_key' => time().":".$hashed ), array( 'user_login' => $user_login ) );
    $message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
    $message .= network_home_url( '/' ) . "\r\n\r\n";
    $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
    $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
    $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
    $message .= '<' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";

    if ( is_multisite() )
        $blogname = $GLOBALS['current_site']->site_name;
    else
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

    $title = sprintf( __('[%s] Password Reset'), $blogname );

    $title = apply_filters('retrieve_password_title', $title);
    $message = apply_filters('retrieve_password_message', $message, $key);

    if ( $message && !wp_mail($user_email, $title, $message) )
        wp_die( __('The e-mail could not be sent.') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...') );

    echo '<p>Link for password reset has been emailed to you. Please check your email.</p>';;
}


function deleteUser(){
    header('content-type: application/javascript');
    $user_id = $_REQUEST['user_id'];
    if(isset($_REQUEST['callback'])){
        $callback = $_REQUEST['callback'];
    }
    echo $callback.'('.str_replace('\\/','/',json_encode(wp_delete_user($user_id))). ')';
    die;
}

add_action( 'wp_ajax_delete_user', 'deleteUser' );
add_action( 'wp_ajax_nopriv_delete_user', 'deleteUser' );
add_filter('wp_mail_content_type','set_content_type');

function set_content_type($content_type){
return 'text/html';
}

/* Send data to superadmin on GET NOTIFIED form submission*/
add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' ); 

function your_wpcf7_mail_sent_function( $contact_form ) {
    global $wpdb;
    $title = $contact_form->title;
    $submission = WPCF7_Submission::get_instance();
  
    if ( $submission ) {
    	$posted_data = $submission->get_posted_data();
    }

    if ( 'Notify Me' == $title ) {
        $firstName = $posted_data['firstNameNot'];
        $lastName = $posted_data['lastNameNot'];
        $email = $posted_data['emailTot'];
        $wpdb->query("INSERT into notified_users(first_name,last_name,email) values('".$firstName."','".$lastName."','".$email."')");
    }
}
