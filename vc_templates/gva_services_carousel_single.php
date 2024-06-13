<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_script('slick');
wp_enqueue_style('slick');

$args = array(
  'post_type' => 'service',
  'posts_per_page' => $per_page
);

if(empty($ids)){
  switch ( $mode) {
    case 'most_recent' : 
      $args['orderby'] = 'date';
      $args['order'] = 'DESC';
    break;
    case 'random' : 
      $args['orderby'] = 'rand';
     break;
    default : 
      $args['orderby'] = 'date';
      $args['order'] = 'DESC';
    break;
  }
}else{
  $args['orderby'] = 'post__in';
}

$ids = str_replace(' ', '', $ids);
if( strlen($ids) > 0 ){
  $ids = explode(',', $ids);
  if( is_array($ids) && count($ids) > 0 ){
    $args['post__in'] = $ids;
  }
}

if($cats!=''){
  $cats = str_replace(' ', '', $cats);
  if( strlen($cats) > 0 ){
      $cats = explode(',', $cats);
  }
  if( is_array($cats) && count($cats) > 0 ){
      $field_name = is_numeric($cats[0])?'term_id':'slug';
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'category_service',
              'terms' => $cats,
              'field' => $field_name,
              'include_children' => false
          )
      );
  }
}
$loop = new WP_Query($args);
$_id = kiamo_random_id();
?>

<div class="services-tab slick-tabs" data-slick-id = "<?php print $_id ?>">
  <div class="gsc-carousel-content"> 
     <div class="carousel-nav">
        <div class="tab-carousel-nav slick-slider nav-<?php print $_id ?>">
          <?php if( $loop->have_posts()): ?>
            <?php while($loop->have_posts()): $loop->the_post(); ?>
              <div class="slick-slide"><a class="link-service"><?php the_title() ?></a></div>
            <?php endwhile; ?>
          <?php endif; ?>   
        </div>
     </div>

     <div class="tab-lists-content">
        <div class="tab-carousel-list-here slick-slider tab-<?php print $_id ?>"> 
          <?php if( $loop->have_posts()): ?>
            <?php while($loop->have_posts()): $loop->the_post(); ?>
              <div class="slick-slide">
                <?php 
                  set_query_var( 'excerpt_words', $excerpt_words );
                  get_template_part( 'templates/service/content', 'item-v1' ); 
                ?>
              </div>
            <?php endwhile; ?>  
          <?php endif; ?> 
        </div>
     </div>
  </div>
</div>  

<?php wp_reset_postdata(); ?>