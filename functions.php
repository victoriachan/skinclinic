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

// OUr Treatment page id
define('SKINCLINIC_TREATMENT_PAGE_ID', 7);

/**
 * Custom helper functions
 * Returns array
 */
function skinclinic_get_page_advertisements ($postid) {
  $advertisements = simple_fields_get_post_group_values($postid, 1, false, 2);
  // Don't show advertisements that do not have a description field.
  // Bug in simple fields does not delete field when blank
  foreach ($advertisements as $key => $field) {
    if (!strlen($field[2])) {
      unset($advertisements[$key]);
    }
  }
  array_merge($advertisements);
  return $advertisements;
}

/**
 * Prints classes for #main div
 */
function skinclinic_additional_classes() {
  global $post;
  if(count(skinclinic_get_page_advertisements($post->ID)) > 0) {
    print 'has-mainstage';
  } else {
    print 'no-mainstage';
  }
}


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
 register_sidebar( array(
    'admin_menu_order' => 1400,
    'name' => __( 'Below top menu', 'skinclinic' ),
    'id' => 'secondary-menu',
    'description' => __( 'SkinClinic below top menu', 'skinclinic' ),
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    'function'    => 'skinclinic_secondary_menu_widget',
  ) );
  register_sidebar( array(
    'admin_menu_order' => 1500,
    'name' => __( 'Page footer', 'skinclinic' ),
    'id' => 'page-footer',
    'description' => __( 'SkinClinic page footer widget area', 'skinclinic' ),
    'before_widget' => thematic_before_widget(),
    'after_widget' => thematic_after_widget(),
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
    'function'    => 'skinclinic_page_footer_widget',
  ) );
}
/** Register sidebars by running skinclinic_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'skinclinic_widgets_init' );

function skinclinic_secondary_menu_widget() {
  global $post;
  if (($post->ID == SKINCLINIC_TREATMENT_PAGE_ID) OR ($post->ancestors && in_array(SKINCLINIC_TREATMENT_PAGE_ID, $post->ancestors))) {
    if (is_active_sidebar('secondary-menu')) {
      dynamic_sidebar('secondary-menu');
    }
  }
}
function skinclinic_page_footer_widget() {
  if (is_active_sidebar('page-footer')) {
    echo thematic_before_widget_area('page-footer');
    dynamic_sidebar('page-footer');
    echo thematic_after_widget_area('page-footer');
  }
}
// Located in sidebar-page-bottom.php
function thematic_abovepagefooter() {
  echo '<div id="page-footer-wrapper">';
  do_action('thematic_abovepagefooter');
}
function thematic_belowpagefooter() {
  do_action('thematic_belowpagefooter');
  echo '</div>';
}

/**
 * Use h2 for widgets
 */
// CSS markup before the widget title
//function childtheme_before_title() {
//  $content = "<h2 class=\"widgettitle\">";
//  return apply_filters('childtheme_before_title', $content);
//}
//add_filter('thematic_before_title','childtheme_before_title');
//// CSS markup after the widget title
//function childtheme_after_title() {
//  $content = "</h2>\n";
//  return apply_filters('childtheme_after_title', $content);
//}
//add_filter('thematic_after_title','childtheme_after_title');


/**
 * ********************************************
 *  Sidebars / Output
 * ********************************************
 */
 
/**
 * Add wrapper div around entire content
 */
function childtheme_before() {
  ?>
    <div id="additional-background" class="<?php skinclinic_additional_classes() ?>" >
  <?php
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

function childtheme_override_postheader() {
  global $post; 
  if (is_home() || is_front_page()) {
    return; // Don't output h1 header for homepage
  } elseif ( is_404() || $post->post_type == 'page') {
       $postheader = thematic_postheader_posttitle();        
   } else {
       $postheader = thematic_postheader_posttitle() . thematic_postheader_postmeta();    
   }  
   echo apply_filters( 'thematic_postheader', $postheader ); // Filter to override default post header
}

/**
 * Show secondary menu widget
 */
function childtheme_override_access() { ?>
  <div id="access">
    
    <div class="skip-link"><a href="#content" title="<?php _e('Skip navigation to the content', 'thematic'); ?>"><?php _e('Skip to content', 'thematic'); ?></a></div><!-- .skip-link -->
    
    <?php 
    
      if ((function_exists("has_nav_menu")) && (has_nav_menu(apply_filters('thematic_primary_menu_id', 'primary-menu')))) {
        echo  wp_nav_menu(thematic_nav_menu_args());
      } else {
        echo  thematic_add_menuclass(wp_page_menu(thematic_page_menu_args()));  
      }
      
    ?>
    
  </div><!-- #access -->
  <?php skinclinic_secondary_menu_widget(); ?>
<?php }

/**
 * Show our footer widget
 */
function childtheme_abovefooter() {
  print get_sidebar('page-footer');
}
add_filter('thematic_abovefooter','childtheme_abovefooter');

/**
 * Add mainstage
 */
function childtheme_belowheader() {
  get_sidebar('mainstage');
}
add_filter('thematic_belowheader','childtheme_belowheader');

?>