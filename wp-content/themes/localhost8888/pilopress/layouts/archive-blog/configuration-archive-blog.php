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

add_action( 'wp_ajax_select_category_post', 'select_category_post' );
add_action( 'wp_ajax_nopriv_select_category_post', 'select_category_post' );

function select_category_post(){
    if( 
		! isset( $_REQUEST['nonce'] ) or ! wp_verify_nonce( $_REQUEST['nonce'], 'select_category_post' ) ) {
    	wp_send_json_error( "Vous n’avez pas l’autorisation d’effectuer cette action.", 403 );
  	}
    if( ! isset( $_POST['categorie_slug'] ) ) {
    	wp_send_json_error(  'Ca marche pas', 403 );
  	}
    

    $categorie_slug = $_POST['categorie_slug'];
    if($categorie_slug !=  'all'){
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'order' => 'DESC',
            'orderby' => 'date',
            'category_name' => $categorie_slug
        );
    }else{
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'order' => 'DESC',
            'orderby' => 'date',
        );
    }
   
    $the_query = new WP_Query( $args );
    $html = '';
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $fields= get_field('pip_flexible');
        $html .='<article class="w-full py-5  pb-16 shadow-xl rounded-lg relative">
            <h3 class="h3 px-3">'.get_the_title().'</h2>
            <div class="flex-none w-full relative h-72">'.get_the_post_thumbnail().'</div>';
            if(isset($fields[0]['content'])):
                $html .='<div class="flex-none my-3 px-3 w-full text-ellipsis overflow-hidden max-h-[6rem]">
                '.$fields[0]['content'].'</div>';
            endif;
            $html .='<a class="btn-primary mx-3 absolute bottom-5 right-2" href="'.get_permalink().'">Voir l\'article</a></article>';
        //get_template_part('card');
    endwhile; ?>
    <?php wp_send_json_success( $html );
}

