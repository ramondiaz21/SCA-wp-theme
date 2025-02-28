<?php
/**
 * The template for displaying posts in the Link post format
 *
 * 
 * @package    basetheme
 * @author     gaviasthemes Team     
 * @copyright  Copyright (C) 2016 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */ 
?>
<?php 
	$thumbnail = 'post-thumbnail';
	if(isset($thumbnail_size) && $thumbnail_size){
		$thumbnail = $thumbnail_size;
	}
	if(is_single()){
		$thumbnail = 'full';
	}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="post-thumbnail">
		<?php the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) ); ?>
	</div>

	<div class="post-content">
		<header class="entry-header">
			<?php 

				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
			?>

			<div class="entry-meta">
				<span class="post-format hidden">
					<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'link' ) ); ?>"><?php echo get_post_format_string( 'link' ); ?></a>
				</span>
				<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){  ?>
					<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'kiamo' ) ); ?></span>&nbsp;&nbsp;|&nbsp;&nbsp;
				<?php } ?>
				<?php kiamo_posted_on(); ?>

				<?php edit_post_link( esc_html__( 'Edit', 'kiamo' ), '&nbsp;&nbsp;|&nbsp;&nbsp;<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if(is_single()){
				the_content( sprintf(
					esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kiamo' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'kiamo' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			
			}else{
				echo kiamo_limit_words( kiamo_get_option('blog_excerpt_limit', 30), get_the_excerpt(), get_the_content() );
			}
			?>
			
		</div><!-- .entry-content -->
	</div>	

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
