<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$_id = kiamo_random_id();
$line_data = array();
$items = (array) vc_param_group_parse_atts( $items );
foreach ( $items as $data ) {
  $new_line = $data;
  $new_line['title'] = isset( $data['title'] ) ? $data['title'] : '';
  $new_line['icon'] = isset( $data['icon'] ) ? $data['icon'] : '';
  $new_line['content'] = isset( $data['content'] ) ? $data['content'] : '';
  $line_data[] = $new_line;
}
?>
<div class="gsc-workprocess <?php echo esc_attr($el_class) ?>" id="<?php echo esc_attr($_id); ?>">
   <ul class="service-timeline post-area">
     <?php foreach( $line_data as $data ): ?>
      <li class="entry-timeline clearfix">
         <div class="hentry " data-bottom-top="opacity: 0;" data-center-bottom="opacity: 1;" data-top-bottom="opacity: 0;">
            <div class="icon"><span class="<?php echo esc_attr($data['icon']); ?>"></span></div>    
            <div class="hentry-box clearfix">
               <div class="content-inner">
                  <div class="title"><?php echo esc_html($data['title']) ?></div>
                  <div class="content"><?php echo wp_kses($data['content'], true) ?></div>
               </div>   
           </div>
        </div> 
      </li>
      <?php endforeach;  ?>  
   </ul>
</div>  