<?php 
class Kiamo_Visualcomposer_Service implements Vc_Vendor_Interface {
  
  public function load(){ 

    $scat = array();
    if(function_exists('gaviasthemer_get_select_term')){
      $scat = gaviasthemer_get_select_term('category_service');
    }

    //=== Element service Grid ===
    $gva_service_grid =  array(
      'name'        => esc_html__("GVA Services Grid", 'kiamo'),
      'base'      => 'gva_services_grid',
      'class'     => '',
      'category'  => 'Gavias Element',
      'params'      => array(
        array(
          'type'           => 'textfield',
          'heading'          => esc_html__( 'Title Admin', 'kiamo' ),
          'param_name'           => 'title',
          'admin_label'    => true,
          'description'    => esc_html__('Title of element', 'kiamo')
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Service Categories', 'kiamo' ),
          'param_name'      => 'cats',
          'value'           =>  $scat,
          'description'     => '',
        ),
        array(
          'type'        => 'autocomplete',
          'heading'     => __( 'Select Service IDs', 'kiamo' ),
          'param_name'  => 'ids',
          'settings' => array(
            'multiple'        => true,
            'sortable'       => true,
            'unique_values'  => true,
          )
        ),
        array(
          'type'        => 'dropdown',
          'heading'     => esc_html__( 'Mode', 'kiamo' ),
          'param_name'  => 'mode',
          'value' => array(
             esc_html__('Lastest Services', 'kiamo') => 'most_recent',
             esc_html__('Randown Services', 'kiamo') => 'random'
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__( 'Limit', 'kiamo' ),
          'param_name'         => 'per_page',
          'value'        => '6',
          'description'  => esc_html__('Number of Posts', 'kiamo')
        ),
        
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__( 'Number of words in excerpt', 'kiamo' ),
          'param_name'         => 'excerpt_words',
          'value'        => '40'
        ),
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__('Extra class name','kiamo'),
          'param_name'         => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        )
      )
    );
    foreach (kiamo_responsive_settings() as $key => $setting) {
       $gva_service_grid['params'][] = $setting;
    }
    vc_map($gva_service_grid);

    //=== Element Service Carousel ===
    $gva_services_carousel =  array(
      'name'        => esc_html__("GVA Services Carousel", 'kiamo'),
      'base'      => 'gva_services_carousel',
      'class'     => '',
      'category'  => 'Gavias Element',
      'params'      => array(
        array(
          'type'           => 'textfield',
          'heading'          => esc_html__( 'Title Admin', 'kiamo' ),
          'param_name'           => 'title',
          'admin_label'    => true,
          'description'    => esc_html__('Title of element', 'kiamo')
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Service Categories', 'kiamo' ),
          'param_name'      => 'cats',
          'value'           =>  $scat,
          'description'     => '',
        ),
        array(
          'type'        => 'autocomplete',
          'heading'     => __( 'Select Service IDs', 'kiamo' ),
          'param_name'  => 'ids',
          'settings' => array(
            'multiple'        => true,
            'sortable'       => true,
            'unique_values'  => true,
          )
        ),
        array(
          'type'        => 'dropdown',
          'heading'     => esc_html__( 'Mode', 'kiamo' ),
          'param_name'  => 'mode',
          'value' => array(
             esc_html__('Lastest Services', 'kiamo') => 'most_recent',
             esc_html__('Randown Services', 'kiamo') => 'random'
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__( 'Limit', 'kiamo' ),
          'param_name'         => 'per_page',
          'value'        => '6',
          'description'  => esc_html__('Number of Posts', 'kiamo')
        ),
        
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__( 'Number of words in excerpt', 'kiamo' ),
          'param_name'         => 'excerpt_words',
          'value'        => '40'
        ),
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__('Extra class name','kiamo'),
          'param_name'         => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        )
      )
    );
    foreach (kiamo_responsive_settings() as $key => $setting) {
      $gva_services_carousel['params'][] = $setting;
    }
    foreach (kiamo_carousel_settings() as $key => $setting) {
      $gva_services_carousel['params'][] = $setting;
    }
    vc_map($gva_services_carousel);


    //=== Element Service Carousel Single ===
    $gva_services_carousel_single =  array(
      'name'        => esc_html__("GVA Services Carousel Single", 'kiamo'),
      'base'      => 'gva_services_carousel_single',
      'class'     => '',
      'category'  => 'Gavias Element',
      'params'      => array(
        array(
          'type'           => 'textfield',
          'heading'          => esc_html__( 'Title Admin', 'kiamo' ),
          'param_name'           => 'title',
          'admin_label'    => true,
          'description'    => esc_html__('Title of element', 'kiamo')
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Service Categories', 'kiamo' ),
          'param_name'      => 'cats',
          'value'           =>  $scat,
          'description'     => '',
        ),
        array(
          'type'        => 'autocomplete',
          'heading'     => __( 'Select Service IDs', 'kiamo' ),
          'param_name'  => 'ids',
          'settings' => array(
            'multiple'        => true,
            'sortable'       => true,
            'unique_values'  => true,
          )
        ),
        array(
          "type"        => "dropdown",
          'heading'     => esc_html__( 'Mode', 'kiamo' ),
          "param_name"  => "mode",
          "value" => array(
             esc_html__('Lastest Services', 'kiamo') => 'most_recent',
             esc_html__('Randown Services', 'kiamo') => 'random'
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__( 'Limit', 'kiamo' ),
          'param_name'         => 'per_page',
          'value'        => '6',
          'description'  => esc_html__('Number of Posts', 'kiamo')
        ),
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__( 'Number of words in excerpt', 'kiamo' ),
          'param_name'         => 'excerpt_words',
          'value'        => '80'
        ),
        
        array(
          'type'         => 'textfield',
          'heading'        => esc_html__('Extra class name','kiamo'),
          'param_name'         => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
        )
      )
    );
    vc_map($gva_services_carousel_single);

    add_filter( 'vc_autocomplete_gva_services_carousel_ids_callback', array( $this, 'serviceIdsAutocompleteSuggester') ); 
    add_filter( 'vc_autocomplete_gva_services_carousel_ids_render', array(&$this, 'serviceIdsAutocompleteRender' ) ); 

    add_filter( 'vc_autocomplete_gva_services_grid_ids_callback', array( $this, 'serviceIdsAutocompleteSuggester') ); 
    add_filter( 'vc_autocomplete_gva_services_grid_ids_render', array(&$this, 'serviceIdsAutocompleteRender' ) );

    add_filter( 'vc_autocomplete_gva_services_carousel_single_ids_callback', array( $this, 'serviceIdsAutocompleteSuggester') ); 
    add_filter( 'vc_autocomplete_gva_services_carousel_single_ids_render', array(&$this, 'serviceIdsAutocompleteRender' ) ); 
  }

  function serviceIdsAutocompleteRender($value){
    return gaviasframeworkserviceAutocompleteRender($value);
  }
  
  function serviceIdsAutocompleteSuggester($query){
    return gaviasframeworkserviceAutocompleteSuggester($query);
  }
}