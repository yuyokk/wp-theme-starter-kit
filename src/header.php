<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="<?php bloginfo('description'); ?>" />

    <title><?php wp_title(''); ?></title>

    <link rel="icon" type="image/png" href="http://example.com/myicon.png">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-navbar-collapse">
            <span class="sr-only"><?php _e('Toggle navigation', 'wp-theme-starter-kit'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="<?php echo site_url(); ?>">
            <?php bloginfo('name'); ?>
          </a>
        </div>

        <div class="collapse navbar-collapse" id="header-navbar-collapse">
          <?php wp_nav_menu(array(
            'theme_location' => 'header',
            'depth'       => 2,
            'container'   => false,
            'menu_class'  => 'nav navbar-nav',
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker'      => new wp_bootstrap_navwalker(),
          )); ?>
        </div><!-- .navbar-collapse -->
      </div><!-- .container -->
    </nav>

    <div class="container">
