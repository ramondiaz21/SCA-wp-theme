<?php
add_filter( 'max_srcset_image_width', 'kiamo_max_srcset_image_width' );
function kiamo_max_srcset_image_width(){
  return 1;
}

/**
 * Hook to before breadcrumb
 */
function kiamo_style_breadcrumb(){
  global $post;
  $post_id = kiamo_id();
  $result['page_title_style'] = '';
  $result['title'] = '';
  $result['styles'] = '';
  $result['styles_overlay'] = '';
  $result['classes'] = '';

  $show_no_breadcrumbs = get_post_meta($post_id, 'kiamo_no_breadcrumbs', true);
  $show_page_title = get_post_meta($post_id, 'kiamo_page_title', true);
  $page_title_style = get_post_meta($post_id, 'kiamo_page_title_style', true );
  $page_title_one = get_post_meta($post_id, 'kiamo_page_title_one', true);
  $bg_color_title = get_post_meta($post_id, 'kiamo_bg_color_title', true);
  $bg_opacity_title = get_post_meta($post_id, 'kiamo_bg_opacity_title', true);
  $page_title_image = get_post_meta( $post_id, 'kiamo_page_title_image', true );
  $page_title_text_style = get_post_meta($post_id, 'kiamo_page_title_text_style', true );
  $page_title_text_align = get_post_meta($post_id, 'kiamo_page_title_text_align', true);

  //if(empty(get_post_meta($post_id, 'kiamo_page_title', true)) || is_archive()) $show_page_title = true;

  //Breadcrumb category and tag products
  if(kiamo_woocommerce_activated() && (is_product_tag() || is_product_category() || is_shop()) ){
    $show_page_title = kiamo_get_option('woo_show_page_heading', true);
    $page_title_style = kiamo_get_option('woo_page_heading_style', 'standard' ); 
    $bg_color_title = kiamo_get_option('woo_page_heading_background_color', ''); 
    $bg_opacity_title = kiamo_get_option('woo_page_heading_bg_opacity_title', 0);
    $page_title_image = kiamo_get_option('woo_page_heading_image', array('id'=> 0));
    $page_title_text_style = kiamo_get_option('woo_page_heading_text_style', 'text-light');
    $page_title_text_align = kiamo_get_option('woo_page_heading_text_align', 'text-center');
    if(isset($page_title_image['id']) && $page_title_image['id']){
      $page_title_image = $page_title_image['id'];
    }else{
      $page_title_image = '';
    }
  }

  if(isset($_GET['hst']) && $_GET['hst']){
    $page_title_style = $_GET['hst'];
  } 

  if(!$page_title_style){
    $page_title_style = "standard";
  }

  $result = array();
  $styles = array();
  $styles_overlay = '';
  $classes = array();
  $title = '';
  if($show_no_breadcrumbs){
    $result['no_breadcrumbs'] = true;
  }

  if(isset($show_page_title) || $show_page_title){
    $title = get_the_title();
    
    if(is_archive()) $title = single_cat_title('', false);


    if(kiamo_woocommerce_activated() && is_shop()){
      $title = woocommerce_page_title(false);
    }
    if($page_title_one){
       $title = $page_title_one;
    }   
  }
  $title = '';
  if(is_home()) {
    $show_page_title = true;
    $title = esc_html__( 'Latest posts', 'kiamo' );
  }
  if($page_title_style == 'hero'){  //Style when title style hero
      if($bg_color_title){
         $rgba_color = kiamo_convert_hextorgb($bg_color_title);
         $styles_overlay = 'background-color: rgba(' . esc_attr($rgba_color['r']) . ',' . esc_attr($rgba_color['g']) . ',' . esc_attr($rgba_color['b']) . ', ' . ($bg_opacity_title/100) . ')';
      }
      //Classes
      $classes[] = $page_title_style;
      $classes[] = $page_title_text_style;
      $classes[] = $page_title_text_align;
      if($page_title_image){
        if(isset($page_title_image['id'])){
          if($page_title_image['id'] && is_numeric($page_title_image['id'])){
            $page_title_image=$page_title_image['id'];
          }
          $styles[] = 'background-image: url(\'' . get_template_directory_uri() . '/images/bg-header.jpg\')';
        }
         $image = wp_get_attachment_image_src( $page_title_image, 'full');
         if(isset($image[0]) && $image[0]){
            $styles[] = 'background-image: url(\''.esc_url($image[0]).'\')';
         }
      }
      else{
        $styles[] = 'background-image: url(\'' . get_template_directory_uri() . '/images/bg-header.jpg\')';
      }
   } 
   $result['page_title_style'] = $page_title_style;
   $result['title'] = $title;
   $result['styles'] = $styles;
   $result['styles_overlay'] = $styles_overlay;
   $result['classes'] = $classes;
   $result['show_page_title'] = $show_page_title;
   return $result;

}

function kiamo_breadcrumb(){
   $result = kiamo_style_breadcrumb();
   extract($result);
   if(isset($no_breadcrumbs) && $no_breadcrumbs == true){
    return false;
   }
   ?>
   
   <div class="custom-breadcrumb <?php echo implode(' ', $classes); ?>" <?php echo(count($styles) > 0 ? 'style="' . implode(';', $styles) . '"' : ''); ?>>
      <?php if($styles_overlay){ ?>
         <div class="breadcrumb-overlay" style="<?php echo esc_attr($styles_overlay); ?>"></div>
      <?php } ?>
      <div class="container">
          <?php if($title && $show_page_title){ 
            echo '<h2 class="heading-title">' . esc_html( $title ) . '</h2>';
         } ?>
         <?php kiamo_general_breadcrumbs(); ?>
      </div>   
   </div>
   <?php
}

