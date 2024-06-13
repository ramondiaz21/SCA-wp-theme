<?php
$title = $subtitle = $el_class = '';
$align = 'align-center';
$style_text = 'text-dark';
$style = 'style-default';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$class = array();
$class[] = $el_class;
$class[] = $align;
$class[] = $style;
$class[] = $style_text;
?>

<div class="widget gsc-heading <?php echo implode(' ', $class) ?>">
   <?php if($subtitle){ ?><div class="title-sub"><span><?php echo esc_html($subtitle); ?></span></div><?php } ?>
   <?php if($title){ ?><h2 class="title"><span><?php echo esc_html($title); ?></span><span class="heading-line"></span></h2><?php } ?>
   <?php if($desc){ ?><div class="title-desc"><?php echo esc_html($desc); ?></div><?php } ?>
</div>
