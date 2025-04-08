<?php
function disable_add_to_cart_button() {
    if (is_admin()) return;

    wc_enqueue_js("
        jQuery(document).ready(function($) {
            $('.add_to_cart_button, .single_add_to_cart_button').on('click', function(e) {
                e.preventDefault();
                alert('It is not possible to place an order for the next 15 days.');
            });

            $('.add_to_cart_button').removeClass('ajax_add_to_cart').addClass('disabled');
            $('.single_add_to_cart_button').prop('disabled', true);
        });
    ");
}
add_action('wp_enqueue_scripts', 'disable_add_to_cart_button');

function disable_cart_checkout() {
    wc_add_notice('It is not possible to place an order for the next 15 days.', 'error');
    return false;
}
add_filter('woocommerce_add_to_cart_validation', 'disable_cart_checkout', 10, 2);
?>