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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php 
	if(is_woocommerce() == true){
		if(isset($_GET['page'])){
			setMetaProducts(get_the_ID(), $_GET['page']);
		}else if(is_product_category() == true){
			setMetaProducts(woocommerce_category_description(), 'product-category');
		}else{
			setMetaProducts(get_the_ID(), 'main');
		}
	
	}else{
		echo "<title>"; 
		wp_title( '|', true, 'right' );
		echo "</title>";
	}
	?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/14693.png" type="image/png">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" type="text/css"/>
<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/fullcalendar.css' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css' />

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src='//code.jquery.com/jquery-1.10.2.js'></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src='<?php echo get_template_directory_uri(); ?>/js/moment.min.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/js/fullcalendar.js'></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74698710-1', 'auto');
  ga('send', 'pageview');

</script>
<?php /********************************************************************************/ ?>
<?php if(is_page('ticket-result')){ ?>
   
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ticket-result/style.css" type="text/css"/>
<link rel='stylesheet' href="<?php echo get_template_directory_uri(); ?>/css/ticket-result/font-awesome.min.css" type="text/css" />

     <!--[if lt IE 9]-->
	
      <script src="<?php echo get_template_directory_uri(); ?>/js/ticket-result/html5shiv.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/ticket-result/respond.min.js"></script>
    <!--[endif]--> 


<?php } ?>
<?php /********************************************************************************/ ?>

<script>
	$(function() {
		$("#datepicker").datepicker();
	});
</script>
 
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php if(is_home()){ ?>
	<meta name="google-site-verification" content="8HBNmu7-qoZOdodYWQPh9GOz-WZKYv8avEvVdaI7jUE" />
<?php }wp_head(); 
$dashboard =  esc_url( get_permalink(8) );
if(is_page(327)){
	if(is_user_logged_in ()) { 
			
			$status ="301";
			echo "<script> window.location.href='".$dashboard ."'</script>";
			exit;
	}
}

