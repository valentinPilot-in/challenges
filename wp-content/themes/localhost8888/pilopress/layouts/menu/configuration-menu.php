<?php 

if ( !has_action( 'wp_enqueue_scripts', 'pip_enqueue_script_tailwind' ) ) {
    add_action( 'wp_enqueue_scripts', 'pip_enqueue_script_tailwind' );
    function pip_enqueue_script_tailwind() {

        // Enqueue only on front
        if ( is_admin() ) {
            return;
        }

        // Enqueue script
        if(!wp_script_is('tailwind')){
            wp_enqueue_script( 'tailwind', 'https://cdn.tailwindcss.com');
        }
    }
}