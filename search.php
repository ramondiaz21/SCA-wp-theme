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
    get_header(); 

   

    $default_sidebar_config = kiamo_get_option('single_post_sidebar', 'right-sidebar'); 
    $default_left_sidebar = kiamo_get_option('single_post_left_sidebar', 'default_sidebar');
    $default_right_sidebar = kiamo_get_option('single_post_right_sidebar', 'default_sidebar');

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
     if(!$left_sidebar_config['active'] && !$right_sidebar_config['active']){
        $main_content_config['class'] = 'col-lg-9 col-md-9 col-sm-9 col-xs-12';
    }
?>
<section id="wp-main-content" class="wp-main-content clearfix main-page title-layout-standard">
    <?php kiamo_breadcrumb(); ?>
    <div class="container">
        <div class="row">
            <div class="clearfix">
                <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>"> 
                    <div id="wp-content" class="wp-content">
                        <?php  if ( have_posts() ) : ?>
                            <div class="post-area results-search clearfix posts-list post-small post-items">
                                <?php  while ( have_posts() ) : the_post(); ?>
                                    <div class="post post-block">
                                        <div class="post-content no-padding">
                                            <div class="entry-header">
                                                <div class="entry-title"><h3 class="title"><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3></div>
                                                <div class="entry-body"><?php echo get_the_excerpt() ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>    
                            </div>                    
                        <?php else: ?>
                            <div class="widget">
                                <div class="widget-title"><?php echo esc_html__( 'Nothing Found', 'kiamo' ) ?></div>
                                <div class="widget-content">
                                    <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kiamo' ); ?>
                                    <?php get_search_form() ?>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="pagination">
                            <?php echo kiamo_pagination(); ?>
                         </div>
                    </div>
                </div>

                <?php if(!$left_sidebar_config['active'] && !$right_sidebar_config['active']): ?>
                 <div class="sidebar wp-sidebar sidebar-right col-lg-3 col-md-3 col-xs-12 pull-right">
                    <?php do_action( 'kiamo_before_sidebar' ); ?>
                    <div class="sidebar-inner">
                       <?php get_sidebar(); ?>
                    </div>
                    <?php do_action( 'kiamo_after_sidebar' ); ?>
                 </div>
                <?php endif ?>

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
    </div>
</section>
<?php get_footer(); ?>
