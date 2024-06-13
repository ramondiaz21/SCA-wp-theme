<?php 

class kiamo_Visualcomposer_Woo implements Vc_Vendor_Interface {
	public function load(){ 
      //------------------ Element products ----------------------------------
      //-----------------------------------------------------------------------
      $cats = array();
      $categories = get_terms( 'product_cat' );
      $cats['Choose Category'] = '';
      if( !is_wp_error($categories)){
         if($categories){
            foreach ($categories as $category) {
               $cats[html_entity_decode($category->name, ENT_COMPAT, 'UTF-8')] = $category->slug;
            }
         }
      }

      /*** GVA Products ***/
      //---------------------------------------
      vc_map( array(
         'name'      => esc_html__( 'GVA Products', 'kiamo' ),
         'base'      => 'gva_products',
         'icon'        => 'icon-wpb-vc_icon',
         'category'  => 'Gavias Element',
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
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Product type', 'kiamo' ),
               'param_name'  => 'product_type',
               'admin_label'    => true,
               'value'       => array(
                     'Recent'    => 'recent',
                     'Sale'        => 'sale',
                     'Featured'    => 'featured',
                     'Best Selling'   => 'best_selling',
                     'Top Rated'   => 'top_rated',
                  ),
               'description'    => esc_html__( 'Select type of product', 'kiamo' ),
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Columns', 'kiamo' ),
               'param_name'  => 'columns',
               'admin_label'    => true,
               'value'       => 5,
               'description'    => esc_html__( 'Number of Columns', 'kiamo' ),
            ),
            array(
               'type' => 'dropdown',
               'heading' => esc_html__('Style','kiamo'),
               'param_name' => 'style',
               'value' => array(
                  esc_html__('Gird Display', 'kiamo') => 'grid',
                  esc_html__('Carousel Display', 'kiamo') => 'carousel',
                  esc_html__('Stick Product v1', 'kiamo') => 'stick_v1',
                  esc_html__('Stick Product v2', 'kiamo') => 'stick_v2'
               ),
            ),
            //Carousel setting
            array(
               'type' => 'dropdown',
               'heading' => esc_html__('Rows for carousel display','kiamo'),
               'param_name' => 'carousel_row',
               'value' => array(1, 2, 3, 4, 5),
               'description' => esc_html__('Choose row display for carousel (Main products)','kiamo'),
               'group' => 'Carousel Setting'
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Limit', 'kiamo' ),
               'param_name'  => 'per_page',
               'admin_label'    => true,
               'value'       => 5,
               'description'    => esc_html__( 'Number of Products', 'kiamo' ),
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product Categories', 'kiamo' ),
               'param_name'  => 'product_cats',
               'admin_label'    => true,
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => '',
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product IDs', 'kiamo' ),
               'param_name'  => 'ids',
               'admin_label'    => true,
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => esc_html__('Enter product name or slug to search', 'kiamo'),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','kiamo'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
            ),
         )
      ) );

      /*** GVA Products List ***/
      //---------------------------------------
      vc_map( array(
         'name'      => esc_html__( 'GVA Products List', 'kiamo' ),
         'base'      => 'gva_products_list',
         'icon'        => 'icon-wpb-vc_icon',
         'category'  => 'Gavias Element',
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
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Product type', 'kiamo' ),
               'param_name'  => 'product_type',
               'admin_label'    => true,
               'value'       => array(
                     'Recent'    => 'recent',
                     'Sale'        => 'sale',
                     'Featured'    => 'featured',
                     'Best Selling'   => 'best_selling',
                     'Top Rated'   => 'top_rated',
                  ),
               'description'    => esc_html__( 'Select type of product', 'kiamo' ),
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Limit', 'kiamo' ),
               'param_name'  => 'per_page',
               'value'       => 5,
               'description'    => esc_html__( 'Number of Products', 'kiamo' ),
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product Categories', 'kiamo' ),
               'param_name'  => 'product_cats',
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => '',
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product IDs', 'kiamo' ),
               'param_name'  => 'ids',
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => esc_html__('Enter product name or slug to search', 'kiamo'),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','kiamo'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
            ),
         )
      ) );

      /*** GVA Products Tabs Ajax ***/
      //---------------------------------------
      vc_map( array(
         'name' => esc_html__('GVA Products Tabs Ajax','kiamo'),
         'base' => 'gva_tabs_products_ajax',
         'description' => esc_html__( 'Display BestSeller, TopRated ... Products In tabs', 'kiamo' ),
         'icon'        => 'icon-wpb-vc_icon',
         'category' => esc_html__('Gavias Element','kiamo'),
         'params' => array(
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Title','kiamo'),
               'param_name' => 'title',
               'value' => '',
               'admin_label' => true
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
                     'heading' => esc_html__('Name','kiamo'),
                     'param_name' => 'name',
                  ),
                  array(
                     'type' => 'dropdown',
                     'heading' => esc_html__('Product Type', 'kiamo'),
                     'param_name' => 'product_type',
                     'value' => array(
                        array('recent', esc_html__('Latest Products', 'kiamo')),
                        array( 'featured_product', esc_html__('Featured Products', 'kiamo' )),
                        array('best_selling', esc_html__('BestSeller Products', 'kiamo' )),
                        array('top_rate', esc_html__('TopRated Products', 'kiamo' )),
                        array('on_sale', esc_html__('Special Products', 'kiamo' ))
                     )
                  ),
                  array(
                     'type'            => 'dropdown',
                     'heading'         => esc_html__( 'Product Categories', 'kiamo' ),
                     'param_name'      => 'product_cats',
                     'admin_label'     => true,
                     'value'           => $cats,
                     'description'     => '',
                  ),
                  array(
                     'type' => 'dropdown',
                     'heading' => esc_html__('Style','kiamo'),
                     'param_name' => 'style',
                     'value' => array(
                        esc_html__('Gird Display', 'kiamo') => 'grid',
                        esc_html__('Carousel Display', 'kiamo') => 'carousel'
                     ),
                  ),
               ),
            ),
           
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Number of products to show','kiamo'),
               'param_name' => 'number',
               'value' => '4'
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Columns count','kiamo'),
               'param_name'   => 'columns_count',
               'value'        => array(5, 4, 3, 2, 1),
               'description'  => esc_html__('Select columns count.','kiamo')
            ),

            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','kiamo'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
            ),

            //Carousel setting
            array(
               'type' => 'dropdown',
               'heading' => esc_html__('Rows for carousel display','kiamo'),
               'param_name' => 'carousel_row',
               'value' => array(1, 2, 3, 4, 5),
               'description' => esc_html__('Choose row display for carousel (Main products)','kiamo'),
               'group' => 'Carousel Setting'
            ),

         )
      ));
   
   /*** GVA Deals ***/
   //-----------------------------------
      vc_map( array(
         'name'     => esc_html__('GVA Deals','kiamo'),
         'base'     => 'gva_deals',
         'icon'        => 'icon-wpb-vc_icon',
         'category' => esc_html__('Gavias Element', 'kiamo'),
         'params'   => array(     
         array(
            'type'         => 'textfield',
            'heading'     => esc_html__( 'Block title', 'kiamo' ),
            'param_name'  => 'title',
            'admin_label'    => true,
            'value'       => '',
            'description'    => '',
         ),
         array(
            'type'         => 'autocomplete',
            'heading'     => esc_html__( 'Product Categories', 'kiamo' ),
            'param_name'  => 'product_cats',
            'admin_label'    => true,
            'value'       => '',
            'settings' => array(
               'multiple'        => true,
               'sortable'       => true,
               'unique_values'  => true,
            ),
            'description'    => '',
         ), 
         array(
            'type'       => 'textfield',
            'heading'    => esc_html__('Number of categories to show', 'kiamo'),
            'param_name' => 'number',
            'value'      => '5'
         ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__('Columns count display','kiamo'),
            'param_name' => 'columns',
            'value' => array(5, 4, 3, 2, 1),
            'description' => esc_html__('Select columns count.','kiamo')
         ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show Description','kiamo'),
            'param_name' => 'show_desc',
            'value' =>array(
               esc_html__('Off', 'kiamo')=>'off',
               esc_html__('On', 'kiamo')=>'on'
            ),
         ),
         array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Extra class name','kiamo'),
            'param_name'  => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kiamo')
         )
      )
   ));

   if( class_exists('Vc_Vendor_Woocommerce') ){
         $vc_woo_vendor = new Vc_Vendor_Woocommerce();

         /* autocomplete callback */
         add_filter( 'vc_autocomplete_gva_products_ids_callback', array($vc_woo_vendor, 'productIdAutocompleteSuggester') );
         add_filter( 'vc_autocomplete_gva_products_ids_render', array($vc_woo_vendor, 'productIdAutocompleteRender') );
         
         $shortcode_field_cats = array();
         $shortcode_field_cats[] = array('gva_products', 'product_cats');
         $shortcode_field_cats[] = array('gva_deals', 'product_cats');
         foreach( $shortcode_field_cats as $shortcode_field ){
            add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_callback', array($vc_woo_vendor, 'productCategoryCategoryAutocompleteSuggester') );
            add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_render', array($vc_woo_vendor, 'productCategoryCategoryRenderByIdExact') );
         }
      }
	}
}

