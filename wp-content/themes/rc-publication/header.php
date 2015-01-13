<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Red Cross Publications
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/fancybox/jquery.fancybox.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css">
</head>
<?php 
	$issue_page = false;
  if (is_category()) {
  	$category_page = true;
  	$cat = get_category($cat);
  	if ($cat->category_parent != 0) {
  	$issue_page = true;
  	$cat_parent_name = get_category($cat->category_parent);
	  $cat_parent_name = $cat_parent_name->cat_name;
	  $san_title = sanitize_title($cat_parent_name);
  }
}
?>
<body <?php body_class($san_title); ?>>	

<!-- #1: BEGIN SUPERTAG TOP CODE v2.2.9.1 -->
<script type="text/javascript">
var superT_dcd=new Date();
document.write("\x3Cscr"+"ipt type=\"text/javascript\" src=\""+"//c.supert.ag/red-cross-australia/red-cross/"+"supertag.js?_dc="+Math.ceil(superT_dcd.getUTCMinutes()/5,0)*5+superT_dcd.getUTCHours().toString()+superT_dcd.getUTCDate()+superT_dcd.getUTCMonth()+superT_dcd.getUTCFullYear()+"\"\x3E\x3C/scr"+"ipt\x3E");
</script>
<!-- Do NOT remove the following <script>...</script> tag: SuperTag requires
the following as a separate <script> block -->
<script type="text/javascript">
if(typeof superT!="undefined"){if(typeof superT.t=="function"){superT.t();}}
</script>
<!-- #1: END SUPERTAG TOP CODE -->

<div class="container">
	<div class='wrapper'>
		<div class="masthead" class="site-header" role="banner">
			<div class='clear'>
				<p class='header-text alignright'><?php the_field('header_text', 'option');?></p>
			</div>
			<div class="site-branding">
				<a href="http://www.publications.redcross.org.au" class='alignleft'><?php echo (half_image(get_field('main_logo', 'option'))); ?></a>
				<a href='http://www.redcross.org.au/publications.aspx' class='header-title alignright hide-small'>Publications</a>
				<div class='search-form alignright'><?php get_search_form(); ?></div>				
				<div class='clear'></div>
				<div id='navigation-toggle' class='navigation-toggle'>
					<a class='btn'>View menu</a>
				</div>
			</div>

			<div id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div><!-- #site-navigation -->
			<div class='clear'></div>
		</div><!-- #masthead -->

		<div id="content" class="site-content clear">
			<div class='header-box'>
				<?php include(locate_template('template_heading.php')); ?>
				<div class='clear'></div>
			</div>
			<?php if (!is_page() && !$issue_page && !is_single() && !is_tag() &&!is_search()) { ?>
			<div class='sort-by'>
					<div id="sort-buttons" class='sort-buttons alignleft'>
						<p><b>Sort:</b></p> 
						<a class='btn active' data-sort-by="date">Newest</a>
						<a class='oldest btn' data-sort-by="date">Oldest</a>
						<?php if (!is_category()) { ?>
						<a class='btn' data-sort-by="publication">Publication</a>
						<?php } ?>
					</div>
					<div class='social-buttons alignright'>
						<?php $current_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>
						<b><a class='btn social twitter' href="https://twitter.com/intent/tweet?text=Red%20Cross%20Publications%20-%20&url=<?php echo $current_url ?>&via=redcrossau&related=redcrossau" rel="nofollow" target="_blank" title="Share on Twitter">Twitter</a></b>  <b><a href="https://facebook.com/sharer.php?u=<?php echo $current_url ?>" class='btn social facebook' rel="nofollow" target="_blank" title="Share on Facebook">Facebook</a></b>
					</div>
			</div>
			<div class='clear'></div>
			<?php } ?>

		<!-- #content continues -->
	<!-- #wrapper continues -->
<!-- #container continues -->
