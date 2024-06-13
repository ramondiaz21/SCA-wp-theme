<?php 
class kiamo_Visualcomposer_Theme implements Vc_Vendor_Interface {
	public function load(){ 
    global $wpdb;
    $testimonial_cats = array();
    $query = "SELECT a.name,a.slug,a.term_id FROM $wpdb->terms a JOIN  $wpdb->term_taxonomy b ON (a.term_id= b.term_id ) where b.count>0 and b.taxonomy = 'testimonial_cat' and b.parent = 0";
    $categories = $wpdb->get_results($query);
    foreach ($categories as $category) {
       $testimonial_cats[$category->name] = $category->term_id;
    }

    //=== Testimonial ===
    $gva_testimonial_carousel = array(
       'name'      => esc_html__( 'GVA Testimonial Carousel', 'kiamo' ),
       'base'      => 'gva_testimonial',
       'class'  => '',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Title', 'kiamo' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => esc_html__('Title of element', 'kiamo')
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Categories', 'kiamo' ),
             'param_name'  => 'categories',
             'value'       => $testimonial_cats,
             'description'    => '',
          ),
          array(
            'type'         => 'dropdown',
            'heading'     => esc_html__( 'Show Avatar', 'kiamo' ),
            'param_name'  => 'show_avatar',
            'value'       => array(
              esc_html__('Show', 'kiamo') => 'show',
              esc_html__('Hide', 'kiamo') => 'hide'
            )
          ),
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Limit', 'kiamo' ),
             'param_name'  => 'per_page',
             'value'       => '4',
             'description'    => esc_html__('Number of Posts', 'kiamo')
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Style display', 'kiamo' ),
             'param_name'  => 'style_display',
             'value'       => array(
                esc_html__('Default', 'kiamo')   => 'default',
                esc_html__('Style #2', 'kiamo') => 'style-v2',
                esc_html__('Style #3', 'kiamo') => 'style-v3',
              ),
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Text Color Style', 'kiamo' ),
             'param_name'  => 'text_color_style',
             'value'       => array(
                      esc_html__('Default', 'kiamo')  => 'text-default',
                      esc_html__('Light', 'kiamo')=> 'text-light',
             ),
          ),
          array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kiamo'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       )
    );
   
    foreach (kiamo_responsive_settings() as $key => $setting) {
       $gva_testimonial_carousel['params'][] = $setting;
    }
    foreach (kiamo_carousel_settings() as $key => $setting) {
       $gva_testimonial_carousel['params'][] = $setting;
    }
    vc_map($gva_testimonial_carousel);

    //=== Testimonial ===
    $gva_testimonial_grid = array(
       'name'      => esc_html__( 'GVA Testimonial Grid', 'kiamo' ),
       'base'      => 'gva_testimonial_grid',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
            'type'         => 'textfield',
            'heading'     => esc_html__( 'Title', 'kiamo' ),
            'param_name'  => 'title',
            'admin_label'    => true,
            'value'       => '',
            'description'    => esc_html__('Title of element', 'kiamo')
          ),
          array(
            'type'         => 'textfield',
            'heading'     => esc_html__( 'Limit', 'kiamo' ),
            'param_name'  => 'per_page',
            'value'       => '4',
            'description'    => esc_html__('Number of Posts', 'kiamo')
          ),
          array(
            'type'         => 'dropdown',
            'heading'     => esc_html__( 'Text Color Style', 'kiamo' ),
            'param_name'  => 'text_color_style',
            'value'       => array(
                esc_html__('Default', 'kiamo')  => 'text-default',
                esc_html__('Light', 'kiamo')=> 'text-light',
             ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','kiamo'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       )
    );
   
    foreach (kiamo_responsive_settings() as $key => $setting) {
      $gva_testimonial_grid['params'][] = $setting;
    }
      
    vc_map($gva_testimonial_grid);

    vc_map( array(
       'name'      => esc_html__( 'GVA Brands', 'kiamo' ),
       'base'      => 'gva_brands',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Title', 'kiamo' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => esc_html__('Title of element', 'kiamo')
          ),
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Limit', 'kiamo' ),
             'param_name'  => 'per_page',
             'admin_label'    => false,
             'value'       => '6',
             'description'    => esc_html__('Number of Brands', 'kiamo')
          ),
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Columns', 'kiamo' ),
             'param_name'  => 'columns',
             'admin_label'    => false,
             'value'       => '6',
             'description'    => esc_html__('columns of Brands', 'kiamo')
          ),
          array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kiamo'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       )
    ));

    //Team Carousel
    $el_team_carousel = array(
      'name'         => esc_html__('Team Carousel','kiamo'),
      'base'         => 'gva_team_carousel',
      'description'  => 'Show Team Carousel',
      'icon'        => 'icon-wpb-vc_icon',
      'category' => esc_html__('Gavias Element', 'kiamo'),
      'params' => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Title Administrator', 'kiamo'),
          'param_name' => 'title',
          'value' => '',
          'admin_label' => true
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Number', 'kiamo' ),
          'param_name' => 'per_page',
          'value' => '6'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Team IDs', 'kiamo' ),
          'param_name'  => 'team_ids',
          'description'    => esc_html__('You can add ids. E.g 1,2,3,4', 'kiamo'),
          'value'       => ''
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Show Skills', 'kiamo' ),
          'param_name' => 'show_skills',
          'value' => true
        ),
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__( 'Number of words in excerpt', 'kiamo' ),
          'param_name'         => 'excerpt_words',
          'value'        => '12'
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name', 'kiamo'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kiamo')
        )
      )
    );
    foreach (kiamo_responsive_settings() as $key => $setting) {
      $el_team_carousel['params'][] = $setting;
    }
    foreach (kiamo_carousel_settings() as $key => $setting) {
      $el_team_carousel['params'][] = $setting;
    }
    vc_map($el_team_carousel);

    //Team Grid
    $el_team_grid = array(
      'name'         => esc_html__('Team Grid','kiamo'),
      'base'         => 'gva_team_grid',
      'description'  => 'Show Team Grid',
      'category' => esc_html__('Gavias Element', 'kiamo'),
      'icon'        => 'icon-wpb-vc_icon',
      'params' => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Title Administrator', 'kiamo'),
          'param_name' => 'title',
          'value' => '',
          'admin_label' => true
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Number', 'kiamo' ),
          'param_name' => 'per_page',
          'value' => '6'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Team IDs', 'kiamo' ),
          'param_name'  => 'team_ids',
          'description'    => esc_html__('You can add ids. E.g 1,2,3,4', 'kiamo'),
          'value'       => ''
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Show Skills', 'kiamo' ),
          'param_name' => 'show_skills',
          'value' => true
        ),
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__( 'Number of words in excerpt', 'kiamo' ),
          'param_name'         => 'excerpt_words',
          'value'        => '12'
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Show pagination', 'kiamo' ),
          'param_name' => 'show_pagination',
          'value' => true
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name', 'kiamo'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kiamo')
        )
      )
    );
    foreach (kiamo_responsive_settings() as $key => $setting) {
      $el_team_grid['params'][] = $setting;
    }
    vc_map($el_team_grid);

    vc_map( array(
      'name'    => esc_html__( 'GVA Team', 'kiamo' ),
      'base'    => 'gva_team',
      'category'=> 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'  => array(
      array(
        'type'       => 'textfield',
        'heading'    => esc_html__( 'Team name', 'kiamo' ),
        'param_name' => 'name',
        'admin_label'=> true,
        'value'      => ''
      ),
      array(
        'type'       => 'textfield',
        'heading'    => esc_html__( 'Team job', 'kiamo' ),
        'param_name' => 'job',
        'value'      => ''
      ),
      array(
        'type'       => 'attach_image',
        'heading'    => esc_html__( 'Team Photo', 'kiamo' ),
        'param_name' => 'photo',
        'value'      => ''
      ),
      array(
        'type'      => 'textarea',
        'heading'   => esc_html__( 'Content', 'kiamo' ),
        'param_name'=> 'content',
        'value'     => ''
      ),
      array(
        'type'         => 'textfield',
        'heading'      => esc_html__("Link", 'kiamo'),
        'param_name'   => "link",
        'value'        => '',
      ),
      array(
        'type'         => 'textfield',
        'heading'      => esc_html__("Google Plus", 'kiamo'),
        'param_name'   => "google",
        'value'        => '',
      ),
      array(
        'type'         => 'textfield',
        'heading'      => esc_html__("Facebook", 'kiamo'),
        'param_name'   => "facebook",
        'value'        => '',
        ),

      array(
        'type'          => 'textfield',
        'heading'       => esc_html__("Twitter", 'kiamo'),
        'param_name'    => "twitter",
        'value'         => '',
        ),

      array(
        'type'          => 'textfield',
        'heading'       => esc_html__("Pinterest", 'kiamo'),
        'param_name'    => "pinterest",
        'value'         => '',
        ),

      array(
        'type'          => 'textfield',
        'heading'       => esc_html__("Linked In", 'kiamo'),
        'param_name'    => "linkedin",
        'value'         => '',
        ),
      array(
        'type'         => 'dropdown',
        'heading'      => esc_html__('Style', 'kiamo' ),
        'param_name'   => 'style',
        'value'        => array(
          esc_html__('Vertical','kiamo') => 'vertical',
          esc_html__('Vertical avatar small','kiamo')   => 'vertical-small',
          esc_html__('Horizontal','kiamo')  => 'horizontal',
          esc_html__('Circle','kiamo')      => 'circle',
        )
      ),
      array(
       'type'       => 'textfield',
       'heading'    => esc_html__('Extra class name','kiamo'),
       'param_name' => 'el_class',
       'description'=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
       ),
      )
    ));

    //== Gallery ===========================
    $kiamo_gallery_cat = array();
    if(function_exists('gaviasthemer_get_select_term')){
      $kiamo_gallery_cat = gaviasthemer_get_select_term('gallery_cat');
    }
    $gva_gallery_grid = array(
      'name'        => esc_html__('GVA Gallery Grid','kiamo'),
      'base'        => 'gva_gallery_grid',
      'description' => 'Display Gallery Grid',
      'category'    => esc_html__('Gavias Educator', 'kiamo'),
      'icon'        => 'icon-wpb-vc_icon',
      'params'     => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Title', 'kiamo'),
          'param_name' => 'title',
          'value' => '',
          'admin_label' => true
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Number', 'kiamo' ),
          'param_name' => 'number',
          'value' => ''
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Mode', 'kiamo' ),
            'param_name' => 'mode',
            'value' => array(
               esc_html__('Lastest Gallery', 'kiamo') => 'most_recent',
               esc_html__('Randown Gallery', 'kiamo') => 'random'
            )
        ),
        array(
           'type'            => 'dropdown',
           'heading'         => esc_html__( 'Gallery Categories', 'kiamo' ),
           'param_name'      => 'gallery_cats',
           'admin_label'     => true,
           'value'           =>  $kiamo_gallery_cat,
           'description'     => '',
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name', 'kiamo'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kiamo')
        )
      )
    );
    foreach (kiamo_responsive_settings() as $key => $setting) {
      $gva_gallery_grid['params'][] = $setting;
    }
    vc_map($gva_gallery_grid);

    // == Gallery Carousel == 
    $gva_gallery_carousel = array(
      'name'        => esc_html__('GVA Gallery Carousel','kiamo'),
      'base'        => 'gva_gallery_carousel',
      'description' => 'Display Gallery Carousel',
      'category'    => esc_html__('Gavias Educator', 'kiamo'),
      'icon'        => 'icon-wpb-vc_icon',
      'params'     => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Title', 'kiamo'),
          'param_name' => 'title',
          'value' => '',
          'admin_label' => true
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Number', 'kiamo' ),
          'param_name' => 'number',
          'value' => ''
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Mode', 'kiamo' ),
            'param_name' => 'mode',
            'value' => array(
               esc_html__('Lastest Gallery', 'kiamo') => 'most_recent',
               esc_html__('Randown Gallery', 'kiamo') => 'random'
            )
        ),
        array(
           'type'            => 'dropdown',
           'heading'         => esc_html__( 'Gallery Categories', 'kiamo' ),
           'param_name'      => 'gallery_cats',
           'admin_label'     => true,
           'value'           =>  $kiamo_gallery_cat,
           'description'     => '',
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name', 'kiamo'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kiamo')
        )
      )
    );
    foreach (kiamo_carousel_settings() as $key => $setting) {
      $gva_gallery_carousel['params'][] = $setting;
    }
    vc_map($gva_gallery_carousel);

    //== GVA Contact Info ==
    vc_map( array(
      'name'      => esc_html__( 'GVA Contact info', 'kiamo' ),
      'base'      => 'gva_contact_info',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'         => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label'    => true,
          'value'       => ''
        ),
        array(
           'type'         => 'textarea',
           'heading'     => esc_html__( 'Description', 'kiamo' ),
           'param_name'  => 'description',
           'value'       => ''
        ),
        array(
           'type'         => 'attach_image',
           'heading'     => esc_html__( 'Contact Photo', 'kiamo' ),
           'param_name'  => 'photo',
           'value'       => ''
        ),
        array(
           'type' => 'textfield',
           'heading' => esc_html__('Address', 'kiamo'),
           'param_name' => 'address',
           'value' => '',
        ),
        array(
           'type' => 'textfield',
           'heading' => esc_html__('Phone', 'kiamo'),
           'param_name' => 'phone',
           'value' => '',
        ),

        array(
           'type' => 'textfield',
           'heading' => esc_html__('Email', 'kiamo'),
           'param_name' => 'email',
           'value' => '',
        ),

        array(
           'type' => 'textfield',
           'heading' => esc_html__('Website', 'kiamo'),
           'param_name' => 'website',
           'value' => '',
        ),

        array(
           'type' => 'textfield',
           'heading' => esc_html__('Extra class name','kiamo'),
           'param_name' => 'el_class',
           'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));

    vc_map( array(
      'name'      => esc_html__( 'GVA Icon Box', 'kiamo' ),
      'base'      => 'gva_icon_box',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'           => 'textfield',
          'heading'        => esc_html__( 'Title', 'kiamo' ),
          'param_name'     => 'title',
          'admin_label'    => true,
          'value'          => '',
          'description'    => esc_html__('Title of element', 'kiamo')
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__( 'Icon', 'kiamo' ),
          'param_name'   => 'icon',
          'admin_label'  => false,
          'value'        => '',
        ),
        array(
          'param_name'   => 'image',
          'type'         => 'attach_image',
          'heading'      => esc_html__('Image Icon', 'kiamo' ),
        ),
        array(
          'type'         => 'textarea',
          'heading'      => esc_html__( 'Description', 'kiamo' ),
          'param_name'   => 'description',
          'admin_label'  => false,
          'value'        => '',
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Icon Position', 'kiamo' ),
          'param_name'   => 'icon_position',
          'value'        => array(
            esc_html__('Top Center','kiamo') => 'top-center',
            esc_html__('Top Left','kiamo')   => 'top-left',
            esc_html__('Top Right','kiamo')  => 'top-right',
            esc_html__('Right','kiamo')      => 'right',
            esc_html__('Left','kiamo')       => 'left',
            esc_html__('Top Left Title','kiamo')   => 'top-left-title',
            esc_html__('Top Right Title','kiamo')  => 'top-right-title'
          )
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Background Box', 'kiamo' ),
          'param_name'    => 'background_box',
          'value'         => '',
          'description'   => 'Background for box, e.g: #f5f5f5'
        ),
        array(
          'type'         => 'textfield',
          'heading'     => esc_html__( 'Link', 'kiamo' ),
          'param_name'  => 'link',
          'admin_label'    => false,
          'value'       => '',
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Background icon', 'kiamo' ),
          'param_name'   => 'icon_background',
          'value'        => array(
            esc_html__('--None--','kiamo') => '',
            esc_html__('Background of theme','kiamo')=> 'bg-theme',
            esc_html__('Background White','kiamo')=> 'bg-white',
            esc_html__('Background Black','kiamo')=> 'bg-black',
            esc_html__('Background Dark','kiamo')=> 'bg-dark'
          )
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Icon Color', 'kiamo' ),
          'param_name'   => 'icon_color',
          'value'        => array(
            esc_html__('Text theme','kiamo') => 'text-theme',
            esc_html__('Text white','kiamo')=> 'text-white',
            esc_html__('Text black','kiamo')=> 'text-black'
          )
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Icon Width', 'kiamo' ),
          'param_name'   => 'icon_width',
          'value'        => array(
            esc_html__('Fa 1x small','kiamo') => 'fa-1x',
            esc_html__('Fa 2x','kiamo')=> 'fa-2x',
            esc_html__('Fa 3x','kiamo')=> 'fa-3x',
            esc_html__('Fa 4x','kiamo')=> 'fa-4x'
          )
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Icon Border', 'kiamo' ),
          'param_name'   => 'icon_border',
          'value'        => array(
            esc_html__('-- None --','kiamo') => '',
            esc_html__('Border 1px','kiamo') => 'border-1',
            esc_html__('Border 2px','kiamo') => 'border-2',
            esc_html__('Border 3px','kiamo') => 'border-3',
            esc_html__('Border 4px','kiamo') => 'border-4',
            esc_html__('Border 5px','kiamo') => 'border-5'
          )
        ),
         array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Icon Radius', 'kiamo' ),
          'param_name'   => 'icon_radius',
          'value'        => array(
            esc_html__('-- None --','kiamo') => '',
            esc_html__('Radius 1x','kiamo') => 'radius-1x',
            esc_html__('Radius 2x','kiamo') => 'radius-2x',
            esc_html__('Radius 5x','kiamo') => 'radius-5x',
          )
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Skin Text for box', 'kiamo' ),
          'param_name'   => 'skin_text',
          'value'        => array(
            esc_html__('Text Dark','kiamo') => 'text-dark',
            esc_html__('Text Light','kiamo') => 'text-light' 
           )
        ),
        array(
          'param_name'   => 'target',
          'type'         => 'checkbox',
          'heading'      => esc_html__('Open in new window', 'kiamo' )
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name','kiamo'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        )
       )
    ));

    vc_map( array(
     'name'      => esc_html__( 'GVA Hover Box', 'kiamo' ),
     'base'      => 'gva_hover_box',
     'category'  => 'Gavias Element',
     'icon'        => 'icon-wpb-vc_icon',
     'params'    => array(
        array(
           'type'           => 'textfield',
           'heading'        => esc_html__( 'Title', 'kiamo' ),
           'param_name'     => 'title',
           'admin_label'    => true,
           'value'          => '',
           'description'    => esc_html__('Title of element', 'kiamo')
        ),
       
        array(
              'param_name'   => 'image',
              'type'         => 'attach_image',
              'heading'      => esc_html__('Image', 'kiamo' ),
           ),
        array(
           'type'         => 'textarea',
           'heading'      => esc_html__( 'Content', 'kiamo' ),
           'param_name'   => 'content',
        ),
        array(
           'type'         => 'textarea',
           'heading'      => esc_html__( 'Content Backend', 'kiamo' ),
           'param_name'   => 'content_backend',
        ),
        array(
          'type'         => 'textfield',
          'heading'      =>  esc_html__( 'Link', 'kiamo' ),
          'param_name'   =>  'link',
        ),
        array(
          'type'         => 'textfield',
          'heading'      =>  esc_html__( 'Text Link', 'kiamo' ),
          'param_name'   =>  'text_link',
          'std'          =>  'Read more'
        ),
        array(
          'type'         => 'textfield',
          'heading'     => esc_html__( 'Min-height of Box', 'kiamo' ),
          'param_name'  => 'height',
          'std'         => '220px',
          'desciption'  => 'e.g: 220px'
        ),
        array(
           'param_name'   => 'target',
           'type'         => 'checkbox',
           'heading'      => esc_html__('Open in new window', 'kiamo' )
        ),
        array(
           'type' => 'textfield',
           'heading' => esc_html__('Extra class name','kiamo'),
           'param_name' => 'el_class',
           'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        )
      )
    ));

    //=== Block Heading ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Block Heading', 'kiamo' ),
       'base'      => 'gva_block_heading',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Title', 'kiamo' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => esc_html__('Title of element', 'kiamo')
          ),
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Sub Title', 'kiamo' ),
             'param_name'  => 'subtitle',
          ),
          array(
             'type'         => 'textarea',
             'heading'     => esc_html__( 'Description', 'kiamo' ),
             'param_name'  => 'desc',
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Style', 'kiamo' ),
             'param_name'  => 'style',
             'value'     => array(
                esc_html__( 'Style Default', 'kiamo' ) =>  'style-default',
                esc_html__( 'Style #2', 'kiamo' )      =>  'style-default v2',
                esc_html__( 'Style #3', 'kiamo' )      =>  'style-3',
                esc_html__( 'Style #4', 'kiamo' )      =>  'style-4',
             ),
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Align', 'kiamo' ),
             'param_name'  => 'align',
             'value'     => array(
                esc_html__( 'Center', 'kiamo' )     =>  'align-center',
                esc_html__( 'Left', 'kiamo' )       =>  'align-left',
                esc_html__( 'Right', 'kiamo' )      =>  'align-right',
             ),
          ),
           array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Skin Text for box', 'kiamo' ),
             'param_name'  => 'style_text',
             'value'     => array(
                esc_html__( 'Text dark', 'kiamo' )    =>  'text-dark',
                esc_html__( 'Text light', 'kiamo' )   =>  'text-light'
             )
          ),
          array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kiamo'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       )
    ));

    //=== GVA_Social_Links ===
    vc_map(array(
       'name'      => esc_html__( 'GVA Social Links', 'kiamo' ),
       'base'      => 'gva_social_links',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'      => esc_html__( 'Title', 'kiamo' ),
             'param_name'   => 'title',
             'value'        => '',
             'description'  => esc_html__('This element display link socials media for theme setting', 'kiamo'),
          ),
          array(
             'type'         => 'textarea',
             'heading'      => esc_html__( 'Content', 'kiamo' ),
             'param_name'   => 'desc',
             'value'        => '',
          ),
          array(
             'type'         => 'dropdown',
             'heading'      => esc_html__( 'Style display', 'kiamo' ),
             'param_name'   => 'style',
             'value'     => array(
                   esc_html__( 'Default - Align right', 'kiamo' )    =>  'default',
                   esc_html__( 'Version 2 - Color White, Align center', 'kiamo' )  => 'style-v2',
                   esc_html__( 'Version 3 - Align center', 'kiamo' )  => 'style-v3',
                   esc_html__( 'Version 4 - Align right', 'kiamo' )  => 'style-v4',
             ),
          ),
          array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kiamo'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       ),   
    ));

    //=== GVA Blogs Carousel ===
    $gva_blogs_carousel = array(
      'name'      => esc_html__( 'GVA Blogs Carousel', 'kiamo' ),
      'base'      => 'gva_blogs_carousel',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'         => 'textfield',
          'heading'     => esc_html__( 'Block title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label'    => true,
          'value'       => '',
          'description'    => '',
        ),
        array(
          'type' => 'loop',
          'heading' =>esc_html__( 'Grids content', 'kiamo' ),
          'param_name' => 'loop',
          'settings' => array(
            'size' => array( 'hidden' => false, 'value' => 4 ),
            'order_by' => array( 'value' => 'date' ),
          ),
          'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kiamo' )
        ),
        array(
          'type'         => 'checkbox',
          'heading'     => esc_html__( 'Show post excerpt', 'kiamo' ),
          'param_name'  => 'show_excerpt',
        ),
        array(
          'type'         => 'textfield',
          'heading'     => esc_html__( 'Number of words in excerpt', 'kiamo' ),
          'param_name'  => 'excerpt_words',
          'admin_label'    => false,
          'value'       => '16',
          'description'    => '',
        ),
        array(
          'type'         => 'dropdown',
          'heading'     => esc_html__( 'Post style', 'kiamo' ),
          'param_name'  => 'post_style',
          'value'       => array(
            esc_html__('Style #1', 'kiamo')  => 'style-1',
            esc_html__('Style #2', 'kiamo')  => 'style-2',
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name','kiamo'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        )
      )
    );
    foreach (kiamo_responsive_settings() as $key => $setting) {
      $gva_blogs_carousel['params'][] = $setting;
    }
    foreach (kiamo_carousel_settings() as $key => $setting) {
      $gva_blogs_carousel['params'][] = $setting;
    }
    vc_map($gva_blogs_carousel);

    //=== GVA Blogs Masonry ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Blogs Masonry', 'kiamo' ),
       'base'      => 'gva_blogs_masonry',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kiamo' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kiamo' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kiamo' )
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Columns', 'kiamo' ),
             'param_name'  => 'columns',
             'admin_label'    => true,
             'value'       => array(1, 2, 3, 4, 5, 6),
             'description'    => esc_html__( 'Number of Columns', 'kiamo' ),
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Show Pagination', 'kiamo' ),
             'param_name'  => 'pagination',
             'admin_label'    => true,
             'value'       => array(
                   esc_html__('Off', 'kiamo')  => 'off',
                   esc_html__('On', 'kiamo')        => 'on',
                ),
             'description'    => esc_html__( 'Show pagination on bottom element', 'kiamo' ),
          ),
           array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kiamo'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       )
    ));

    //==== GVA Blogs Grid ===
    $gva_blogs_grid = array(
       'name'      => esc_html__( 'GVA Blogs Grid', 'kiamo' ),
       'base'      => 'gva_blogs_grid',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kiamo' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kiamo' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kiamo' )
          ),
          array(
             'type'         => 'checkbox',
             'heading'     => esc_html__( 'Show Pagination', 'kiamo' ),
             'param_name'  => 'pagination',
             'description'    => esc_html__( 'Show pagination on bottom element', 'kiamo' ),
          ),
          array(
            'type'         => 'dropdown',
            'heading'      => esc_html__( 'Style of Post', 'kiamo' ),
            'param_name'   => 'style',
            'value'        => array(
              esc_html__('Default', 'kiamo')  => 'posts-default'
            )
          ),
          
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Image size','kiamo'),
            'param_name' => 'thumbnail_size',
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Default = post-thumbnail','kiamo')
          ),
           array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','kiamo'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       )
    );
    
    foreach (kiamo_responsive_settings() as $key => $setting) {
      $gva_blogs_grid['params'][] = $setting;
    }
    vc_map($gva_blogs_grid);
      
    //=== GVA Blogs Grid ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Blogs Stick List', 'kiamo' ),
       'base'      => 'gva_blogs_stick_list',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kiamo' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kiamo' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kiamo' )
          ),
           array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kiamo'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       )
    ));

    //=== GVA Blogs List ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Blogs List', 'kiamo' ),
       'base'      => 'gva_blogs_list',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kiamo' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kiamo' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'kiamo' )
          ),
          
          array(
             'type'         => 'checkbox',
             'heading'     => esc_html__( 'Show Pagination', 'kiamo' ),
             'param_name'  => 'pagination',
             'value'    => false,
             'description'    => esc_html__( 'Show pagination on bottom element', 'kiamo' ),
          ),
          array(
             'type'         => 'checkbox',
             'heading'     => esc_html__( 'Show Excerpt', 'kiamo' ),
             'param_name'  => 'excerpt',
             'value'    => true,
          ),
           array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kiamo'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       )
    ));

    //=== Blogs Small List ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Blogs Small List', 'kiamo' ),
       'base'      => 'gva_blogs_small_list',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kiamo' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kiamo' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kiamo' )
          ),
          array(
             'type'         => 'checkbox',
             'heading'     => esc_html__( 'Show Excerpt', 'kiamo' ),
             'param_name'  => 'excerpt',
             'value'    => true,
          ),
           array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kiamo'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
          ),
       )
    ));

    //=== Counter ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Counter', 'kiamo' ),
      'base'      => 'gva_counter',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Class of Icon', 'kiamo' ),
          'param_name'  => 'icon',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Number', 'kiamo' ),
          'param_name'  => 'number',
          'value'       => '1200'
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__( 'Icon Position', 'kiamo' ),
          'param_name'   => 'icon_position',
          'value'        => array(
            esc_html__('Icon left', 'kiamo')  => 'icon-left',
            esc_html__('Icon top', 'kiamo')   => 'icon-top'
          )
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__( 'Text color', 'kiamo' ),
          'param_name'   => 'text_color',
          'value'        => array(
            esc_html__('Text dark', 'kiamo')    => 'text-dark',
            esc_html__('Text light', 'kiamo')   => 'text-light'
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));

    //=== Image Content ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Image width Content', 'kiamo' ),
      'base'      => 'gva_image_content',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'attach_image',
          'heading'     => esc_html__( 'Background', 'kiamo' ),
          'param_name'  => 'background',
          'value'       => ''
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Content', 'kiamo' ),
          'param_name'  => 'content',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kiamo' ),
          'param_name'  => 'link'
        ),
        array(
          'type'         => 'checkbox',
          'heading'      => esc_html__( 'Open in new window', 'kiamo' ),
          'param_name'   => 'target',
          'value'        => true,
          'description'   => 'Adds a target="_blank" attribute to the link'
        ),

        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));

    //=== Pricing ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Pricing', 'kiamo' ),
      'base'      => 'gva_pricing',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Price', 'kiamo' ),
          'param_name'  => 'price',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Currency', 'kiamo' ),
          'param_name'  => 'currency',
          'value'       => '$'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Period', 'kiamo' ),
          'param_name'  => 'period',
          'value'       => 'month'
        ),
        array(
          'type'        => 'textarea_html',
          'heading'     => esc_html__( 'Content', 'kiamo' ),
          'param_name'  => 'content',
          'value'       => '<ul><li>Clean Design</li><li>Visual Page Builder</li><li>50+ Shortcode Modules</li><li class="disable">Stunning Portfolio Styles</li><li class="disable">Free Iconmind</li></ul>'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kiamo' ),
          'param_name'  => 'link',
          'value'       => '#'
        ),
         array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link Title', 'kiamo' ),
          'param_name'  => 'link_title',
          'value'       => 'Read more'
        ),
        array(
          'type'         => 'checkbox',
          'heading'      => esc_html__( 'Featured', 'kiamo' ),
          'param_name'   => 'featured',
          'value'        => false
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));

    //=== Box Card ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Box Card', 'kiamo' ),
      'base'      => 'gva_box_card',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Content', 'kiamo' ),
          'param_name'  => 'content'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Icon Class', 'kiamo' ),
          'param_name'  => 'icon'
        ),
        array(
          'type'        => 'dropdown',
          'heading'     => esc_html__( 'Icon Position', 'kiamo' ),
          'param_name'  => 'icon_position',
          'value'       => array(
              esc_html__('Icon Left', 'kiamo')   => 'left',
              esc_html__('Icon Right', 'kiamo')   => 'right'
          )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kiamo' ),
          'param_name'  => 'link',
          'value'       => '#'
        ),
         array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Min Height', 'kiamo' ),
          'param_name'  => 'height'
        ),
        
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));

    //=== Call to Action ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Call To Action', 'kiamo' ),
      'base'      => 'gva_call_to_action',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Content', 'kiamo' ),
          'param_name'  => 'content'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kiamo' ),
          'param_name'  => 'link'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Text of Button', 'kiamo' ),
          'param_name'  => 'text_link'
        ),
        array(
          'type'        => 'dropdown',
          'heading'     => esc_html__( 'Button Align', 'kiamo' ),
          'param_name'  => 'button_align',
          'value'       => array(
            esc_html__('Button Left', 'kiamo')          => 'button-left',
            esc_html__('Button Right', 'kiamo')         => 'button-right',
            esc_html__('Button Bottom Left', 'kiamo')   => 'button-bottom',
            esc_html__('Button Bottom Center', 'kiamo') => 'button-center'
          )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Box Background', 'kiamo' ),
          'param_name'  => 'box_background'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Set Max width for content', 'kiamo' ),
          'param_name'  => 'width',
          'description' => esc_html__('e.g 660px', 'kiamo')
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'style_text',
          'heading'     => esc_html__('Skin Text for box', 'kiamo' ),
          'value'   => array(
              esc_html__('Text light', 'kiamo')  => 'text-light',
              esc_html__('Text dark', 'kiamo')   => 'text-dark'
          ),
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'style_button',
          'heading'     => esc_html__('Style Button', 'kiamo' ),
          'value'   => array(
              esc_html__('Button default of theme', 'kiamo')  => 'btn-theme',
              esc_html__('Button white', 'kiamo')             => 'btn-white'
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link Video', 'kiamo' ),
          'param_name'  => 'video',
          'description' => esc_html__('e.g: https://www.youtube.com/watch?v=4g7zRxRN1Xk', 'kiamo')
        ),
        array(
          'type'           => 'checkbox',
          'param_name'     => 'target',
          'heading'        => esc_html__('Open in new window', 'kiamo' ),
          'description'    => esc_html__('Adds a target="_blank" attribute to the link','kiamo'),
        ),
              
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));

    //=== Work Process ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Work Process', 'kiamo' ),
      'base'      => 'gva_work_process',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type' => 'param_group',
          'heading' => esc_html__('Items', 'kiamo' ),
          'param_name' => 'items',
          'description' => '',
          'value' => urlencode( json_encode( array(
            
          ) ) ),
          'params' => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__('Title','kiamo'),
              'param_name' => 'title',
              'admin_label' => true
            ),
            array(
              'type'        => 'textfield',
              'heading'     => esc_html__( 'Icon Class', 'kiamo' ),
              'param_name'  => 'icon'
            ),
            array(
              'type'        => 'textarea',
              'heading'     => esc_html__( 'Content', 'kiamo' ),
              'param_name'  => 'content'
            ),
          ),
        ),

        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));
  
    //=== Google Map ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Google Map', 'kiamo' ),
      'base'      => 'gva_google_map',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'map_type',
          'heading'     => esc_html__('Map Type', 'kiamo' ),
          'value'   => array(
              esc_html__('ROADMAP', 'kiamo')  => 'ROADMAP',
              esc_html__('HYBRID', 'kiamo')   => 'HYBRID',
              esc_html__('SATELLITE', 'kiamo')   => 'SATELLITE',
              esc_html__('TERRAIN', 'kiamo')   => 'TERRAIN'
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Latitude, Longitude for map', 'kiamo' ),
          'param_name'  => 'link',
          'value'       => '',
          'description' => esc_html__( 'eg: 21.0173222,105.78405279999993', 'kiamo' )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Map height', 'kiamo' ),
          'param_name'  => 'height',
          'value'       => '',
          'description' => esc_html__( 'Enter map height (in pixels or leave empty for responsive map), eg: 400px', 'kiamo' )
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Text Address', 'kiamo' ),
          'param_name'  => 'content',
          'value'       => ''
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));

    //=== Box Parallax ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Box Parallax', 'kiamo' ),
      'base'      => 'gva_box_parallax',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'SubTitle', 'kiamo' ),
          'param_name'  => 'subtitle',
          'value'       => ''
        ),
        array(
          'type'       => 'attach_image',
          'heading'    => esc_html__( 'Photo', 'kiamo' ),
          'param_name' => 'photo',
          'value'      => ''
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Content', 'kiamo' ),
          'param_name'  => 'content',
          'value'       => ''
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'content_align',
          'heading'     => esc_html__('Content Align', 'kiamo' ),
          'value'   => array(
              esc_html__('Left', 'kiamo')    => 'left',
              esc_html__('Right', 'kiamo')   => 'right',
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Background content', 'kiamo' ),
          'param_name'  => 'content_bg',
          'value'       => '',
          'description' => esc_html__( 'ackground color for content. e.g. #f5f5f5', 'kiamo' )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Content color', 'kiamo' ),
          'param_name'  => 'content_color',
          'value'       => '',
          'description' => esc_html__( 'Color for content. e.g. #f5f5f5. default color-text for theme', 'kiamo' )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kiamo' ),
          'param_name'  => 'link',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link Title', 'kiamo' ),
          'param_name'  => 'link_title',
          'value'       => ''
        ),
        array(
          'type'        => 'checkbox',
          'heading'     => esc_html__( 'Open in new window', 'kiamo' ),
          'param_name'  => 'target',
          'description' => esc_html__( 'Adds a target="_blank" attribute to the link', 'kiamo' )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));

    //=== Video Box ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Video Box', 'kiamo' ),
      'base'      => 'gva_box_video',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Url Video (Youtube/Vimeo)', 'kiamo' ),
          'param_name'  => 'content',
          'value'       => 'https://www.youtube.com/watch?v=4g7zRxRN1Xk',
        ),
        array(
          'type'       => 'attach_image',
          'heading'    => esc_html__( 'Image Preview', 'kiamo' ),
          'param_name' => 'photo',
          'value'      => ''
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));
    
    //=== Work Process ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Tabs Content', 'kiamo' ),
      'base'      => 'gva_tabs_content',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title for Administrator', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'content_align',
          'heading'     => esc_html__('Content Align', 'kiamo' ),
          'value'   => array(
              esc_html__('Default', 'kiamo')      => '',
              esc_html__('Text Light', 'kiamo')   => 'text-light'
          ),
        ),
        array(
          'type' => 'param_group',
          'heading' => esc_html__('Items', 'kiamo' ),
          'param_name' => 'items',
          'description' => '',
          'value' => urlencode( json_encode( array(
            
          ) ) ),
          'params' => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__('Icon Class','kiamo'),
              'param_name' => 'icon',
              'description' => 'Use class icon font <a target="_blank" href="http://fontawesome.io/icons/">Icon Awesome</a> or <a target="_blank" href="gaviasthemes.com/icons">Custom icon</a>'
            ),
            array(
              'type'        => 'textfield',
              'heading'     => esc_html__( 'Title', 'kiamo' ),
              'param_name'  => 'title',
              'admin_label' => true
            ),
            array(
              'type'        => 'textarea',
              'heading'     => esc_html__( 'Content', 'kiamo' ),
              'param_name'  => 'content',
              'settings'    => array('rows' => 20)
            ),
            array(
              'type'       => 'attach_image',
              'heading'    => esc_html__( 'Image Preview', 'kiamo' ),
              'param_name' => 'photo',
              'value'      => ''
            )
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        ),
      )
    ));

    //=== Partners ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Partners', 'kiamo' ),
      'base'      => 'gva_partners',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kiamo' ),
          'param_name'  => 'title',
          'admin_label' => true
        ),
        array(
          'type'       => 'attach_image',
          'heading'    => esc_html__( 'Image', 'kiamo' ),
          'param_name' => 'photo',
          'value'      => ''
        ),
        array(
          'type'       => 'textarea',
          'heading'    => esc_html__( 'Content', 'kiamo' ),
          'param_name' => 'content',
          'value'      => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Category', 'kiamo' ),
          'param_name'  => 'category',
          'value'       => '',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Address', 'kiamo' ),
          'param_name'  => 'address',
          'value'       => '',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kiamo' ),
          'param_name'  => 'link',
          'value'       => '',
        ),
        array(
          'type'         => 'dropdown',
          'heading'     => esc_html__( 'Open in new window', 'kiamo' ),
          'param_name'  => 'target',
          'value'       => array(
            esc_html__('No', 'kiamo') => 'off',
            esc_html__('Yes', 'kiamo') => 'on'
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kiamo'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        )
      )
    ));
	}
}