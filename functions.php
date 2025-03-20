<?php
function mytheme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'mytheme' ),
    ) );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

function mytheme_scripts() {
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );


function add_acf_image_url_to_api($response, $object, $request) {
    $product_id = $object->get_id();
    $custom_image_id = get_post_meta($product_id, 'custom_image1', true);

    if ($custom_image_id) {
        $image_url = wp_get_attachment_url($custom_image_id);
        $response->data['custom_image1'] = $image_url;
    }

    return $response;
}

add_filter('woocommerce_rest_prepare_product', 'add_acf_image_url_to_api', 10, 3);


/*
function add_custom_image_to_woocommerce_api($response, $object, $request) {
    // Ensure ACF function exists
    if (function_exists('get_field')) {
        echo $custom_image = get_field('custom_image1', $object->id);

        if ($custom_image) {
            if (is_array($custom_image)) {
                $custom_image = $custom_image['url']; // Convert to URL if needed
            }
            $response->data['custom_image1'] = $custom_image;
        } else {
            $response->data['custom_image1'] = null; // Return null if no image
        }
    }
    return $response;
}

// Attach filter to WooCommerce REST API response
add_filter('woocommerce_rest_prepare_product', 'add_custom_image_to_woocommerce_api', 10, 3);

*/