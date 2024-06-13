<?php
   $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
   extract( $atts );
   $el_class .= 'position-' . $icon_position;
   $el_class .= ' '. $text_color;
?>
<div class="widget milestone-block <?php print esc_attr( $el_class ); ?>">
   <?php if($icon){ ?>
      <div class="milestone-icon"><span class="<?php print esc_attr($icon); ?>"></span></div>
   <?php } ?>   
   <div class="milestone-right">
      <div class="milestone-number"><?php print esc_attr( $number ); ?></div>
      <div class="milestone-text"><?php print esc_html( $title ) ?></div>
   </div>
</div>