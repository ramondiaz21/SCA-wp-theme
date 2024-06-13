<?php

/**
*	Remove parameters for vc
*/
vc_remove_param('vc_tta_accordion', 'style');
vc_remove_param('vc_tta_accordion', 'shape');
vc_remove_param('vc_tta_accordion', 'color');
vc_remove_param('vc_tta_accordion', 'no_fill');
vc_remove_param('vc_tta_accordion', 'spacing');
vc_remove_param('vc_tta_accordion', 'gap');
vc_remove_param('vc_tta_accordion', 'c_align');
vc_remove_param('vc_tta_accordion', 'c_position');

vc_remove_param('vc_tta_tour', 'style');
vc_remove_param('vc_tta_tour', 'shape');
vc_remove_param('vc_tta_tour', 'color');
vc_remove_param('vc_tta_tour', 'spacing');
vc_remove_param('vc_tta_tour', 'gap');
vc_remove_param('vc_tta_tour', 'no_fill_content_area');
vc_remove_param('vc_tta_tour', 'controls_size');
vc_remove_param('vc_tta_tour', 'pagination_style');
vc_remove_param('vc_tta_tour', 'pagination_color');
vc_remove_param('vc_tta_tour', 'alignment');

vc_remove_param('vc_tta_tabs', 'shape');
vc_remove_param('vc_tta_tabs', 'style');
vc_remove_param('vc_tta_tabs', 'color');
vc_remove_param('vc_tta_tabs', 'alignment');
vc_remove_param('vc_tta_tabs', 'no_fill_content_area');
vc_remove_param('vc_tta_tabs', 'spacing');
vc_remove_param('vc_tta_tabs', 'gap');
vc_remove_param('vc_tta_tabs', 'pagination_style');
vc_remove_param('vc_tta_tabs', 'pagination_color');
if( function_exists('vc_remove_element') ){ 
	vc_remove_element('vc_masonry_media_grid');
	vc_remove_element('vc_masonry_grid');
	vc_remove_element('vc_media_grid');
	vc_remove_element('vc_tabs');
	vc_remove_element('vc_tour');
	vc_remove_element('vc_accordion');
}

function kiamo_init_vc_register(){
	if(kiamo_woocommerce_activated()){
		$vendor = new Kiamo_Visualcomposer_Woo();
		add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
	}
	
	$vendor = new Kiamo_Visualcomposer_Theme();
	add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
	$vendor = new Kiamo_Visualcomposer_Portfolio();
	add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
	$vendor = new Kiamo_Visualcomposer_Service();
	add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
}
add_action( 'after_setup_theme', 'kiamo_init_vc_register' , 90 );   

/**
 * Add parameters for row
 */
if(!function_exists('kiamo_add_params_vc')){
	function kiamo_add_params_vc(){
		vc_add_param( 'vc_row', array(
		   "type" => "dropdown",
		   "heading" => esc_html__("Layout Setting", 'kiamo'),
		   "param_name" => "fullwidth",
		   "value" => array(
				esc_html__('Boxed', 'kiamo') => '1',
				esc_html__('Wide - Full Width', 'kiamo') => '0'
			)
		));

		vc_add_param( 'vc_row', array(
		   "type" => "dropdown",
		   "heading" => esc_html__("Style Space", 'kiamo'),
		   "param_name" => "row_space",
		   "value" => array(
		   	esc_html__('-- Default --', 'kiamo') 								=> '',
				esc_html__('Padding Large', 'kiamo') 								=> 'padding-large',
				esc_html__('Remove padding top', 'kiamo') 						=> 'remove_padding_top',
				esc_html__('Remove padding bottom', 'kiamo') 					=> 'remove_padding_bottom',
				esc_html__('Remove padding for row', 'kiamo') 					=> 'remove_padding',
				esc_html__('Remove padding for colums of row', 'kiamo') 	=> 'remove_padding_col',
				esc_html__('Remove padding for [colums & row]', 'kiamo') 	=> 'remove_margin remove_padding remove_padding_col',
			)
		));

		vc_add_param( 'vc_row', array(
		   "type" => "dropdown",
		   "heading" => esc_html__("Custom Background", 'kiamo'),
		   "param_name" => "custom_background",
		   "value" => array(
		   	esc_html__('-- None --', 'kiamo') 						=> '',
				esc_html__('Background Of Theme', 'kiamo') 			=> 'bg-theme',
				esc_html__('Background Dark', 'kiamo') 				=> 'bg-dark',
				esc_html__('Background Position Left', 'kiamo') 	=> 'bg-left',
				esc_html__('Background Position Right', 'kiamo') 	=> 'bg-right',
				esc_html__('Background Position Bottom', 'kiamo') 	=> 'bg-bottom',
			)
		));
	}
}
add_action( 'init', 'kiamo_add_params_vc', 99 );
 

if(!function_exists('kiamo_override_vc_bootstrap')){
	function kiamo_override_vc_bootstrap( $class_string,$tag ){
		if ($tag=='vc_column' || $tag=='vc_column_inner') {
			$class_string = preg_replace('/vc_span(\d{1,2})/', 'col-md-$1', $class_string);
			$class_string = preg_replace('/vc_hidden-(\w)/', 'hidden-$1', $class_string);
		}
		return $class_string;
	}
}
add_filter( 'vc_shortcodes_css_class', 'kiamo_override_vc_bootstrap', 10, 2);


