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
  <div id="mainstage"><div class="mainstage-inner">
  <ul<?php if (count($advertisements) > 1) { print ' id="mainstage-carousel"'; } ?> class="mainstage-teasers mainstage-teasers-<?php print count($advertisements) > 1? 'multiple' : 'single'; ?>">
    <?php foreach ($advertisements as $key => $value): ?>
      <li class="mainstage-teaser-<?php print $key ?>"><div class="outer-wrapper"><div class="inner-wrapper">
      <?php if ($value[1] || $value[2]): ?>
        <div class="text-content" <?php if ($value[4]) { print ' style ="' . $value[4] . '"'; } ?>>
        <?php if ($value[1]): ?><h2><?php print $value[1]; ?></h2><?php endif; ?>
        <?php if ($value[2]): ?><div class="desc"><?php print $value[2]; ?></div><?php endif; ?>
        </div>
      <?php endif; ?>
      <?php if ($value[3]): ?><div class="image"><?php print wp_get_attachment_image( $value[3], 'full', FALSE ); ?></div><?php endif; ?>
      </div></div></li>
    <?php endforeach; ?>
  </ul>
  </div></div>
<?php endif; ?>