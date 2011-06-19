<?php
/**
 * The content area columns as output by simple fields Column fieldgroup
 *
 * @package WordPress
 * @subpackage Skin_Clinic
 * @since Skin Clinic 1.0
 */

	/**
	 * Get 'Column' custom fields values from Simple Fields
	 */
	$columns = simple_fields_get_post_group_values($post->ID, 3, false, 2);
?>
<?php if ($columns): ?>
	
	<div class="columns-group">
		<?php foreach ($columns as $key => $value): ?>
			<div class="column <?php print $key % 2 ? 'column-even' : 'column-odd'; ?>">
			<?php if ($value[1]): ?><h3><?php print $value[1]; ?></h3><?php endif; ?>
			<?php if ($value[3]): ?><div class="image"><?php print wp_get_attachment_image( $value[3], 'full', FALSE ); ?></div><?php endif; ?>
			<?php if ($value[2]): ?><div class="desc"><?php print $value[2]; ?></div><?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>

<?php endif; ?>