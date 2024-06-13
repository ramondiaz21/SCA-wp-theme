<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
$carousel_attrs = array(
  'items'               => $items_lg,
  'items_lg'            => $items_lg,
  'items_md'            => $items_md,
  'items_sm'            => $items_sm,
  'items_xs'            => $items_xs,
  'loop'                => $ca_loop,
  'speed'               => $ca_speed,
  'auto_play'           => $ca_auto_play,
  'auto_play_speed'     => $ca_auto_play_speed,
  'auto_play_timeout'   => $ca_auto_play_timeout,
  'auto_play_hover'     => $ca_play_hover,
  'navigation'          => $ca_navigation,
  'rewind_nav'          => $ca_rewind_nav,
  'pagination'          => $ca_pagination,
  'mouse_drag'          => $ca_mouse_drag,
  'touch_drag'          => $ca_touch_drag
);
?>

<div class="widget gva-blogs-carousel section-blog <?php echo esc_attr($post_style) ?> <?php echo esc_attr($el_class) ?>">
  <?php if( $title ) { ?>
    <h3 class="widget-title visual-title">
      <span><?php echo esc_html($title); ?></span>
    </h3>
  <?php } ?>

  <div class="widget-content">
    <?php $query = new WP_Query($args);
      if($query->have_posts()){ 
    ?>
    <div class="init-carousel-owl owl-carousel" <?php echo kiamo_set_carousel_attrs($carousel_attrs) ?>>
      <?php $i=0; while ( $query->have_posts() ) : $query->the_post(); $i++; ?>
          <article class="post">
            <?php if ( has_post_thumbnail() ) { ?>
              <div class="entry-thumb">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail( 'medium' ); ?>
                </a>
              </div>
            <?php } ?>
          <div class="entry-content">
            <?php if (get_the_title()) { ?>
              <h5 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h5>
            <?php  } ?>
            <div class="entry-meta clearfix">
              <?php kiamo_posted_on(); ?>
            </div>
            <?php if($show_excerpt){ ?>
              <div class="description">
                <?php echo kiamo_limit_words( $excerpt_words, get_the_excerpt(), get_the_content() ); ?>
              </div>
            <?php } ?>
          </div>
        </article>
      <?php endwhile; 
      wp_reset_postdata();
      ?>
    </div>
    <?php } ?>   
  </div>
</div>
