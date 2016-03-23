<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php 
	if(is_woocommerce() == true){
		setMetaProducts(get_the_ID(), $_GET['page']);
	}else{
		echo "<title>"; 
		wp_title( '|', true, 'right' );
		echo "</title>";
	}
	?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" type="text/css"/>
<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/fullcalendar.css' />
<script src='<?php echo get_template_directory_uri(); ?>/js/jquery.min.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/js/moment.min.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/js/fullcalendar.js'></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<div class="container" id="maindiv-site">
			<div class="row" id="masthead" role="banner">
					
			</div><!-- #masthead -->
			<div class="row">
				<div class="col-md-4" style="    padding-top: 20px;">
					<ul>
						<li class="social-links">
							<a href="http://facebook.com">
								<img src="<?php echo get_template_directory_uri(); ?>/images/facebook-logo.png" alt="facebook logo ticket broadway"/>
							</a>
						</li>
						<li class="social-links">
							<a href="http://twitter.com">
								<img src="<?php echo get_template_directory_uri(); ?>/images/twitter-logo.png" alt="twitter logo ticket broadway"/>
							</a>
						</li>
						<li class="social-links">
							<a href="http://youtube.com">
								<img src="<?php echo get_template_directory_uri(); ?>/images/youtube-logo.png" alt="youtube logo ticket broadway"/>
							</a>
						</li>
						<li class="social-links">
							<a href="http://instagram.com">
								<img src="<?php echo get_template_directory_uri(); ?>/images/instagram-logo.png" alt="instagram logo ticket broadway"/>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo ticket broadway" /></a>
				</div>
				<div class="col-md-4" style="padding-top: 20px;">
					<a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/login.png" alt="Logo ticket broadway" /></a>
					<img src="<?php echo get_template_directory_uri(); ?>/images/menu.png" alt="Logo ticket broadway" />
				</div>
			</div>
			<div class="row">
				<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</nav>
			</div>
		</div>
	<?php if(is_home()){ ?>
		<div class="container-fluid mainslide">
		<ul>
		<?php 
			$args = array('post_type' => 'product', 'posts_per_page' => 5, 'post_status' => 'publish');
			// The Query
			$the_query = new WP_Query( $args );
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$product = new WC_product(get_the_ID());
					$image = get_the_post_thumbnail(get_the_ID(), apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array('title'	=> $image_title,'alt'	=> $image_title) );
					echo '<li class="social-links slideimage"><a href="'.get_permalink(get_the_ID()).'">'.$image.'</a>';
					echo '</li>';
				}
			} else {
				// no posts found
			}
			
			/* Restore original Post Data */
			wp_reset_postdata(); ?>
		</ul>
		</div>
	<?php	} ?>
	<div id="main" class="wrapper container">