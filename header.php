<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title><?php bloginfo('name'); ?></title>

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <?php wp_head();
    global $wp;
    $current_url = home_url(add_query_arg(array(),$wp->request));
    ?>
  </head>
  <body>
    <?php function set_src_image(){
     if (is_home()): ?>
        <?php header_image(); ?>
      <?php else: ?>
        <?php if (has_post_thumbnail()): ?>
          <?php echo get_the_post_thumbnail_url(); ?>
        <?php else: ?>
            <?php header_image(); ?>
        <?php endif; ?>
      <?php endif;
    } ?>
    <header class="intro-header" style="background-image: url('<?php  set_src_image();?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1> <?php is_home() ? bloginfo('name') : the_title(); ?></h1>
                        <hr class="small">
                        <!-- <span class="subheading"><?php bloginfo('description'); ?></span> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav  class="navbar navbar-default navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><?php if (function_exists('the_custom_logo')): ?>
                  <?php the_custom_logo(); ?>
                <?php else: ?>
                  <?php bloginfo('name'); ?>
                <?php endif; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php
       wp_nav_menu( array(
           'menu'              => 'primary',
           'theme_location'    => 'primary',
           'depth'             => 2,
           'container'         => 'div',
           'container_class'   => 'collapse navbar-collapse',
           'container_id'      => 'bs-example-navbar-collapse-1',
           'menu_class'        => 'nav navbar-nav navbar-right',
           'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
           'walker'            => new WP_Bootstrap_Navwalker())
       );
   ?>
        </div>
        <!-- /.container-fluid -->
    </nav>
