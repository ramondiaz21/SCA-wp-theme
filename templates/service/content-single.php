<?php 
  $images = get_post_meta( get_the_ID(), 'kiamo_gallery_images' , false );
  $show_page_title = false;
  if ( metadata_exists( 'post', get_the_ID(), 'kiamo_page_title' ) ) {
    $show_page_title = get_post_meta(get_the_ID(), 'kiamo_page_title', true);
  }
?>
<div class="service-block-single">
  <?php 
    if($show_page_title){ 
      echo '<h1 class="title">' . get_the_title() . '</h1>';
    }
  ?>
   <div class="service-images lightGallery">
    <?php if(count($images)){ ?>
      <div class="init-carousel-owl owl-carousel" data-items="1" data-items_lg="1" data-items_md="1" data-items_sm="1" data-items_xs="1" data-loop="0" data-speed="1000" data-auto_play="0" data-auto_play_speed="1000" data-auto_play_timeout="3000" data-auto_play_hover="1" data-navigation="1" data-rewind_nav="1" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
        <?php if($images && is_array($images) && count($images) > 0):
          foreach($images as $image): 
            $image_full_src = false; $image_thumb_src = false;
            if($image_full_src = wp_get_attachment_image_src($image, 'full')) $image_full_src = $image_full_src['0'];
            if($image_thumb_src = wp_get_attachment_image_src($image, 'thumbnail')) $image_thumb_src = $image_thumb_src['0']; 
          ?>
            <div class="image-item item">
               <a href="<?php echo esc_url($image_full_src) ?>" class="zoomGallery" title="" data-rel="lightGallery">
                  <span class="icon-expand"><i class="fa fa-expand"></i></span>
                  <img src="<?php echo esc_url($image_thumb_src) ?>"  class="hidden" alt="" />
               </a>
               <?php echo wp_get_attachment_image( $image, 'full' ); ?>
            </div>
          <?php  
          endforeach;
        endif; ?>
      </div> 
    <?php }else{ ?>  
      <?php the_post_thumbnail( 'full', array( 'alt' => get_the_title() ) ); ?>
    <?php } ?>
   </div>   
   <div class="service-content margin-top-20">
      <div class="content-inner"><?php the_content() ?></div>
   </div> 
</div>