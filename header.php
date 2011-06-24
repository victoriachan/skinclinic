<?php

    // Creating the doctype
    thematic_create_doctype();
    //echo " ";
    //language_attributes();
    echo ">\n";
    
    // Creating the head profile
    thematic_head_profile();

    // Creating the doc title
    thematic_doctitle();
    
    // Creating the content type
    thematic_create_contenttype();
    
    // Creating the description
    thematic_show_description();
    
    // Creating the robots tags
    thematic_show_robots();
    
    // Creating the canonical URL
    thematic_canonical_url();
    
    // Loading the stylesheet
    print "<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Dancing+Script' />";
    //print "<link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>";
    //print "<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>";
    //print "<link href='http://fonts.googleapis.com/css?family=Homemade+Apple' rel='stylesheet' type='text/css'>";
    thematic_create_stylesheet();
    
    // Facebook Open Graph Tags
    ?>
    <meta property="og:title" content="Surrey Skin &amp; Laser Clinic" />
    <meta property="og:type" content="company" />
    <meta property="og:url" content="http://www.surreyskinandlaserclinic.com/" />
    <meta property="og:image" content="http://www.surreyskinandlaserclinic.com/wp-content/themes/skinclinic/images/logo_color.png" />
    <meta property="og:site_name" content="Surrey Skin &amp; Laser Clinic" />
    <meta property="fb:admins" content="512283960" />
  <?php
    
    
    // Temporarily disable feeds
	//if (THEMATIC_COMPATIBLE_FEEDLINKS) {    
  //  	// Creating the internal RSS links
  //  	thematic_show_rss();
  //  
  //  	// Creating the comments RSS links
  //  	thematic_show_commentsrss();
  // 	}
    
    // Creating the pingback adress
    thematic_show_pingback();
    
    // Enables comment threading
    thematic_show_commentreply();

    // Calling WordPress' header action hook
    wp_head();
    
?>

</head>

<?php 

thematic_body();

// action hook for placing content before opening #wrapper
thematic_before(); 

if (apply_filters('thematic_open_wrapper', true)) {
	echo '<div id="wrapper" class="hfeed">';
}
    
    // action hook for placing content above the theme header
    thematic_aboveheader(); 
    
    ?>   

    <div id="header">
        <?php 
        get_sidebar('site-top');
        // action hook creating the theme header
        thematic_header();
        
        ?>

	</div><!-- #header-->
	<?php #skinclinic_secondary_menu_widget(); ?>
    <?php
    
    // action hook for placing content below the theme header
    thematic_belowheader();
    
    ?>   
    <div id="main">
    