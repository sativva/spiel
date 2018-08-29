<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spielstation
 */

?>

	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_template_part( 'components/footer/footer' ); ?>
	</footer>
</div>

<?php wp_footer(); ?>

	<script src="<?php echo get_template_directory_uri();?>/assets/js/vendors/jquery-1.12.0.min.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/assets/js/vendors/fancySelect.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/assets/js/vendors/scrollingBar.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/assets/js/vendors/unslider-min.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/assets/js/global.js"></script>
	<!--<script src="http://localhost:3000/spielstation/spielstation-wp/wp-content/themes/spielstation/assets/js/global.js"></script>-->

</body>
</html>
