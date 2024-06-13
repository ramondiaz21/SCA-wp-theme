<?php 
class Kiamo_Visualcomposer_Portfolio implements Vc_Vendor_Interface {
	public function load(){ 
    //=== Element Portfolio Grid ===
    $gva_portfolio_grid =  array(
      'name'        => esc_html__("GVA Portfolio Grid", 'kiamo'),
      'base'      => 'gva_portfolio_grid',
      'icon'        => 'icon-wpb-vc_icon',
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
          'type'        => 'autocomplete',
          'heading'     => __( 'Select Porfolio IDs', 'kiamo' ),
          'param_name'  => 'ids',
          'settings' => array(
            'multiple'        => true,
            'sortable'       => true,
            'unique_values'  => true,
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
          'type'         => 'dropdown',
          'heading'     => esc_html__( 'Style display', 'kiamo' ),
          'param_name'  => 'style_display',
          'value'       => array(
            esc_html__('Style #1', 'kiamo') => 'item-v1',
            esc_html__('Style #2', 'kiamo') => 'item-v2'
          )
        ),
        array(
          'type'         => 'checkbox',
          'heading'        => __( 'Enable Filter', 'kiamo' ),
          'param_name'         => 'filter',
          'std'  => true
        ),
        array(
          'type'         => 'checkbox',
          'heading'        => __( 'Remove Padding', 'kiamo' ),
          'param_name'         => 'remove_padding',
          'std'  => true
        ),
        array(
          'type'         => 'checkbox',
          'heading'        => __( 'Enable Pagination', 'kiamo' ),
          'param_name'         => 'pagination',
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
       $gva_portfolio_grid['params'][] = $setting;
    }
    vc_map($gva_portfolio_grid);

    //=== Element Portfolio Carousel ===
    $gva_portfolio_carousel =  array(
      'name'        => esc_html__("GVA Portfolio Carousel", 'kiamo'),
      'base'      => 'gva_portfolio_carousel',
      'icon'        => 'icon-wpb-vc_icon',
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
          'type'        => 'autocomplete',
          'heading'     => __( 'Select Porfolio IDs', 'kiamo' ),
          'param_name'  => 'ids',
          'settings' => array(
            'multiple'        => true,
            'sortable'       => true,
            'unique_values'  => true,
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
          'type'         => 'dropdown',
          'heading'     => esc_html__( 'Style display', 'kiamo' ),
          'param_name'  => 'style_display',
          'value'       => array(
              esc_html__('Style #1', 'kiamo') => 'item-v1',
              esc_html__('Style #2', 'kiamo') => 'item-v2'
            ),
        ),
        array(
          'type'         => 'checkbox',
          'heading'        => __( 'Remove Padding', 'kiamo' ),
          'param_name'         => 'remove_padding',
          'std'  => true
        ),
        array(
          'type'         => 'checkbox',
          'heading'        => __( 'Enable Pagination', 'kiamo' ),
          'param_name'         => 'pagination',
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
      $gva_portfolio_carousel['params'][] = $setting;
    }
    foreach (kiamo_carousel_settings() as $key => $setting) {
      $gva_portfolio_carousel['params'][] = $setting;
    }
    vc_map($gva_portfolio_carousel);

    add_filter( 'vc_autocomplete_gva_portfolio_carousel_ids_callback', array( $this, 'portfolioIdsAutocompleteSuggester') ); 
    add_filter( 'vc_autocomplete_gva_portfolio_carousel_ids_render', array(&$this, 'portfolioIdsAutocompleteRender' ) ); 

    add_filter( 'vc_autocomplete_gva_portfolio_grid_ids_callback', array( $this, 'portfolioIdsAutocompleteSuggester') ); 
    add_filter( 'vc_autocomplete_gva_portfolio_grid_ids_render', array(&$this, 'portfolioIdsAutocompleteRender' ) ); 

	}

  function portfolioIdsAutocompleteRender($value){
    return gaviasframeworkPortfolioAutocompleteRender($value);
  }
  function portfolioIdsAutocompleteSuggester($query){
    return gaviasframeworkPortfolioAutocompleteSuggester($query);
  }

}