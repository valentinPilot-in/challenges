<?php 

if ( !has_action( 'wp_enqueue_scripts', 'pip_enqueue_script_splide' ) ) {
    add_action( 'wp_enqueue_scripts', 'pip_enqueue_script_splide' );
    function pip_enqueue_script_splide() {

        // Enqueue only on front
        if ( is_admin() ) {
            return;
        }

        // Enqueue script
        if ( !wp_script_is( 'splide' ) ) {
            wp_enqueue_script( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js', array( 'jquery' ), '2.4.21', true );
        }

        // Enqueue style
        if ( !wp_style_is( 'splide' ) ) {

            //Core only to be able to style arrows without overriding
            wp_enqueue_style( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide-core.min.css', array(), '2.4.21' );
        }

        if(!wp_script_is('tailwind')){
            wp_enqueue_script( 'tailwind', 'https://cdn.tailwindcss.com');
        }
    }
}