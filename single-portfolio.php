<?php
/**
 * $Desc
 *
 * 
 * @package    basetheme
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2016 Gaviasthemess. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */
    get_header(apply_filters('kiamo_get_header_layout', null )); 

    $page_id = kiamo_id();
    $page_title_style = 'standard';
    $page_title_style = get_post_meta($page_id, 'kiamo_page_title_style', true );

    $default_sidebar_config = kiamo_get_option('single_portfolio_sidebar', 'right-sidebar'); 
    $default_left_sidebar = kiamo_get_option('single_portfolio_left_sidebar', 'blog_sidebar');
    $default_right_sidebar = kiamo_get_option('single_portfolio_right_sidebar', 'blog_sidebar');

    $sidebar_layout_config = get_post_meta($page_id, 'kiamo_sidebar_config', true);
    $left_sidebar = get_post_meta($page_id, 'kiamo_left_sidebar', true);
    $right_sidebar = get_post_meta($page_id, 'kiamo_right_sidebar', true);

    if ($sidebar_layout_config == "") {
        $sidebar_layout_config = $default_sidebar_config;
    }
    if ($left_sidebar == "") {
        $left_sidebar = $default_left_sidebar;
    }
    if ($right_sidebar == "") {
        $right_sidebar = $default_right_sidebar;
    }

   $left_sidebar_config  = array('active' => false);
   $right_sidebar_config = array('active' => false);
   $main_content_config  = array('class' => 'col-lg-12 col-xs-12');

    $sidebar_config = kiamo_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);
   
    extract($sidebar_config);

 ?>

<section id="wp-main-content" class="clearfix main-page title-layout-<?php echo esc_attr($page_title_style); ?>">
    <?php do_action( 'kiamo_before_page_content' ); ?>
    <div class="container">  
      <div class="main-page-content row">
        <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">      
          <div id="wp-content" class="wp-content clearfix">
            <?php while ( have_posts() ) : the_post(); ?>
              
              <div class="portfolio-thumbnail">
                <?php $gallery = get_post_meta(get_the_ID(), 'kiamo_gallery_images', false ); ?>
                <?php if(count($gallery)){ ?>
                  <div class="init-carousel-owl owl-carousel" data-items="1" data-items_lg="1" data-items_md="1" data-items_sm="1" data-items_xs="1" data-loop="1" data-speed="1000" data-auto_play="1" data-auto_play_speed="1000" data-auto_play_timeout="3000" data-auto_play_hover="1" data-navigation="1" data-rewind_nav="1" data-pagination="1" data-mouse_drag="1" data-touch_drag="1">
                    <?php foreach ($gallery as $image) { 
                      $img = wp_get_attachment_image_src($image, 'full');
                      $img_thumb = wp_get_attachment_image_src($image, 'thumbnail');
                    ?>
                    <div class="item"><img src="<?php echo esc_url($img[0]) ?>" alt="<?php the_title() ?>" /></div>
                    <?php } ?>
                  </div>
                <?php }else{ ?>  
                  <?php the_post_thumbnail( 'full', array( 'alt' => get_the_title() ) ); ?>
                <?php } ?>
              </div>
              
              <div class="portfolio-content margin-top-20">
                
                <?php 
                  $informations = get_post_meta(get_the_ID(), 'pinformations', false ); 
                  if(isset($informations[0]) && $informations){
                    $informations = $informations[0];
                  }
                ?>
                <?php if($informations){ ?>
                  <div class="portfolio-information">
                    <ul>
                      <?php foreach ($informations as $key => $info) { ?>
                        <li>
                          <span class="label"><?php echo esc_html($info['label']) ?></span>
                          <span class="value"><?php echo esc_html($info['value']) ?></span>
                        </li>
                      <?php } ?>
                    </ul>
                  </div>
                <?php } ?>

                <div class="content-inner"><?php the_content() ?></div>

              </div>  
            <?php endwhile; ?>  

            <?php 
              if( comments_open() || get_comments_number() ) {
                comments_template();
              }
            ?>
            <?php kiamo_post_nav(); ?>
          </div>    
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
    <?php do_action( 'kiamo_after_page_content' ); ?>
</section>

<?php get_footer(); ?>
