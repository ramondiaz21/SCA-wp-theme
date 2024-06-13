<?php
function kiamo_register_meta_boxes(){

   $prefix = 'kiamo_';
   global $meta_boxes, $wp_registered_sidebars;;
   $sidebar = array();
   $sidebar[""] = ' --Default-- ';
   foreach($wp_registered_sidebars as $key => $value){
      $sidebar[$value['id']] = $value['name'];
   }
   $default_options = get_option('kiamo_options');
   
   $meta_boxes = array();

   /* Thumbnail Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_post_thumbnail',
      'title' => esc_html__('Thumbnail', 'kiamo'),
      'pages' => array( 'post' ),
      'context' => 'normal',
      'fields' => array(
         
         // THUMBNAIL IMAGE
         array(
            'name'  => esc_html__('Thumbnail image', 'kiamo'),
            'desc'  => esc_html__('The image that will be used as the thumbnail image.', 'kiamo'),
            'id'    => "{$prefix}thumbnail_image",
            'type'  => 'image_advanced',
            'max_file_uploads' => 1
         ),

         // THUMBNAIL VIDEO
         array(
            'name' => esc_html__('Thumbnail video URL', 'kiamo'),
            'id' => $prefix . 'thumbnail_video_url',
            'desc' => esc_html__('Enter the video url for the thumbnail. Only links from Vimeo & YouTube are supported.', 'kiamo'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL AUDIO
         array(
            'name' => esc_html__('Thumbnail audio URL', 'kiamo'),
            'id' => "{$prefix}thumbnail_audio_url",
            'desc' => esc_html__('Enter the audio url for the thumbnail.', 'kiamo'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL GALLERY
         array(
            'name'             => esc_html__('Thumbnail gallery', 'kiamo'),
            'desc'             => esc_html__('The images that will be used in the thumbnail gallery.', 'kiamo'),
            'id'               => "{$prefix}thumbnail_gallery",
            'type'             => 'image_advanced',
            'max_file_uploads' => 50,
         ),

         // THUMBNAIL LINK TYPE
         array(
            'name' => esc_html__('Thumbnail link type', 'kiamo'),
            'id'   => "{$prefix}thumbnail_link_type",
            'type' => 'select',
            'options' => array(
               'link_to_post'    => esc_html__('Link to item', 'kiamo'),
               'link_to_url'     => esc_html__('Link to URL', 'kiamo'),
               'link_to_url_nw'  => esc_html__('Link to URL (New Window)', 'kiamo'),
               'lightbox_thumb'  => esc_html__('Lightbox to the thumbnail image', 'kiamo'),
               'lightbox_image'  => esc_html__('Lightbox to image (select below)', 'kiamo'),
               'lightbox_video'  => esc_html__('Fullscreen Video Overlay (input below)', 'kiamo')
            ),
            'multiple' => false,
            'std'  => 'link-to-post',
            'desc' => esc_html__('Choose what link will be used for the image(s) and title of the item.', 'kiamo')
         ),

         // THUMBNAIL LINK URL
         array(
            'name' => esc_html__('Thumbnail link URL', 'kiamo'),
            'id' => $prefix . 'thumbnail_link_url',
            'desc' => esc_html__('Enter the url for the thumbnail link.', 'kiamo'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),

         // THUMBNAIL LINK LIGHTBOX IMAGE
         array(
            'name'  => esc_html__('Thumbnail link lightbox image', 'kiamo'),
            'desc'  => esc_html__('The image that will be used as the lightbox image.', 'kiamo'),
            'id'    => "{$prefix}thumbnail_link_image",
            'type'  => 'thickbox_image'
         ),
      )
   );

   /* Page Title Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_page_heading',
      'title' => esc_html__('Page Title', 'kiamo'),
      'pages' => array( 'post', 'page', 'product', 'portfolio', 'gallery', 'service'),
      'context' => 'normal',
      'fields' => array(

         // SHOW PAGE TITLE
         array(
            'name' => esc_html__('Show page title', 'kiamo'),   
            'id'   => "{$prefix}page_title",
            'type' => 'checkbox',
            'desc' => esc_html__('Show the page title at the top of the page.', 'kiamo'),
            'std'  => 1,
         ),

         // PAGE TITLE STYLE
         array(
            'name' => esc_html__('Page Title Style', 'kiamo'),
            'id'   => "{$prefix}page_title_style",
            'type' => 'select',
            'options' => array(
               'standard'           => esc_html__('Standard', 'kiamo'),
               'hero'               => esc_html__('Background', 'kiamo'),
            ),
            'multiple' => false,
            'std'  => 'hero',
            'desc' => esc_html__('Choose the heading style.', 'kiamo')
         ),

         // PAGE TITLE LINE 1
         array(
            'name' => esc_html__('Page Title', 'kiamo'),
            'id' => $prefix . 'page_title_one',
            'desc' => esc_html__("Enter a custom page title if you'd like.", 'kiamo'),
            'type'  => 'text',
            'std' => '',
         ),

         // PAGE TITLE BACKGROUND COLOR
            array(
                'name' => esc_html__( 'Hero Overlay Color', 'kiamo' ),
                'id'   => "{$prefix}bg_color_title",
                'desc' => esc_html__( "Set an overlay color for hero heading image.", 'kiamo' ),
                'type' => 'color',
                'std'  => '',
            ),
            
            // Overlay Opacity Value
            array(
                'name'       => esc_html__( 'Overlay Opacity', 'kiamo' ),
                'id'         => "{$prefix}bg_opacity_title",
                'desc'       => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'kiamo' ),
                'clone'      => false,
                'type'       => 'slider',
                'prefix'     => '',
                'js_options' => array(
                    'min'  => 0,
                    'max'  => 100,
                    'step' => 1,
                ),
                'std'   => '50'
            ),

         // HERO HEADING IMAGE UPLOAD
         array(
            'name'  => esc_html__('Hero Heading Background Image', 'kiamo'),
            'desc'  => esc_html__('The image that will be used as the background for the hero header.', 'kiamo'),
            'id'    => "{$prefix}page_title_image",
            'type'  => 'image_advanced',
            'max_file_uploads' => 1
         ),

         // HERO HEADING TEXT STYLE
         array(
            'name' => esc_html__('Hero Heading Text Style', 'kiamo'),
            'id'   => "{$prefix}page_title_text_style",
            'type' => 'select',
            'options' => array(
               'text-light'     => esc_html__('Light', 'kiamo'),
               'text-dark'      => esc_html__('Dark', 'kiamo')
            ),
            'multiple' => false,
            'std'  => 'text-light',
            'desc' => esc_html__('If you uploaded an image in the option above, choose light/dark styling for the text heading text here.', 'kiamo')
         ),

         // HERO HEADING TEXT ALIGN
         array(
            'name' => esc_html__('Hero Heading Text Align', 'kiamo'),
            'id'   => "{$prefix}page_title_text_align",
            'type' => 'select',
            'options' => array(
               'text-left'      => esc_html__('Left', 'kiamo'),
               'text-center'    => esc_html__('Center', 'kiamo'),
               'text-right'     => esc_html__('Right', 'kiamo')
            ),
            'multiple' => false,
            'std'  => 'text-center',
            'desc' => esc_html__('Choose the text alignment for the hero heading.', 'kiamo')
         ),

         // REMOVE BREADCRUMBS
         array(
            'name' => esc_html__('Remove breadcrumbs', 'kiamo'),
            'id'   => "{$prefix}no_breadcrumbs",
            'type' => 'checkbox',
            'desc' => esc_html__('Remove the breadcrumbs from under the page title on this page.', 'kiamo'),
            'std' => 0,
         ),
      )
   );

   /* Testimonials Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_testimonials',
      'title' => esc_html__('Testimonial Meta', 'kiamo'),
      'pages' => array( 'testimonials' ),
      'fields' => array(
        array(
          'name' => esc_html__('Testimonial Job', 'kiamo'),
          'id' => $prefix . 'testimonial_job',
          'desc' => esc_html__("Enter the job for the testimonial.", 'kiamo'),
          'type'  => 'text',
          'std' => ''
        ),
        array(
          'name' => esc_html__('Video Preview', 'kiamo'),
          'id' => $prefix . 'testimonial_video',
          'desc' => esc_html__("Put link video preview, use youtube or vimeo video.", 'kiamo'),
          'type'  => 'text',
          'std' => ''
        ),
        array(
          'name' => esc_html__('Image Preview', 'kiamo'),
          'id' => $prefix . 'testimonial_image',
          'type'             => 'image_advanced',
          'max_file_uploads' => 1,
        ),
      )
   );

   /* Page Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_page',
      'title' => esc_html__('Page Meta', 'kiamo'),
      'pages' => array( 'page', 'portfolio', 'product', 'post', 'service' ),
      'fields' => array(
         // Extra Page Class
         array(
            'name' => esc_html__('Header', 'kiamo'),
            'id' => $prefix . 'page_header',
            'desc' => esc_html__("You can change header for page if you like's.", 'kiamo'),
            'type'  => 'select',
            'options'   => kiamo_get_headers(),
            'std' => 'default-option-theme',
         ),
         array(
            'name'      => esc_html__('Footer', 'kiamo'),
            'id'        => $prefix . 'page_footer',
            'desc'      => esc_html__("You can change footer for page if you like's",'kiamo'),
            'type'      => 'select',
            'options'   =>  kiamo_get_footer(),
            'std'       => 'default-option-theme'
         ),
         // Extra Page Class
         array(
            'name' => esc_html__('Extra page class', 'kiamo'),
            'id' => $prefix . 'extra_page_class',
            'desc' => esc_html__("If you wish to add extra classes to the body class of the page (for custom css use), then please add the class(es) here.", 'kiamo'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),
         // Full width
         array(
            'name' => esc_html__('Full Width', 'kiamo'),
            'id'   => "{$prefix}page_full_width",
            'type' => 'checkbox',
            'desc' => esc_html__('Remove class container wrapper for page.', 'kiamo'),
            'std' => 0,
         ),
      )
   );

   /* Brands Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_brands_options',
      'title' => esc_html__('Brands Options', 'kiamo'),
      'pages' => array( 'brands'),
      'priority' => 'low',
      'fields' => array(
         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Url Link', 'kiamo'),
             'id'    => "{$prefix}url_link",
             'type' => 'text',
             'std'   => ''
         ),
      )
   );

   /* Sidebar Meta Box Page
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_sidebar_page',
      'title' => esc_html__('Sidebar Options', 'kiamo'),
      'pages' => array( 'post', 'page', 'product', 'portfolio', 'gallery', 'service' ),
      'priority' => 'low',
      'fields' => array(

         // SIDEBAR CONFIG
         array(
            'name' => esc_html__('Sidebar configuration', 'kiamo'),
            'id'   => "{$prefix}sidebar_config",
            'type' => 'select',
            'options' => array(
               ''                   => esc_html__('--Default--', 'kiamo'),
               'no-sidebars'        => esc_html__('No Sidebars', 'kiamo'),
               'left-sidebar'       => esc_html__('Left Sidebar', 'kiamo'),
               'right-sidebar'      => esc_html__('Right Sidebar', 'kiamo'),
               'both-sidebars'      => esc_html__('Both Sidebars', 'kiamo')
            ),
            'multiple' => false,
            'std'  => '',
            'desc' => esc_html__('Choose the sidebar configuration for the detail page of this page.', 'kiamo'),
         ),

         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Left Sidebar', 'kiamo'),
             'id'    => "{$prefix}left_sidebar",
             'type' => 'select',
             'options'  => $sidebar,
             'std'   => ''
         ),

         // RIGHT SIDEBAR
         array (
            'name'   => esc_html__('Right Sidebar', 'kiamo'),
            'id'    => "{$prefix}right_sidebar",
            'type' => 'select',
            'options'  => $sidebar,
            'std'   => ''
         ),
      )
   );

  /* Gallery Meta Box 
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'metaboxes_gallery_page',
      'title' => esc_html__('Gallery Settings', 'kiamo'),
      'pages' => array( 'gallery', 'portfolio', 'service' ),
      'priority' => 'low',
      'fields' => array(
        array (
          'name'   => esc_html__('Gallery Images', 'kiamo'),
          'id'    => "{$prefix}gallery_images",
          'type'             => 'image_advanced',
          'max_file_uploads' => 50,
        ),
      )
   );

    /* Event Meta Box 
   ================================================== */
   $meta_boxes[] = array(
      'id'            => 'metaboxes_event_page',
      'title'         => esc_html__('Event Settings', 'kiamo'),
      'pages'         => array( 'gva_event' ),
      'priority'      => 'low',
      'fields'        => array(
        array (
          'name'    => esc_html__('Start Time', 'kiamo'),
          'id'      => "{$prefix}start_time",
          'type'    => 'datetime'
        ),
        array (
          'name'    => esc_html__('Finished Time', 'kiamo'),
          'id'      => "{$prefix}finish_time",
          'type'    => 'datetime'
        ),
        array (
          'name'    => esc_html__('Address', 'kiamo'),
          'id'      => "{$prefix}address",
          'type'    => 'text'
        ),
        array (
          'name'    => esc_html__('Google Map', 'kiamo'),
          'id'      => "{$prefix}map",
          'type'    => 'map',
          'address_field' => "{$prefix}address",
        ),
        
      ),
   );

  $meta_boxes[] = array(
    'id'    => 'metaboxes_team_page',
    'title' => esc_html__('Team Settings', 'kiamo'),
    'pages' => array( 'gva_team' ),
    'priority' => 'low',
    'fields' => array(
      array (
        'name'   => esc_html__('Position', 'kiamo'),
        'id'    => "{$prefix}team_position",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Quote', 'kiamo'),
        'id'    => "{$prefix}team_quote",
        'type' => 'textarea',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Email', 'kiamo'),
        'id'    => "{$prefix}team_email",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Phone', 'kiamo'),
        'id'    => "{$prefix}team_phone",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Address', 'kiamo'),
        'id'    => "{$prefix}team_address",
        'type' => 'text',
        'std'   => ''
      ),
    )
  );

   return $meta_boxes;
 }  
  /********************* META BOX REGISTERING ***********************/
  add_filter( 'rwmb_meta_boxes', 'kiamo_register_meta_boxes' , 99 );
