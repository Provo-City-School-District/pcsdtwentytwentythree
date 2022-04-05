<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (is_home() ) {?>News | <?php } ?><?php if (is_page() ) {the_title();?> | <?php } ?><?php if ( is_single() ) {the_title(); ?> | <?php } ?><?php bloginfo('name'); ?></title>
    <meta property="og:title" content="<?php if (is_home() ) {?>News | <?php } ?><?php if (is_page() ) {the_title();?> | <?php } ?><?php if ( is_single() ) {the_title(); ?> | <?php } ?><?php bloginfo('name'); ?>">
    <meta property="og:type" content="website">









    <meta name="description" content="A simple HTML5 Template for new projects.">
    <meta name="author" content="SitePoint">
    <meta property="og:url" content="https://tech.provo.edu">
    <meta property="og:description" content="A simple HTML5 Template for new projects.">
    <?php
      if (has_post_thumbnail()) {
    ?>
        <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />
    <?php
      } else {
    ?>
        <meta property="og:image" content="https://provo.edu/wp-content/uploads/2018/03/provo-school-district-logo.jpg" />
    <?php
      }
    ?>
    <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:600" rel="stylesheet">







    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <h1 class="visuallyhidden">Website Title</h1>
    <a href="#siteWrapper" class="visuallyhidden skip-nav-link">skip navigation</a>
    <header id="mainHeader">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/pcsd-logo-website-header.png" alt="Provo City School District Logo" /></a>
      <nav id="mainNav">
      </nav>
      <aside id="mainHeaderInfo">
        <aside class="websiteSearch">
   		   <form id="cludo-search-form" action="/" method="get" autocomplete="off"><!-- Search Form -->
   				  <label for="s" class="visuallyhidden" id="websitesearch">Website Search: </label>
   				  <input class="search-input" aria-labelledby="websitesearch" id="s" name="s" type="text" value="<?php the_search_query(); ?>" placeholder="Search Provo.edu" />
   				  <input class="search-submit search-icon" type="submit" value="Search" />
   		   </form> <!-- end Search Form -->
         <p class="headerPhone" itemscope itemtype="https://schema.org/PostalAddress"><span itemprop="streetAddress">280 West 940 North Provo, Utah </span><span itemprop="telephone">801-374-4800</span></p>
   	   </aside>
      </aside>
    </header>
    <main id="siteWrapper">
      <?php custom_breadcrumbs(); ?>
