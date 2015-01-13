<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 * Template Name: Tags
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Red Cross Publications
 */

get_header(); ?>

<div class='tag-cloud'>
	<?php wp_tag_cloud('number=0&orderby=name&smallest=11&largest=20'); ?>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>



<?php get_sidebar(); ?>
<?php get_footer(); ?>
