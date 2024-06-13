<?php $kiamo_options = kiamo_get_options(); ?>

<div class="header-mobile hidden-lg hidden-md">
  <div class="container">
    <div class="row"> 
     
      <div class="left col-xs-4">
         <?php get_template_part('templates/parts/canvas-mobile'); ?>
      </div>

      <div class="center text-center col-xs-4">
        <div class="logo-menu">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo ((isset($kiamo_options['header_logo_mobile']['url']) && $kiamo_options['header_logo_mobile']['url']) ? $kiamo_options['header_logo_mobile']['url'] : get_template_directory_uri().'/images/logo-mobile.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
          </a>
        </div>
      </div>


        <div class="right col-xs-4">
          <?php if(kiamo_woocommerce_activated()){ ?>
            <div class="mini-cart-header">
              <?php if(kiamo_woocommerce_activated()){ ?>
                <?php  kiamo_get_cart_contents(); ?>
              <?php } ?>  
            </div>
          <?php } ?>
          <div class="main-search gva-search">
            <a><i class="gv-icon-52"></i></a>
          </div>
        </div> 
       
    </div>  
  </div>  
</div>