?>
<style>
.account-login {

	margin-top:10px
}
.welcome_user{
     float: left;
    font-weight: 600;
    margin-right: 10px;
    margin-top: 7px;
}
.account-login > a {
      float: right;
    margin-right: 5px;
    margin-top: 7px;
}
.account-login > a:hover{color:#b81c23}
.login-logout {
        float: right;
}
</style>
<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/style_alex.css' />
</head>

<body <?php body_class(); ?>>
	
	<div id="pop-up" onclick="fadeout();" class="pop-up-image">
		<div id="content-popup">
		</div>
	</div>
	<div class="container headerRes">
		<div class="row" id="masthead" role="banner">
			<div class="col-md-6 col-xs-12">
				<ul>
					<li class="social-links">
						<a href="http://www.facebook.com/ticketsbroadway" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/facebookHeader.png" alt="facebook logo ticket broadway"/>
						</a>
					</li>
					<li class="social-links">
						<a href="http://www.twitter.com/ticksbroadway" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/twitterHeader.png" alt="twitter logo ticket broadway"/>
						</a>
					</li>
					<li class="social-links">
						<a href="http://youtube.com" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/youtubeHeader.png" alt="youtube logo ticket broadway"/>
						</a>
					</li>
					<li class="social-links">
						<a href="http://instagram.com" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/instagramHeader.png" alt="instagram logo ticket broadway"/>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-6 col-xs-12 header_search_part">
                <?php if ( is_active_sidebar( 'email-header-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'email-header-sidebar' ); ?>
                <?php endif; ?>
			</div>
		</div><!-- #masthead -->
		<div class="row">
			<div class="col-md-6 col-xs-6" >
				<div class="col-md-12 col-xs-12">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="img-responsive" alt="Logo ticket broadway" /></a>
				</div>
				
			</div>
			<div class="col-md-6 col-xs-6">
				<div class="row">
					<div class="col-md-7 col-xs-2">
						<img src="<?php echo get_template_directory_uri(); ?>/images/phonehead.png" class="phoneHead" style="float: right;" class="img-responsive" alt="Image search Button">
					</div>
					<div class="col-md-5 col-xs-10">
						<a href="tel:18442733746"><span class="numberHead">1-844-2SEESHOW</span></a>
						<a href="tel:18442733746"><span class="smallNum">( 1-844-273-3746 )</span></a>
					</div>
					
				</div>
				<?php if(!is_user_logged_in ()) { ?>
				<div class="row login headerSocial">
					<a href="<?php echo esc_url( get_permalink(324) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/login.png" class="img-responsive" id="loginBtn" alt="Image search Button"></a>
					
					<div id="amazonBtnL" class="img-responsive"></div>
					<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/amazonLogin.png" class="img-responsive" id="amazonBtn" alt="Image search Button"> -->
					
					 <?php do_action( 'wordpress_social_login' ); ?>
					
					<!--<img src="<?php echo get_template_directory_uri(); ?>/images/twitterLogin.png" class="img-responsive" id="twitterBtn" alt="Image search Button"> -->
					
					<?php do_action('facebook_login_button');?>
				</div>
				<?php  }else{ 
				global $current_user;
				get_currentuserinfo();
			
				if(!empty($current_user->display_name)){
					$userInfo = $current_user->display_name;
				}else if(!empty($current_user->user_firstname)){
					$userInfo = $current_user->user_firstname;
				}else{
					$userInfo = $current_user->user_login;
				}
				?>
				<div class="row account-login col-xs-12">
					<div class="login-logout">
						<a href="<?php echo $dashboard; ?>"><?php  echo "<div class='welcome_user'>Welcome, ". $userInfo ."</div>";  ?></a>	
						<a href="<?php echo wp_logout_url(); ?>" class='logout_user'><img src="<?php echo get_template_directory_uri(); ?>/images/logout.jpg" alt="Logout Button" class="img-responsive" id="logoutBtn" alt="Logout Button"></a>
					</div>
				</div>
				<?php  } ?>
				<div class="col-md-0 col-xs-3 iconMenuRes">
					<img src="<?php echo get_template_directory_uri(); ?>/images/menuResponsive.png" onclick="slideDiv('#site-navigation')" class="img-responsive" alt="Menu Responsive">
				</div>
			</div>
		</div>
		<div class="row navigationHeader">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				<?php if(!is_user_logged_in ()) { ?>
					<a href="<?php echo esc_url( get_permalink(324) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/loginNormal.png" alt="Login tickets broadway" class="lginImg"><p class="loginBtnRes">Login</p></a>
				<?php  }else{ ?>
					<a href="<?php echo wp_logout_url(); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/loginNormal.png" class="lginImg"><p class="loginBtnRes">Logout</p></a>
				<?php } ?>
				<a href="<?php echo $dashboard; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/myaccountres.png" alt="My Account Button" class="lginImg"><p class="loginBtnRes myAccountRes">My Account</p></a>
				<!--- <a href="<?php echo esc_url( get_permalink(324) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/loginFacebookRes.png" class="lginImg"><p class="loginBtnRes faceB">Facebook Login</p></a> -->
				<?php do_action('facebook_login_button');?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-login.php?action=wordpress_social_authenticate&amp;mode=login&amp;provider=Twitter&amp;redirect_to=https%3A%2F%2Fticketsbroadway.com%2F"><img src="<?php echo get_template_directory_uri(); ?>/images/loginTwitterRes.png" alt="Login Twitter Res" class="lginImg"><p class="loginBtnRes twitT">Twitter Login</p></a> 
				
		<!-- this is static code implemnt for twitter login in mobile version 
		<a data-provider="Twitter" class="wp-social-login-provider wp-social-login-provider-twitter" title="Connect with Twitter" href="<?php echo esc_url( home_url( '/' ) ); ?>wp-login.php?action=wordpress_social_authenticate&amp;mode=login&amp;provider=Twitter&amp;redirect_to=https%3A%2F%2Fticketsbroadway.com%2F" rel="nofollow">
		<img src="<?php echo get_template_directory_uri(); ?>/images/loginTwitterRes.png" alt="Login Twitter Res" class="lginImg" title="Connect with Twitter"><p class="loginBtnRes twitT">Twitter Login</p></a>-->

				
				<?php // do_action( 'wordpress_social_login' ); ?>
				
				<div id="amazonBtnM" class="img-responsive"></div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/closeMenuRes.png" onclick="slideDiv('#site-navigation')" id="closeMenuRes" class="img-responsive" alt="Menu Responsive">
			</nav>
			<img src="<?php echo get_template_directory_uri(); ?>/images/searchButton.png" class="searchImgFront" alt="Image search Button">
		</div>
		<div class="row">
			<div class="col-md-12 search" id="search">
				<form action="<?php echo esc_url( get_permalink(241) ); ?>" method="POST">
					<label for="search">Search</label>
					<input type="text" onkeyup="autoCompletion()" autocomplete="off" name="nameShowSearch" id="nameShowSearch" placeholder="Search for Event">
					<input type="text" autocomplete="off" name="venueShowSearch" id="venueShowSearch" placeholder="Search by Venue">
					<input type="text" id="nameCitySearch" name="nameCitySearch" placeholder="Search by City or Zip"/>
					<input type="text" id="datepicker" name="dateShowSearch" placeholder="Search by Date" />
					<input type="submit" class="searchSubmitSearch" value="Search >"/>
					<input type="submit" class="searchSubmitSearchRes" value=""/>
				</form>
				<div id="auto-completion">
					
				</div>
			</div>
		</div>
		<script>
			var liArray = ['menu-item-185', 'menu-item-186', 'menu-item-184', 'menu-item-188', 'menu-item-189', 'menu-item-190', 'menu-item-23633']
			$.each(liArray, function (index, value){
				switch(value){
					case 'menu-item-185':
						var search = 'musicals';
						break;
					case 'menu-item-186':
						var search = 'plays';
						break;
					case 'menu-item-184':
						var search = 'comedy';
						break;
					case 'menu-item-188':
						var search = 'off-broadway';
						break;
					case 'menu-item-189':
						var search = 'dance';
						break;
					case 'menu-item-190':
						var search = 'attractions';
						break;
					case 'menu-item-23633':
						var search = 'family-shows';
						break;
				}	
				searchAjax(search, value);
			});
			
			$('#menu-item-185, #menu-item-186, #menu-item-184, #menu-item-188, #menu-item-189, #menu-item-190, #menu-item-23633').mouseenter(function (){
				$('#div'+$(this).attr('id')).fadeIn(200);
			});
			
			$('#menu-item-185, #menu-item-186, #menu-item-184, #menu-item-188, #menu-item-189, #menu-item-190, #menu-item-23633').mouseleave(function (){
				$('#div'+$(this).attr('id')).fadeOut(200);
			});

			function searchAjax(search, id){
				$.ajax({
					method: "POST",
					url: "<?php echo get_template_directory_uri(); ?>/webservice/getPostByCategory.php",
					data: {cate: search},
					success: function(html) {
						data = JSON.parse( html );
						if(data[data.length-1][0].postNameDesc != null){
							appendHover(id, data);
						}
					}
				});
			}
		
			function appendHover(id, shows){
				var showDisc = shows[shows.length-1];
				$('#'+id).append('<div class="hoverMenu" id="div'+id+'"><div id="left-'+id+'" class="divLeft">'+
						'</div><div class="divRight">'+
							'<p class="popularShow">UPCOMING SHOWS</p>'+
							'<div class="slideshowMenu">'+
								'<div id="slideshow-'+id+'" class="imgSlideShowMenu">'+
								'</div>'+
							'</div>'+
							'<div class="slidebarMenuHover">'+
								'<div id="draggable-'+id+'" class="draggable" draggable="true" ondrag="gettingDrag(event)" ></div>'+
							'</div>'+
						'</div>'+
					'</div>');
				for(var i=0; i<showDisc.length; i++){
					if(showDisc[i].postTitleDesc != null){
						$('#left-'+id).append('<p><a href="/shows/'+showDisc[i].postNameDesc+'">' + showDisc[i].postTitleDesc + '</a></p>');
					}
				}	
				$('#left-'+id).append('<p ><a class="red" href="/product-category/' + shows[i].category + '">See all ' + shows[i].category + '</a></p>');
				
				for(var i=0; i<shows.length; i++){
					$('#slideshow-'+id).append('<div class="slideShowList">'+
						'<a href="/shows/'+shows[i].postName+'">'+shows[i].thumbnail+
						'<p class="titleSlideHover">'+shows[i].postTitle+'</p>'+
						
					'</div>');
				}	
					
				$(function() {$("#draggable-"+id).draggable({ axis: "x", containment: "parent" });});
			}
			
			function gettingDrag(e){
				var str = e.target.id;
				var left = $("#"+str).css('left');
				var slideStr = str.substring(9);
				$('#slideshow'+slideStr).css('left', '-'+left); 
			}
		</script>
	</div>
	<?php if(is_home()){ ?>
	<div id="main" class="container">
	<?php }else{ ?>
	<div id="main" class="wrapper container">
	<?php } ?>
