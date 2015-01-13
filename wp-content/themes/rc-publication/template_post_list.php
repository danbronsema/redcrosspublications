<a href="<?php echo get_permalink(); ?>" class="alignleft issue fancybox">
	<?php if (has_post_thumbnail()) {
		$featured_post_image = wp_get_attachment_url( get_post_thumbnail_id());
		echo "<img src='$featured_post_image' class='hide-small' />";}
	?>
	<div class='issue-details'>
		<h2 class='name'><?php echo the_title() ?></h2>
		<p><?php echo get_the_excerpt() ?></p>
		<span class='btn'>Read More</span>
	</div>
</a>