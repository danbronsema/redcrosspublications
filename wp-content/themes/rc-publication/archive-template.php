<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages for posts in a tag.
 * Template Name: Archive
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Red Cross Publications
 */

get_header(); ?>

<?php $posts_array = get_posts('orderby=menu_order&posts_per_page=-1'); ?>

	<?php foreach ($posts_array as $post) : ?>
	<li><a href="<?php the_permalink(); ?>" data-fancybox-type="iframe" class="fancybox" id="<?php the_ID(); ?>" data-class="<?php echo get_the_ID(); ?>">
		<?php the_title(); ?>
	</a></li>
	 <?php endforeach; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
