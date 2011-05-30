<?php
/**
 * The Mainstage area at top of page.
 *
 * @package WordPress
 * @subpackage Skin_Clinic
 * @since Skin Clinic 1.0
 */

	/**
	 * Get 'Advertisement' custom fields values from Simple Fields
	 */
	$advertisements = simple_fields_get_post_group_values($post->ID, 1, false, 2);
?>
<?php if ($advertisements): ?>
	
	<ul class="mainstage-teasers">
		<?php foreach ($advertisements as $key => $value): ?>
			<li>
			<?php if ($value[1]): ?><h2><?php print $value[1]; ?></h2><?php endif; ?>
			<?php if ($value[2]): ?><div class="desc"><?php print $value[2]; ?></div><?php endif; ?>
			<?php if ($value[3]): ?><?php print wp_get_attachment_image( $value[3], 'advertisement', FALSE ); ?> <?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>

<?php endif; ?>