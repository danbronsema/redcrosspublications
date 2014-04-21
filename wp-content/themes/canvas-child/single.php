<!-- CHECK IF THIS IS AN AJAX REQUEST 
Because we don't want to load the entire page if it is. Just serve up the content
-->
<?php
foreach (getallheaders() as $name => $value) {
	if ($name == 'X-fancyBox') {
    if ($value) {
    	$fancybox_request = true;
    }
	}
}
?>
<!-- AJAX REQUEST -->
<?php if($fancybox_request) { ?>
<?php $post = get_post(); ?>
<?php echo $post->post_content; ?>

<?php }
else {
 ?>

<?php
/**
 * Single Post Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a post ('post' post_type).
 * @link http://codex.wordpress.org/Post_Types#Post
 *
 * @package WooFramework
 * @subpackage Template
 */

get_header();
?>

    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full">
    
    	<div id="main-sidebar-container">    

            <!-- #main Starts -->
            <?php woo_main_before(); ?>
            <section id="main">      

<?php
	woo_loop_before();
	
	if (have_posts()) { $count = 0;
		while (have_posts()) { the_post(); $count++;
			
			woo_get_template_part( 'content', get_post_type() ); // Get the post content template file, contextually.
		}
	}
	
	woo_loop_after();
?>

            </section><!-- /#main -->
            <?php woo_main_after(); ?>
    
            <?php get_sidebar(); ?>

		</div><!-- /#main-sidebar-container -->         

		<?php get_sidebar('alt'); ?>

    </div><!-- /#content -->
	<?php woo_content_after(); ?>

<?php get_footer(); ?>
<?php } ?>