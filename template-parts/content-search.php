<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplyPriorityHub
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>


		<div class="entry-meta">
			<?php
			simplypriorityhub_posted_on();
			simplypriorityhub_posted_by();
			?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->


	<div class="entry-summary">
		<span><?php the_excerpt(); ?></span>
	</div><!-- .entry-summary -->
<!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
