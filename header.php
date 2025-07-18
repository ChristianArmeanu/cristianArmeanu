<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="msapplication-TileColor" content="#072a3a" />
        <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/assets/img/favicon.ico">
     
        <!-- GOOGLE FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=62559ca480366d0019fc1aff&product=sop' async='async'></script>
        
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <?php
            if (is_front_page()) {
                get_template_part('intro');
            }
        ?>
        <header id="app-header">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-4">
                    <a aria-label="Visit our Homepage" title="<?php echo get_bloginfo('name'); ?>" href="<?php echo get_bloginfo('wpurl'); ?>">
                        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/cristian-logo-white.png" alt="<?php echo get_bloginfo('name'); ?>"> 
                    </a>

                    </div>
                    <div class="col-6 col-lg-8 col-xl-8 d-flex justify-content-end align-self-center">
                    <div class="menu-header">
                        <ul class="menu">
                            <li><a class="links" href="#hero">Home</a></li>
                            <li><a class="links" href="#about">About</a></li>
                            <li><a class="links" href="#skills">Skills</a></li>
                            <li><a class="links" href="#portfolio">Portfolio</a></li>
                            <li><a class="links" href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="mobile-menu-toggle">
                        <span class="line line1"></span>
                        <span class="line line2"></span>
                        <span class="line line3"></span>
                    </div>
                </div>
            </div>
        </header>
        <main id="app">