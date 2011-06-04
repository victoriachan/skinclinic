<?php

//
//  Custom Child Theme Functions
//

// I've included a "commented out" sample function below that'll add a home link to your menu
// More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
// http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
//function childtheme_menu_args($args) {
//    $args = array(
//        'show_home' => 'Home',
//        'sort_column' => 'menu_order',
//        'menu_class' => 'menu',
//        'echo' => true
//    );
//	return $args;
//}
//add_filter('wp_page_menu_args','childtheme_menu_args');

// Unleash the power of Thematic's dynamic classes 
define('THEMATIC_COMPATIBLE_BODY_CLASS', true);
define('THEMATIC_COMPATIBLE_POST_CLASS', true);

// Unleash the power of Thematic's comment form
define('THEMATIC_COMPATIBLE_COMMENT_FORM', true);

// Unleash the power of Thematic's feed link functions
define('THEMATIC_COMPATIBLE_FEEDLINKS', true);

/**
 * Don't display blog description, esp not as H1!
 */
function childtheme_override_blogdescription() { return; }

/**
 * Display site name as h1 on front page
 */
function childtheme_override_blogtitle() {
  $thistag = (is_home() || is_front_page()) ? 'h1' : 'div';
  ?>
    <<?php print $thistag ?> id="blog-title"><span><a href="<?php bloginfo('url') ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></span></<?php print $thistag ?>>
  <?php
}
add_action('thematic_header','childtheme_override_blogtitle',3);



?>