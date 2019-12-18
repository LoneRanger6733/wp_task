<?php
/**
 * Plugin Name: MeSubscribe
 * Plugin URI: http://localhost/wp_task
 * Description: Subscription Management.
 * Version: 0.0.1
 * Author: Komalavasan
 * Author URI: http://localhost/wp_task
 * License: GPLv2 or later
 *   Text Domain: MeSubscribe-plugin
 */
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/


defined( 'ABSPATH' ) or die( 'Page not Accessible!' );

if ( ! function_exists( 'add_action' ) ) {
	echo 'Page not Accessible!';
	exit;
}


class MeSubscribe
{
    
    function activate() {
        
		flush_rewrite_rules();
	}
    
	function deactivate() {
        add_shortcode( 'sub_form', '__return_false' );
		flush_rewrite_rules();
	}
}

if ( class_exists( 'MeSubscribe' ) ) {
	$mesubscribe = new MeSubscribe();
}

// Plugin_activation
register_activation_hook( __FILE__, array( $mesubscribe, 'activate' ) );

// Plugin_deactivation
register_deactivation_hook( __FILE__, array( $mesubscribe, 'deactivate' ) );

function form_html()
    {
       $form = "";
   
       $form .='<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
       $form .= '<input type="text" name="sub_name"  value="' . ( isset( $_POST["sub_name"] ) ? esc_attr( $_POST["sub_name"] ) : '' ) . '" placeholder ="Name" required/> <br />';
       $form .= '<input type="text" name="sub_email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" value="' . ( isset( $_POST["sub_email"] ) ? esc_attr( $_POST["sub_email"] ) : '' ) . '" placeholder ="Email" required/> <br />';
       $form .= '<input type="text" name="sub_phone" pattern="\d*" value="' . ( isset( $_POST["sub_phone"] ) ? esc_attr( $_POST["sub_phone"] ) : '' ) . '" placeholder ="Phone" required/> <br />';
      
       return $form; 
   }
   

add_shortcode('sub_form', 'form_html');

include_once 'sub_submit_form.php';

include_once 'sub_push_pub_notify.php';




 ?>