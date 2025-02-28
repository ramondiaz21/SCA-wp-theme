<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header(apply_filters('kiamo_get_header_layout', null ));

  $page_title_style = 'standard';
  $page_id = kiamo_id();
  if(get_post_meta( $page_id, 'kiamo_page_title_style', true )){
    $page_title_style = get_post_meta( $page_id, 'kiamo_page_title_style', true );
  }
  if(is_product_tag() || is_product_category() ){
    $page_title_style = kiamo_get_option('woo_page_heading_style', 'standard');
  }
  if(isset($_GET['hst']) && $_GET['hst']){
    $page_title_style = $_GET['hst'];
  } 

  $sidebar_layout_config = kiamo_get_option('woo_sidebar_config', '');
  $left_sidebar = kiamo_get_option('woo_left_sidebar', '');
  $right_sidebar = kiamo_get_option('woo_right_sidebar', '');

  if(is_shop()){
    $sidebar_layout_config = get_post_meta( $page_id, 'kiamo_sidebar_config', true);
    $left_sidebar = get_post_meta($page_id, 'kiamo_left_sidebar', true);
    $right_sidebar = get_post_meta($page_id, 'kiamo_right_sidebar', true);
     if ($sidebar_layout_config == "") {
      $sidebar_layout_config = kiamo_get_option('woo_sidebar_config', ''); 
    }
    if ($left_sidebar == "") {
      $left_sidebar = kiamo_get_option('woo_left_sidebar', '');  
    }
    if ($right_sidebar == "") {
      $right_sidebar = kiamo_get_option('woo_right_sidebar', ''); 
    }
  }

	$left_sidebar_config  = array('active' => false);
  $right_sidebar_config = array('active' => false);
  $main_content_config  = array('class' => 'col-lg-12 col-xs-12');

  if(isset($_GET['sb']) && $_GET['sb']){
    $sidebar_layout_config = $_GET['sb'];
  }

	$sidebar_config = kiamo_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);
   
	extract($sidebar_config);

  $woo_display = kiamo_display_modes_value();
 ?>

<section id="wp-main-content" class="clearfix main-page title-layout-<?php echo esc_attr($page_title_style); ?>">
    <?php
      /**
       * woocommerce_before_main_content hook
       *
       * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
       * @hooked woocommerce_breadcrumb - 20
       */
      do_action( 'woocommerce_before_main_content' );
    ?>
    
   <div class="container">	
   	  <div class="main-page-content row">
         <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">      
           
     			  <div id="wp-content" class="wp-content">	

  						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

  							<h1 class="page-title hidden"><?php woocommerce_page_title(); ?></h1>

  						<?php endif; ?>

  						<?php do_action( 'woocommerce_archive_description' ); ?>
              <?php woocommerce_product_subcategories(); ?>  
     						<?php if ( have_posts() ) : ?>
                  <div class="shop-loop-container">
                    <div class="gvawooaf-before-products layout-<?php echo esc_attr($woo_display) ?>">
       								<div class="woocommerce-filter clearfix">
                        <?php
         									/**
         									 * woocommerce_before_shop_loop hook
         									 *
         									 * @hooked woocommerce_result_count - 20
         									 * @hooked woocommerce_catalog_ordering - 30
         									 */
         									do_action( 'woocommerce_before_shop_loop' );
         								?>
                      </div> 

                      <?php do_action('kiamo_woocommerce_active_filter' );  ?>
                        
                      <?php woocommerce_product_loop_start(); ?>
     										
                      <?php while ( have_posts() ) : the_post(); ?>

     									<?php wc_get_template_part( 'content', 'product' ); ?>

     									<?php endwhile; // end of the loop. ?>
     							      
                      <?php woocommerce_product_loop_end(); ?>

     							<?php
     								/**
     								 * woocommerce_after_shop_loop hook
     								 *
     								 * @hooked woocommerce_pagination - 10
     								 */
     								do_action( 'woocommerce_after_shop_loop' );
     							?> 
                  </div>
                </div>
  						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

  							<?php wc_get_template( 'loop/no-products-found.php' ); ?>

  						<?php endif; ?>

  				 </div>

           <?php 
             // if(is_product_category()) {
             //    $term = get_queried_object();
             //    $resource_tab = get_field('post_related',$term); 
             //  }else{
             //      $resource_tab = get_field('post_related', $page_id);
             //  }
             //  $id= 2;
             //  if($id !== ''){
             //    global $post;
             //    $post = get_post( $id );
             //    $post->post_content = '[vc_row][vc_column][vc_basic_grid post_type="post" max_items="-1" style="load-more" items_per_page="2" btn_style="modern" btn_color="default" btn_size="xs" el_class="posts" el_id="22" grid_id="vc_gid:1614672230578-7518b883-2bf8-0" taxonomies="67"][/vc_column][/vc_row]';
             //    wp_update_post($post);
             //    echo do_shortcode($post->post_content);
             //    echo '<style id="vc_custom_css123" type="text/css" data-type="vc_shortcodes-custom-css">' . get_post_meta( $id, '_wpb_shortcodes_custom_css', true ) . '</style>';
             //    wp_reset_postdata();
             //  }
            ?>
   				
         </div>      

         <!-- Left sidebar -->
         <?php if($left_sidebar_config['active']): ?>
         <div class="sidebar wp-sidebar sidebar-left <?php echo esc_attr($left_sidebar_config['class']); ?>">
            <?php do_action( 'kiamo_before_sidebar' ); ?>
            <div class="sidebar-inner">
               <?php dynamic_sidebar($left_sidebar_config['name'] ); ?>
            </div>
            <?php do_action( 'kiamo_after_sidebar' ); ?>
         </div>
         <?php endif ?>

         <!-- Right Sidebar -->
         <?php if($right_sidebar_config['active']): ?>
         <div class="sidebar wp-sidebar sidebar-right <?php echo esc_attr($right_sidebar_config['class']); ?>">
            <?php do_action( 'kiamo_before_sidebar' ); ?>
               <div class="sidebar-inner">
                  <?php dynamic_sidebar($right_sidebar_config['name'] ); ?>
               </div>
            <?php do_action( 'kiamo_after_sidebar' ); ?>
         </div>
         <?php endif ?>
      </div>   
   </div>

    <?php
      /**
       * woocommerce_after_main_content hook
       *
       * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
       */
      do_action( 'woocommerce_after_main_content' );
   ?>
</section>

<?php get_footer(); ?>