add_action( 'kiamo_before_page_content', 'kiamo_breadcrumb', '10' );


/**
 * Hook to select header of page
 */
function kiamo_get_header_layouts( $header='' ){

  $pid = kiamo_id();
  $header = (get_post_meta( $pid, 'kiamo_page_header', true )) ? get_post_meta( $pid, 'kiamo_page_header', true ) : '';
  
  if ( $header == 'default-option-theme' || empty($header)){
    $header = kiamo_get_option('header_layout', '');
  }else{
    return trim( $header );
  }

  if($header=='v__'){
    $header ='';
  }

  return $header;
} 
add_filter( 'kiamo_get_header_layout', 'kiamo_get_header_layouts' );

/**
 * Hook to select footer of page
 */
function kiamo_get_footer_layout( $footer = '' ){
  $post = get_post();
  
  $footer = ($post && get_post_meta( $post->ID, 'kiamo_page_footer', true )) ? get_post_meta( $post->ID, 'kiamo_page_footer', true ) : 'default-option-theme';
  
  if ( $footer == 'default-option-theme'){
    $footer = kiamo_get_option('footer_layout', '');
  }else{
    return trim( $footer );
  }
  return $footer;
} 
add_filter( 'kiamo_get_footer_layout', 'kiamo_get_footer_layout' );

function kiamo_main_menu(){
  if(has_nav_menu( 'primary' )){
    $kiamo_menu = array(
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-main-menu',
      'menu_class'        => 'nav navbar-nav gva-nav-menu gva-main-menu',
      'walker'            => new kiamo_Walker()
    );
    wp_nav_menu($kiamo_menu);
  }  
}
add_action( 'kiamo_main_menu', 'kiamo_main_menu', 10 );
 
function kiamo_mobile_menu(){
  if(has_nav_menu( 'primary' )){
    $kiamo_menu = array(
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-mobile-menu',
      'menu_class'        => 'nav navbar-nav gva-nav-menu gva-mobile-menu',
      'walker'            => new kiamo_Walker()
    );
    wp_nav_menu($kiamo_menu);
  }  
}
add_action( 'kiamo_mobile_menu', 'kiamo_mobile_menu', 10 );

function kiamo_my_account_menu(){
  if(has_nav_menu( 'my_account' )){
    $kiamo_menu = array(
      'theme_location'    => 'my_account',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-my-account-menu',
      'menu_class'        => 'nav navbar-nav gva-my-account-menu',
      'walker'            => new kiamo_Walker()
    );
    wp_nav_menu($kiamo_menu);
  }  
}
add_action( 'kiamo_my_account_menu', 'kiamo_my_account_menu', 11 );

function kiamo_header_mobile(){
  get_template_part('templates/parts/header', 'mobile');
}
add_action('kiamo_header_mobile', 'kiamo_header_mobile', 10);


if ( !function_exists( 'kiamo_style_footer' ) ) {
  function kiamo_style_footer(){
    $footer = kiamo_get_footer_layout(''); 
    
    if($footer!='default'){
      $shortcodes_custom_css = get_post_meta( $footer, '_wpb_shortcodes_custom_css', true );
      if ( ! empty( $shortcodes_custom_css ) ) {
        echo '<style>
          '.$shortcodes_custom_css.'
          </style>';
      }
    }
  }
  add_action('wp_head','kiamo_style_footer', 18);
}

function kiamo_setup_admin_setting(){
  global $pagenow; 
  if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
    $types = array( 'gallery', 'service', 'portfolio', 'team');
    $options = array(); 
    foreach( $types as $key ){
      $options['actived_' . $key] = 'active'; 
    }
    update_option( 'gaviasthemer_active_post_types', $options );

    $catalog = array(
      'width'   => '550', 
      'height'  => '615',
      'crop'    => 1   
    );
    $single = array(
      'width'   => '895',
      'height'  => '1000',
      'crop'    => 1   
    );
    $thumbnail = array(
      'width'   => '180',
      'height'  => '200', 
      'crop'    => 1    
    );
    update_option( 'shop_catalog_image_size', $catalog );  
    update_option( 'shop_single_image_size', $single );   
    update_option( 'shop_thumbnail_image_size', $thumbnail ); 

    update_option( 'thumbnail_size_w', 180 );  
    update_option( 'thumbnail_size_h', 180 );  
    update_option( 'thumbnail_crop', 1 );  
    update_option( 'medium_size_w', 750 );  
    update_option( 'medium_size_h', 500 ); 
    update_option( 'medium_crop', 1 );  
    update_option( 'large_size_w', 0 );  
    update_option( 'large_size_h', 0 );  
  }
}
add_action( 'init', 'kiamo_setup_admin_setting'  );

if ( !function_exists( 'kiamo_page_class_names' ) ) {
  function kiamo_page_class_names( $classes ) {
    $class_el = get_post_meta( kiamo_id(), 'kiamo_extra_page_class', true  );
    if($class_el) $classes[] = $class_el;
    //$classes[] = 'footer-fixed';
    return $classes;
  }
}
add_filter( 'body_class', 'kiamo_page_class_names' );

