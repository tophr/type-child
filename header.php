<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
  <!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-KQ7ERG626K"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

      gtag('config', 'UA-1588431-1');	
	  gtag('config', 'G-KQ7ERG626K');
	</script>
</head>
<body <?php body_class(); ?>>

  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'type' ); ?></a>

    <div class="mobile-navbar clear">
      <a id="menu-toggle" class="menu-toggle" href="#mobile-navigation" title="<?php esc_attr_e( 'Menu', 'type' ); ?>"><span class="button-toggle"></span></a>
      <?php if ( get_theme_mod( 'show_header_search', 1 ) ) { ?>
        <div class="top-search">
          <span id="top-search-button" class="top-search-button"><i class="search-icon"></i></span>
          <?php get_search_form(); ?>
        </div>
      <?php } // Search Icon ?>
    </div>
    <div id="mobile-sidebar" class="mobile-sidebar">
      <nav id="mobile-navigation" class="main-navigation mobile-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'type' ); ?>"></nav>
    </div>

    <header id="masthead" class="site-header <?php if ( get_header_image() ) { echo esc_attr('has-header-image'); } ?>" role="banner">
      <?php
      $header_template = sanitize_file_name( get_theme_mod('header_layout', 'header-layout1') );
      get_template_part( 'template-parts/header/' . $header_template );
      ?>
    </header>

    <?php if ( get_theme_mod( 'show_featured_posts' ) && ( is_home() || is_front_page() ) ) {
      get_template_part( 'template-parts/featured-posts' );
    } // Featured Posts ?>

    <div id="content" class="site-content">
      <div class="container">
        <div class="inside">
