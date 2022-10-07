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
function getMeteo(){
    if(!get_transient( 'meteo')){
        $valueMeteo = wp_remote_get( 'https://api.openweathermap.org/data/2.5/weather?q=Lyon&appid=18b3f8c8fb78a6d386fc77c483242441&lang=fr&units=metric');
        $valueMeteo = json_decode($valueMeteo['body']);
        set_transient( 'meteo', $valueMeteo, '3600');
        $meteo = get_transient( 'meteo');
        return($meteo);
    }else{
        $meteo = get_transient( 'meteo');
        return($meteo);
    }
}
