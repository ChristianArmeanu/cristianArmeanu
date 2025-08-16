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
