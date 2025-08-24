<?php

require_once('functions/functions-helpers.php'); 		// PHP/Wordpress Utility Functions
require_once('functions/functions-admin.php'); 			// Modify Wordpress Admin UI
require_once('functions/functions-email.php'); 			// Contact Form API
require_once('functions/functions-theme.php'); 			// Theme Setup & Config
require_once('functions/functions-blocks.php');     // Theme Blocks (requires ACF)
// require_once('functions/functions-widgets.php');     // NEW - Widgets
require_once('functions/functions-shortcodes.php');     // NEW - Shortcodes

// ACF Options
require_once get_template_directory() . '/functions/acf-options.php';

// Allow SVG Upload
add_filter('upload_mimes', 'cristianarmeanu_svg_upload_mimes');
function cristianarmeanu_svg_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}




/**
 * Optimized Google Fonts: Space Grotesk (500,700) + Inter (400,600)
 * - Preconnects
 * - Preload stylesheet (higher priority)
 * - Non-blocking load with media=print trick + noscript fallback
 */
function cristi_enqueue_fonts_optimized() {
    if ( is_admin() ) return; // front-end only

    // Build a single Google Fonts CSS URL with only the weights you use
    $gf_url = 'https://fonts.googleapis.com/css2'
            . '?family=Space+Grotesk:wght@500;700'
            . '&family=Inter:wght@400;600'
            . '&display=swap';

    // Preconnects (keep early; helps both DNS + TLS)
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";

    // Preload the stylesheet so the browser requests it ASAP
    echo '<link rel="preload" as="style" href="' . esc_url( $gf_url ) . '">' . "\n";

    // Load non-blocking (prevents render blocking)
    echo '<link rel="stylesheet" href="' . esc_url( $gf_url ) . '" media="print" onload="this.media=\'all\'">' . "\n";

    // Fallback for no-JS
    echo '<noscript><link rel="stylesheet" href="' . esc_url( $gf_url ) . '"></noscript>' . "\n";
}
add_action( 'wp_head', 'cristi_enqueue_fonts_optimized', 1 );

