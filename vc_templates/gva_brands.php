<?php
$title = $el_class = '';
$per_page = $columns = '6';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
  'post_type'          => 'brands',
  'post_status'       => 'publish',
  'posts_per_page'       => $per_page,
  'orderby'           => 'date',
  'order'             => 'desc'
);

$loop = new WP_Query($args);

?>

<section class="widget gva-brands no-bg <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title">
           <span><?php echo esc_html($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">
      <div class="count-row">
        <div class="init-carousel-owl owl-carousel" data-items="<?php echo esc_attr($columns); ?>" data-auto_play="1" data-loop="1" data-navigation="1">
             <?php while ( $loop->have_posts() ) : $loop->the_post(); 
              $url_link = get_post_meta( get_the_ID(), 'gva_url_link', true );
              ?>
                <div class="item-brand text-center">
                  <a href="<?php echo esc_url_raw($url_link ); ?>"><?php the_post_thumbnail('full' ); ?></a>     
                </div>
             <?php endwhile; 
             wp_reset_postdata();
             ?>
          </div>
       </div>
    </div>
</section>
