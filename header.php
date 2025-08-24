<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="msapplication-TileColor" content="#1c1c1c" />
        <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/assets/img/favicon.ico">
     


        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#1c1c1c">

        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#1c1c1c">

        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <!-- For iOS 15+ (Safari address bar color, needs a background on body) -->
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">


        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=62559ca480366d0019fc1aff&product=sop' async='async'></script>
        

        <meta name="google-site-verification" content="4H7gn9eyq82t8z42YHqeb6kMYFgvqt7HsVXSLnE1h1g" />

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <?php
            if (is_front_page()) {
                get_template_part('intro');
            }
        ?>
        <header id="app-header">
            <div class="container-fluid" data-aos="fade">
                <div class="row">
                    <div class="col-6 col-md-2">
                        <a aria-label="Visit our Homepage" title="<?php echo get_bloginfo('name'); ?>" href="<?php echo get_bloginfo('wpurl'); ?>">
                            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-logo.png" alt="<?php echo get_bloginfo('name'); ?>"> 
                        </a>

                    </div>
                    <div class="col-6 col-md-10 col-lg-8 col-xl-8 d-flex justify-content-end justify-content-lg-center align-self-center">
                    <?php wp_nav_menu(array('theme_location' => 'header-primary', 'walker' => new MainMenuPrimary())); ?>

                        <div class="mobile-menu-toggle">
                            <span class="line line1"></span>
                            <span class="line line2"></span>
                            <span class="line line3"></span>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 d-none d-lg-flex justify-content-end align-self-center">
                        <div class="socials">
                            <div class="instagram">
                                <a aria-label="Instagram" href="https://www.instagram.com/cristian_armeanu/" target="_blank" rel="noopener noreferrer" class="links">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                            <div class="linkedin">
                                <a aria-label="LinkedIn" href="https://www.linkedin.com/in/cristian-armeanu-018b23230/" target="_blank" rel="noopener noreferrer" class="links">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>
        <main id="app">