
<!-- CHECK AJAX REQUEST -->
<?php
$post = get_post();

if ($_SERVER['HTTP_X_FANCYBOX']) {
	$fancybox_request = true;
}
?>
<!-- AJAX REQUEST -->
<?php if($fancybox_request) { ?>
	<div class='article'>
		<div class='article-header'>
			<h2><?php echo $post->post_title; ?></h2>
			<p class='author'><?php the_field('post_author'); ?></p>
		</div>
		<div class='article-body'>
			<?php echo apply_filters('the_content', $post->post_content); ?>
		</div>
		<div class='article-return'>
			<p><a class='btn' href="javascript:parent.$.fancybox.close();">&laquo; Return to <?php
$category = get_the_category($post); 
echo $category[0]->cat_name;
?></a></p>
		</div>			
		<div class='article-footer'>
						<p><?php get_template_part('share'); ?><br>Red Cross relies on your ongoing support. To make a donation, please visit <a href='http://www.redcross.org.au/donate'>redcross.org.au/donate</a></p>		</div>			
	</div>
	<?php wp_footer(); ?><!-- FOOTER REQUIRED FOR SLIDESHOW AND HIDDEN IN CSS -->
	
<!-- ELSE  -->
<?php } else 
{
 ?>
<!-- NORMAL/LINKED REQUEST -->

<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Red Cross Publications
 */
get_header(); ?>

	<div class="fancybox-skin single-article" style="background:none;">
		<div class="fancybox-outer" >
			<div class="fancybox-inner">
				<div class='article'>
					<div class='article-header' style="background:none;">
						<h2 style="color:#ee342a;"><?php echo $post->post_title; ?></h2>
						<p class='author' style="color:#000;"><?php the_field('post_author'); ?></p>
					</div>
					<div class='article-body'>
						<?php echo apply_filters('the_content', $post->post_content); ?>
					</div>
					<div class='article-return'>
						<?php $category = get_the_category($post); 
							if($category[0]){ 
								$cat_link = get_category_link($category[0]->term_id);
								$cat_name = $category[0]->cat_name;
							} 
						?>
						<p><a class='btn' href="<?php echo $cat_link ?>">&laquo; Return to <?php echo $cat_name ?></a></p>
					</div>			
					<div class='article-footer'>
						<p><?php get_template_part('share'); ?><br>Red Cross relies on your ongoing support. To make a donation, please visit <a href='http://www.redcross.org.au/donate'>redcross.org.au/donate</a></p>
					</div>			
				</div>
			</div>
		</div>
	</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php } ?>
