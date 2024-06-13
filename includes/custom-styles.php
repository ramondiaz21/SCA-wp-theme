<?php
/* Save custom theme styles */
if ( ! function_exists( 'kiamo_custom_styles_save' ) ) :
function kiamo_custom_styles_save() {

	$main_font = false;
	$main_font_enabled = ( kiamo_get_option('main_font_source', 0) == 0 ) ? false : true;
	if ( $main_font_enabled ) {
		$font_main = kiamo_get_option('main_font', '');
		if(isset($font_main['font-family']) && $font_main['font-family']){
			$main_font = $font_main['font-family'];
		}
	}

	$secondary_font = false;
	$secondary_font_enabled = ( kiamo_get_option('secondary_font_source', 0) == 0 ) ? false : true;
	if ( $secondary_font_enabled ) {
		$font_second = kiamo_get_option('secondary_font', '');
		if(isset($font_second['font-family']) && $font_second['font-family']){
			$secondary_font = $font_second['font-family'];
		}
	}

	ob_start();
?>


/* Typography */
<?php if ( $main_font_enabled && isset($main_font) && $main_font ) : ?>
body, .menu-font-base ul.mega-menu > li > a, .megamenu-main .widget .widget-title, .megamenu-main .widget .widgettitle, .gva-vertical-menu ul.navbar-nav li a,
.vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-panels-container .tabs-list > li > a, .post .entry-meta
{
	font-family:<?php echo esc_attr( $main_font ); ?>,sans-serif;
}
<?php endif; ?>

<?php if ( $secondary_font_enabled && isset($secondary_font) && $secondary_font ) : ?>
ul.navbar-nav.gva-nav-menu > li > a, ul.navbar-nav.gva-nav-menu > li .submenu-inner li a, ul.navbar-nav.gva-nav-menu > li ul.submenu-inner li a,.gsc-icon-box .highlight_content .title,
.gsc-heading .title-desc, .milestone-block .milestone-text, .gsc-call-to-action .title, .gsc-box-hover .backend .box-title, .gsc-box-hover .box-title, .rotate-text .primary-text, .widget_categories ul > li > a,
.widget_rss ul > li a, .widget_recent_entries ul > li a, .widget_pages ul > li > a, .widget_archive ul > li > a, .portfolio-v1 .content-inner .title a , .portfolio-item-v2 .content-inner .title,
.portfolio-filter ul.nav-tabs > li > a, .testimonial-node-v1 .testimonial-content .quote, .team-block .team-name, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6
{
	font-family:<?php echo esc_attr( $secondary_font ); ?>,sans-serif;
}
<?php endif; ?>


/* ----- Main Color ----- */
<?php if($style = kiamo_get_option('main_color', '')){ ?>
	body{
		color:<?php echo esc_attr($style) ?>;
	}
<?php } ?>

/* ----- Background body ----- */
<?php 
	$main_background = kiamo_get_option('main_background_image', '');
	if(isset($main_background['url']) && $main_background['url']){
?>
body{
	<?php if ( strlen( $main_background['url'] ) > 0 ) : ?>
	background-image:url("<?php echo esc_url( $main_background['url'] ); ?>");
	<?php if ( kiamo_get_option('main_background_image_type', '') == 'fixed' ) : ?>
	background-attachment:fixed;
	background-size:cover;
	<?php else : ?>
	background-repeat:repeat;
	background-position:0 0;
	<?php endif; endif; ?>
	background-color:<?php echo esc_attr( kiamo_get_option('main_background_color', '') ); ?>;
}
<?php } ?>


/* ----- Top bar ----- */
<?php if(kiamo_get_option('top_bar_background_color', '')){ ?>
.topbar{
	background:<?php echo esc_attr( kiamo_get_option('top_bar_background_color', '') ); ?>;
}
<?php } ?>

<?php if(kiamo_get_option('top_bar_background_color', '')){ ?>
.topbar{
	color: <?php echo esc_attr( kiamo_get_option('top_bar_font_color', '') ); ?>;
}
<?php } ?>	

/* ----- Header ---- */
<?php if(kiamo_get_option('header_background_color', '')){ ?>
header, header .header-main{
	background: <?php echo esc_attr( kiamo_get_option('header_background_color', '') ); ?>!important;
}
<?php } ?>	

<?php if(kiamo_get_option('header_font_color', '')){ ?>
header{
	color: <?php echo esc_attr( kiamo_get_option('header_font_color', '') ); ?>;
}
<?php } ?>	

<?php if(kiamo_get_option('header_font_color_link', '')){ ?>
header a{
	color: <?php echo esc_attr( kiamo_get_option('header_font_color_link', '') ); ?>;
}
<?php } ?>	

<?php if(kiamo_get_option('header_font_color_link_hover', '')){ ?>
header a:hover, header a:focus, header a:active{
	color: <?php echo esc_attr( kiamo_get_option('header_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>	

/* ----- Menu ----- */
<?php if(kiamo_get_option('menu_background_color', '')){ ?>
.header-mainmenu{
	background: <?php echo esc_attr( kiamo_get_option('menu_background_color', '') ); ?>!important;
}
<?php } ?>	

<?php if(kiamo_get_option('menu_font_color', '')){ ?>
ul.gva-main-menu{
	color: <?php echo esc_attr( kiamo_get_option('menu_font_color', '') ); ?>;
}
<?php } ?>	

<?php if(kiamo_get_option('menu_font_color_link', '')){ ?>
ul.gva-main-menu > li > a, .menu-light-style .gva-nav-menu > li > a{
	color: <?php echo esc_attr( kiamo_get_option('menu_font_color_link', '') ); ?>!important;
}
<?php } ?>	

<?php if(kiamo_get_option('menu_font_color_link_hover', '')){ ?>
ul.gva-main-menu > li > a:hover, ul.gva-main-menu > li > a:focus, ul.gva-main-menu > li > a:active{
	color: <?php echo esc_attr( kiamo_get_option('menu_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>	

<?php if(kiamo_get_option('menu_sub_background_color', '')){ ?>
ul.gva-main-menu .submenu-inner {
	background: <?php echo esc_attr( kiamo_get_option('menu_sub_background_color', '') ); ?>!important;
}
<?php } ?>	

<?php if(kiamo_get_option('menu_sub_font_color', '')){ ?>
ul.gva-main-menu .submenu-inner {
	color: <?php echo esc_attr( kiamo_get_option('menu_sub_font_color', '') ); ?>;
}
<?php } ?>	

<?php if(kiamo_get_option('menu_sub_font_color_link', '')){ ?>
ul.gva-main-menu .submenu-inner a {
	color: <?php echo esc_attr( kiamo_get_option('menu_sub_font_color_link', '') ); ?>;
}
<?php } ?>	

<?php if(kiamo_get_option('menu_sub_font_color_link_hover', '')){ ?>
ul.gva-main-menu .submenu-inner a:hover, ul.gva-main-menu .submenu-inner a:active, ul.gva-main-menu .submenu-inner a:focus {
	color: <?php echo esc_attr( kiamo_get_option('menu_sub_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>	

/* ----- Main content ----- */
<?php if(kiamo_get_option('content_background_color', '')){ ?>
div.page {
	background: <?php echo esc_attr( kiamo_get_option('content_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(kiamo_get_option('content_font_color', '')){ ?>
div.page {
	color: <?php echo esc_attr( kiamo_get_option('content_font_color', '') ); ?>;
}
<?php } ?>

<?php if(kiamo_get_option('content_font_color_link', '')){ ?>
div.page a{
	color: <?php echo esc_attr( kiamo_get_option('content_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(kiamo_get_option('content_font_color_link_hover', '')){ ?>
div.page a:hover, div.page a:active, div.page a:focus {
	background: <?php echo esc_attr( kiamo_get_option('content_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

/* ----- Footer content ----- */
<?php if(kiamo_get_option('footer_background_color', '')){ ?>
#wp-footer {
	background: <?php echo esc_attr( kiamo_get_option('footer_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(kiamo_get_option('footer_font_color', '')){ ?>
#wp-footer {
	color: <?php echo esc_attr( kiamo_get_option('footer_font_color', '') ); ?>;
}
<?php } ?>

<?php if(kiamo_get_option('footer_font_color_link', '')){ ?>
#wp-footer a{
	color: <?php echo esc_attr( kiamo_get_option('footer_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(kiamo_get_option('footer_font_color_link_hover', '')){ ?>
#wp-footer a:hover, #wp-footer a:active, #wp-footer a:focus {
	background: <?php echo esc_attr( kiamo_get_option('footer_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

<?php
	$styles = ob_get_clean();
	
    $styles = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles );
	
	$styles = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), '', $styles );
		
	update_option( 'kiamo_theme_custom_styles', $styles, true );
}
endif;

add_action( 'redux/options/kiamo_theme_options/saved', 'kiamo_custom_styles_save' );


/* Make sure custom theme styles are saved */
function kiamo_custom_styles_install() {
	if ( ! get_option( 'kiamo_theme_custom_styles' ) && get_option( 'kiamo_theme_options' ) ) {
		kiamo_custom_styles_save();
	}
}

add_action( 'redux/options/kiamo_theme_options/register', 'kiamo_custom_styles_install' );
