<?php
/**
 * Template Name: Home page
 *
 * A custom home page template.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Skin_Clinic
 * @since Skin Clinic 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
				<?php
				/* Run the loop to output the page.
				 * If you want to overload this in a child theme then include a file
				 * called loop-page.php and that will be used instead.
				 */
				get_template_part( 'loop', 'page' );
				?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<div id="visit-us">
	<h2>Our location</h2>
	<div class="column-1">
	 <?php print skinclinic_get_map(); ?>
	 </div>
	 <div class="column-2">
	  <?php print pronamic_google_maps_description(); ?>
	 </div>
	 <div class="column-3">
	   <h3>Our opening hours</h3>
	   <p>to do</p>
	 </div>
</div><!-- #visit-us -->
<?php get_footer(); ?>
