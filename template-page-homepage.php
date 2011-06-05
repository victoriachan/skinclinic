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

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();
?>

    <div id="container">
      <?php thematic_abovecontent(); ?>
    
      <div id="content">
  
              <?php
          
              // calling the widget area 'page-top'
              get_sidebar('page-top');
  
              the_post();
              
              thematic_abovepost();
          
              ?>
              
        <div id="post-<?php the_ID();
          echo '" ';
          if (!(THEMATIC_COMPATIBLE_POST_CLASS)) {
            post_class();
            echo '>';
          } else {
            echo 'class="';
            thematic_post_class();
            echo '">';
          }
                  
                  // creating the post header
                  thematic_postheader();
                  
                  ?>
                  
          <div class="entry-content">
  
                      <?php
                      
                      the_content();
                      
                      wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'thematic'), "</div>\n", 'number');
                      
                      edit_post_link(__('Edit', 'thematic'),'<span class="edit-link">','</span>') ?>
  
          </div>
        </div><!-- .post -->
  
          <?php
          
          thematic_belowpost();
          
          // calling the comments template
          thematic_comments_template();
          
          // calling the widget area 'page-bottom'
          get_sidebar('page-bottom');
          
          ?>
  
      </div><!-- #content -->
      
      <?php thematic_belowcontent(); ?> 
      
    </div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();
    
    // calling footer.php
    get_footer();

?>