<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Red Cross Publications
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<div class='issue-list category-listing clear' id='issue-list'>
		<?php foreach((get_categories()) as $cat) :
			include(locate_template('template_issue_list.php')); 
    endforeach; ?>
  	</div>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
