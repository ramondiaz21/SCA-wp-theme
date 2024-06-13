<?php 
   $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
   extract( $atts );
   if( $target ){
      $target = 'target="_blank"';
   }
   if($background) $background = wp_get_attachment_image_src($background, 'full');

?>

<div class="gsc-image-content <?php echo esc_attr($el_class); ?>">
   <div class="image">
      <?php if($link){ ?><a <?php echo esc_html($target) ?> href="<?php echo esc_url($link) ?>"><?php } ?>
         <?php if(isset($background[0]) && $background[0]){ ?>
            <img src="<?php echo esc_url($background[0]) ?>" alt="<?php echo esc_html($title) ?>" />
         <?php } ?>
      <?php if($link){ ?></a><?php } ?>
   </div>
   <div class="content">
      <?php if($title){ ?><h4 class="title"><?php echo esc_html($title) ?></h4><?php } ?>   
      <div class="desc"><?php echo esc_html($content); ?></div>
      <?php if($link){ ?>
         <div class="read-more"><a class="btn-theme btn btn-sm" href="<?php echo esc_url($link) ?>"><?php echo esc_html__( 'Read more', 'kiamo' ); ?></a></div>
      <?php } ?>  
   </div>  
</div>