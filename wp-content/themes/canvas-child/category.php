<?php
/**
 * Archive Template
 *
 * The archive template is a placeholder for archives that don't have a template file. 
 * Ideally, all archives would be handled by a more appropriate template according to the
 * current page context (for example, `tag.php` for a `post_tag` archive).
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;
 get_header();
?>      
    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full">
    
    	<div id="main-sidebar-container">    
		
            <!-- #main Starts -->
            <?php woo_main_before(); ?>
            <section id="main" class="col-left">
            	
			<?php // get_template_part( 'loop', 'archive' ); ?>
                    
            </section><!-- /#main -->
            <?php woo_main_after(); ?>
    
            <?php get_sidebar(); ?>
    
		</div><!-- /#main-sidebar-container -->         

		<?php get_sidebar( 'alt' ); ?>       

<!-- ############### SHOW RELATED CATEGORIES ###############  -->
<?php
    if (is_category()) {
        $this_category = get_category($cat);
    }
    if($this_category->category_parent) {
        $parent_category = get_categories('orderby=id&title_li=&child_of='.$this_category->category_parent."&echo=0&hide_empty=0"); } 
    else {
        $child_category = get_categories('orderby=id&title_li=&child_of='.$this_category->cat_ID."&echo=0&hide_empty=0");
    }
?>
<?php foreach ($child_category as $cat) : ?>

    <a href="<?php echo get_category_link($cat->term_id); ?>"
    <h2><?php echo $cat->cat_name; ?></h2>
    <p><?php the_field('issue_text', "category_{$cat->term_id}"); ?></p>
    <p><?php echo $cat->category_description; ?></p>
    <?php if (function_exists('z_taxonomy_image_url')) 
        $url = z_taxonomy_image_url($cat->term_id);
        echo "<img src='$url'/>" 
    ?>
    </a>
<?php endforeach; ?>

<?php if ($parent_category) { ?>
    <p><?php echo($this_category->cat_name); ?></p>    
    <p><?php the_field('issue_text', "category_{$this_category->term_id}"); ?></p>

    <?php $posts_array = get_posts('orderby=post_date&category='.$this_category->term_id); ?>
    -------------- 
    <div class='menu'>
    <?php foreach ($posts_array as $post) : ?>
    <ul>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    </ul>
    <?php endforeach; ?>
    </div>
    
   --------------
    <div class='posts'> 
    <?php foreach ($posts_array as $post) : ?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <p><?php echo $post->post_excerpt ?></p>
        <p><?php echo get_the_post_thumbnail() ?></p>
    <?php endforeach; ?>
    </div>
<?php } ?>



<!-- ############### END OF EDITS ###############  -->

    </div><!-- /#content -->
	<?php woo_content_after(); ?>
		
<?php get_footer(); ?>