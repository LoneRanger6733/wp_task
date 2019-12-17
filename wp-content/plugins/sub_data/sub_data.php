<?php
/**
 * Plugin Name: Subscriber Data Capture
 * Plugin URI: http://localhost/wp_task
 * Description: perform data capture for users who click subscribe.
 * Version: 1.0
 * Author: Komalavasan
 * Author URI: http://localhost/wp_task
 */


 function form_html()
 {
    $form = "";

    $form .='<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    $form .= '<input type="text" name="sub_name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["sub_name"] ) ? esc_attr( $_POST["sub_name"] ) : '' ) . '" placeholder ="Name"/> <br />';
    $form .= '<input type="text" name="sub_email" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["sub_email"] ) ? esc_attr( $_POST["sub_email"] ) : '' ) . '" /> <br />';
    $form .= '<input type="text" name="sub_phone" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["sub_phone"] ) ? esc_attr( $_POST["sub_phone"] ) : '' ) . '" /> <br />';
   
    return $form; 
}

add_shortcode('sub_form', 'form_html');
 ?>