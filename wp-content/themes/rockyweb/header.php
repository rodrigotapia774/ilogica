<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rockyweb
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-floating">
    <div class="container">
      <a class="navbar-brand" href="#">
			  <img width="40" src="<?php echo get_template_directory_uri() . '/assets/favicon.png' ?>">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggler">
			  <?php
			  wp_nav_menu( array(
			    'theme_location' => 'menu-1',
			    'menu_id'        => 'primary-menu',
			    'depth'          => 1,
			    'container'      => false,
			    'menu_class'     => 'navbar-nav ml-lg-5 mt-3 mt-lg-0',
			    'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
			    'walker'         => new WP_Bootstrap_Navwalker(),
		    ));?>
      </div>
    </div>
  </nav>