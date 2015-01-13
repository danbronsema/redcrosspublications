<?php
/**
 * The category template file.
 *
 * @package Red Cross Publications
 */

get_header(); ?>

	<div id="primary" class="content-area">

	<!-- ############### ARTICLE LISTING ###############  -->
	<?php
	    if (is_category()) {
	        $this_category = get_category($cat);
	    }
	    if($this_category->category_parent) {
	        $parent_category = get_categories('child_of='.$this_category->category_parent); } 
	    else {
	        $child_category = get_categories('child_of='.$this_category->cat_ID);
	        ?>
	      	<div class='issue-list' id='issue-list'>
					<?php	foreach ($child_category as $cat) :
						include(locate_template('template_issue_list.php')); 
					endforeach; ?>
					<div class='clear'></div>
				</div>
				<?php
	    }
	?>

  <!-- ######### INDIVIDUAL ISSUE LISTING ############  -->
	<?php if ($parent_category) { 
		if (function_exists('z_taxonomy_image_url')) { 
		$feature_image_url = z_taxonomy_image_url($cat->term_id); 
	}

	$posttags = get_the_tags('around-australia');
	foreach($posttags as $tag) {
		if ($tag->name == "around-australia") {
			$around_australia_tag_id = $tag->term_id;
		}
	}

	$args = array (
		'orderby' => 'menu_order',
		'posts_per_page' => '-1',
		'category' => $this_category->term_id,
		'tag__not_in' => array('47')
		);
	$posts_array = get_posts($args);

	$around_australia_args = array (
		'orderby' => 'menu_order',
		'posts_per_page' => '-1',
		'category' => $this_category->term_id,
		'tag' => 'around-australia'
		);
	$around_australia_posts_array = get_posts($around_australia_args);

	?>
	<!-- Image for the individual issue -->
	<?php $image = get_field('issue_image', "category_{$cat}"); ?>

	<div class='the-issue'>
		<div class='the-issue-header' style="background-image:url(<?php echo $image_url = (!empty($image)) ? $image['url'] : $feature_image_url; ?>)">
			<a class='show-small' id='issue-menu'>View Contents</a>
			<div class='hide-small the-issue-menu'>
				<ul>
					<div class='issue-number'><?php echo get_field('issue_text', "category_{$cat}"); ?></div>
					<?php foreach ($posts_array as $post) : ?>
			    <li><a href="<?php the_permalink(); ?>" data-fancybox-type="iframe" class="fancybox" id="<?php the_ID(); ?>" data-class="<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></li>
			    <?php endforeach; ?>
					
					<?php if (!empty($around_australia_posts_array)) { ?>
					<a id='around-australia'>+ Around Australia</a>
					<ul class='around-australia' id='around-australia-menu'>
					<?php foreach ($around_australia_posts_array as $post) : ?>
			    	<li><a href="<?php the_permalink(); ?>" data-fancybox-type="iframe" class="fancybox" id="<?php the_ID(); ?>" data-class="<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></li>
			    <?php endforeach;?>			     
			    </ul>
			    <?php } ?>
				</ul>
			</div>
			<div class='show-small'>
				<img src='<?php echo $feature_image_url ?>' />
			</div>			
			<div class='clear'></div>
		</div>
		
  	<div class='issue-list' id='issue-list'>
		<?php foreach($posts_array as $post) :
			include(locate_template('template_post_list.php')); 
    endforeach; ?>
    <div class='clear'></div>
		</div>

	</div>


<?php } ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php if (!empty(get_field('issue_color', "category_{$cat}"))) { ?>
<style>
.header-box {
	background-color:<?php the_field('issue_color', "category_{$cat}"); ?>;	
}
.the-issue .issue:hover .issue-details {
	background-color:<?php the_field('issue_color', "category_{$cat}"); ?>;		
}
.the-issue .issue-details .btn {
	background-color:<?php the_field('issue_color', "category_{$cat}"); ?>;			
}
.the-issue .issue-details {
	border-bottom-color:<?php the_field('issue_color', "category_{$cat}"); ?>;
}
.the-issue-menu a:hover {
	background-color:<?php the_field('issue_color', "category_{$cat}"); ?>;			
}
</style>
<?php } ?>


