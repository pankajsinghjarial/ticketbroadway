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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="google-site-verification" content="1dK7B4BTzhcVd0jC9xFMujmA2HMnmMii-niSvPg8VL0" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ticketmap/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ticketmap/stylenew.css" type="text/css"/>
<link rel='stylesheet' href="<?php echo get_template_directory_uri(); ?>/css/ticketmap/font-awesome.min.css" type="text/css" />
<script src='<?php echo get_template_directory_uri(); ?>/js/jquery.min.js'></script>
    <!--[if lt IE 9]-->
	
      <script src="<?php echo get_template_directory_uri(); ?>/js/ticket-result/html5shiv.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/ticket-result/respond.min.js"></script>
    <!--[endif]--> 

<?php //wp_head(); ?>

</head>

 <body>


 <section class="top-head mobile_setting">
      <div class="container">
        <div class="row">

          <div class="col-md-2">
            <a href="<?php echo WP_SITEURL; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="img-responsive"></a>
          </div>

          <!--div class="col-md-10">
            img src="<?php echo get_template_directory_uri(); ?>/images/right-logo.png" class="img-responsive img-right"

          </div-->
<div class="col-md-10 no-left-padding ticket-right mobile_setting">
            <div class="col-md-12 border-top-1">
            </div> <!-- col-md-12 border-top-1 -->
             <div class="col-md-12 border-top-3 ">
              <div class="text-right">
                <p><img style="width: 20px; margin-right: 5px;" src="<?php echo get_template_directory_uri(); ?>/images/telephone.png"> 1-844-2SEESHOW</p>
              </div>
            </div> <!-- col-md-12 border-top-2  -->
          </div>
        </div>
      </div>
    </section>

  
   


