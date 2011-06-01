<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Skin_Clinic
 * @since Skin Clinic 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>
<?php if (1==2): // TODO: REMOVE ?>
			<div id="site-info">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div><!-- #site-info -->

			<div id="site-generator">
				<?php do_action( 'skinclinic_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'skinclinic' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'skinclinic' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'skinclinic' ), 'WordPress' ); ?></a>
			</div><!-- #site-generator -->
<?php endif; ?>
		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->
</div><!-- #additional-background -->
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
