<?php
/**
 * $Desc
 *
 * 
 * @package    basetheme
 * @author     gaviasthemes Team     
 * @copyright  Copyright (C) 2016 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */ 
$kiamo_options = kiamo_get_options();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
  <meta name="apple-touch-fullscreen" content="yes"/>
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <div class="wrapper-page"> <!--page-->
    <?php do_action( 'kiamo_before_header' );  ?>
    
    <header class=" header-default header-v3">
      
      <div class="<?php echo kiamo_get_option('stick_menu', '') ?>">
        <?php do_action( 'kiamo_header_mobile' ); ?>
        <div class="header-mainmenu hidden-xs hidden-sm">

            <div class="container"> 
              <div class="main-header-wrapper">
              <?php get_template_part('templates/parts/canvas'); ?>
                <div class="row">
                  <div class="logo col-lg-2 col-md-2 col-sm-12">
                    <a class="logo-theme" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <img src="<?php echo ((isset($kiamo_options['header_logo']['url']) && $kiamo_options['header_logo']['url']) ? $kiamo_options['header_logo']['url'] : get_template_directory_uri().'/images/logo.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                    </a>
                  </div>

                  <div class="col-sm-10 col-xs-12 pstatic header-right">
                    <div class="content-innter clearfix">
                      <div id="gva-mainmenu" class="pstatic main-menu header-bottom">
                        <?php do_action('kiamo_main_menu'); ?>
                      </div>
                    </div>

                    <div class="main-search gva-search">
                      <a><i class="fa fa-search"></i></a>
                    </div>
                    
                    <div class="mini-cart-header cart-v2">
                      <?php if(kiamo_woocommerce_activated()){ ?>
                        <?php  kiamo_get_cart_contents(); ?>
                      <?php } ?>  
                    </div> 
                  </div> 
            
                </div>  
              </div>  
            </div>
          </div>  
      </div> 
    </header>
    <?php do_action( 'kiamo_after_header' );  ?>
    
    <div id="page-content"> <!--page content-->
      <div class="gva-search-content search-content">
        <a class="close-search"><i class="gv-icon-4"></i></a>
        <div class="search-content-inner">
          <div class="content-inner"><?php get_search_form(); ?></div>  
        </div>  
      </div>
