<?php
/**
 * The Mainstage area at top of page as output by simple fields Advertisement fieldgroup
 *
 * @package WordPress
 * @subpackage Skin_Clinic
 * @since Skin Clinic 1.0
 */

  /**
   * Get 'Advertisement' custom fields values from Simple Fields
   */
  $advertisements = skinclinic_get_page_advertisements($post->ID);
  
?>
<?php if ($advertisements): ?>
  <div id="mainstage">
  <ul class="mainstage-teasers">
    <?php foreach ($advertisements as $key => $value): ?>
      <li>
      <?php if ($value[1] || $value[2]): ?>
        <div class="text-content">
        <?php if ($value[1]): ?><h2><?php print $value[1]; ?></h2><?php endif; ?>
        <?php if ($value[2]): ?><div class="desc"><?php print $value[2]; ?></div><?php endif; ?>
        </div>
      <?php endif; ?>
      <?php if ($value[3]): ?><div class="image"><?php print wp_get_attachment_image( $value[3], 'full', FALSE ); ?></div><?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
  </div>
<?php endif; ?>