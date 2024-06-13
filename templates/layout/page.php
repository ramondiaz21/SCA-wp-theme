<?php
$show_page_title = false;
if ( metadata_exists( 'post', get_the_ID(), 'kiamo_page_title' ) ) {
  $show_page_title = get_post_meta(get_the_ID(), 'kiamo_page_title', true);
}
if ( have_posts() ) : the_post(); ?>
    <div <?php post_class( 'clearfix' ); ?> id="<?php the_ID(); ?>">

        <?php do_action( 'kiamo_page_content_before' ); ?>

        <?php if($show_page_title && !is_front_page()){ ?>
          <h1 class="title"><?php the_title(); ?></h1>
        <?php } ?>
        <?php the_content(); ?>

        <div class="link-pages"><?php wp_link_pages(); ?></div>
        <div class="container">
           <?php
               // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) {
                  comments_template();
              }          
            ?>
         </div>
        <?php do_action( 'kiamo_page_content_after' ); ?>

    </div>

<?php endif; ?>