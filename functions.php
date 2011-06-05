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
//  return $args;
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
 * ********************************************
 *  WIDGETS
 * ********************************************
 */

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override skinclinic_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Skin Clinic 1.0
 * @uses register_sidebar
 */
function skinclinic_widgets_init() {
  // Custom Area 1, located at the header area.
  register_sidebar( array(
    'admin_menu_order' => 1400,
    'name' => __( 'Page footer', 'skinclinic' ),
    'id' => 'page-footer',
    'description' => __( 'SkinClinic page footer widget area', 'skinclinic' ),
    'before_widget' => thematic_before_widget(),
    'after_widget' => thematic_after_widget(),
    'before_title' => thematic_before_title(),
    'after_title' => thematic_after_title(),
    'function'    => 'skinclinic_page_footer_widget',
  ) );
}
/** Register sidebars by running skinclinic_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'skinclinic_widgets_init' );

function skinclinic_page_footer_widget() {
  if (is_active_sidebar('page-footer')) {
    echo thematic_before_widget_area('page-footer');
    dynamic_sidebar('page-footer');
    echo thematic_after_widget_area('page-footer');
  }
}
// Located in sidebar-page-bottom.php
function thematic_abovepagefooter() {
  do_action('thematic_abovepagefooter');
}
function thematic_belowpagefooter() {
  do_action('thematic_belowpagefooter');
}

/**
 * Use h2 for widgets
 */
// CSS markup before the widget title
function childtheme_before_title() {
	$content = "<h2 class=\"widgettitle\">";
	return apply_filters('childtheme_before_title', $content);
}
add_filter('thematic_before_title','childtheme_before_title');
// CSS markup after the widget title
function childtheme_after_title() {
	$content = "</h2>\n";
	return apply_filters('childtheme_after_title', $content);
}
add_filter('thematic_after_title','childtheme_after_title');


/**
 * ********************************************
 *  Sidebars / Output
 * ********************************************
 */
 
/**
 * Add wrapper div around entire content
 */
function childtheme_before() {
  print '<div id="additional-background">';
}
add_filter('thematic_before','childtheme_before');
function childtheme_after() {
  print '</div><!-- #additional-background -->';
}
add_filter('thematic_after','childtheme_after');


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
    <<?php print $thistag ?> id="site-title"><span><a href="<?php bloginfo('url') ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></span></<?php print $thistag ?>>
  <?php
}
add_action('thematic_header','childtheme_override_blogtitle',3);

/**
 * Show our footer widget
 */
function childtheme_abovefooter() {
  //print get_sidebar('page-footer');
}
add_filter('thematic_abovefooter','childtheme_abovefooter');

?>