<?php

/*
 * Plugin Name: WooCommerce Shortcodes Kit
 * Plugin URI: http://disespubli.com/woocommerce-shortcodes-kit
 * Description: Creates a shortcode which can be displayed on any page or post to show user purchase orders & downloads.
 * Author: Alberto G.
 * Version: 1.0
 * Author URI: http://disespubli.com
 * Text Domain: WooCommerce Shortcodes Kit
 * Domain Path: /languages
 * License: GPL3

    Woocommerce Shortcodes Kit is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.
 
    Woocommerce Shortcodes Kit is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with Woocommerce Shortcodes Kit. If not, see https://www.gnu.org/licenses/gpl-3.0.en.html.
 */

    //Let's go!

//If you want show user purchase orders on any page or post, use this Shortcode: [my_orders]

function shortcode_my_orders( $atts ) {
    extract( shortcode_atts( array(
        'order_count' => -1
    ), $atts ) );

    ob_start();
    wc_get_template( 'myaccount/my-orders.php', array(
        'current_user'  => get_user_by( 'id', get_current_user_id() ),
        'order_count'   => $order_count
    ) );
    return ob_get_clean();
}
add_shortcode('my_orders', 'shortcode_my_orders');

//If you want show user downloads on any page or post, use this Shortcode: [my_downloads]

function shortcode_my_downloads( $atts ) {
    extract( shortcode_atts( array(
        'downloads' => -1
    ), $atts ) );

    ob_start();
    wc_get_template( 'myaccount/downloads.php', array(
        'current_user'  => get_user_by( 'id', get_current_user_id() ),
        'downloads'   => $downloads
    ) );
    return ob_get_clean();
}
add_shortcode('my_downloads', 'shortcode_my_downloads');