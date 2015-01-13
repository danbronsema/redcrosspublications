<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Red Cross Publications
 */
?>

	</div><!-- #content -->
	</div><!-- #wrapper -->
  <div class="push"></div>
	</div><!-- #container -->


	<div id="colophon" class="footer-wrapper" role="contentinfo">
		<div class='wrapper'>
			<div class="site-info">
				<div class='alignleft left-footer'>
					<div class="standard-footer"><?php the_field('footer_text', 'option'); ?></div>
					<div class="unpacked-footer"><?php the_field('unpacked_text', 'option'); ?></div>
				</div>
				<div class='alignright right-footer'>
					<?php $footer_image = get_field('footer_logo', 'option'); 
					$url = $footer_image['url'];
					$width = $footer_image['width']/3;
					$height = $footer_image['height']/3;
					?>
					<img src='<?php echo $url ?>' width='<?php echo $width ?>' width='<?php echo $height ?>'>
					<p></p>
				</div>

			</div><!-- .site-info -->
		</div>
		<div class='clear'> </div>
	</div><!-- #colophon -->
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/inc/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/rcpublication-scripts.js"></script>

<!-- #2: BEGIN SUPERTAG BOTTOM CODE v2.2.9.1 -->
<script type="text/javascript">
if(typeof superT!="undefined"){if(typeof
superT.b=="function"){superT.b();}}
</script>
<!-- Do NOT remove the following <script>...</script> tag: SuperTag
requires the following as a separate <script> block -->
<script type="text/javascript">
if(typeof superT!="undefined"){if(typeof
superT.b2=="function"){superT.b2();}}
</script>
<!-- #2: END SUPERTAG BOTTOM CODE -->

</body>
</html>
