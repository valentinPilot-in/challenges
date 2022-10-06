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
    endwhile; 
                // $response = wp_remote_get( 'https://www.pilot-in.com/wp-json/wp/v2/posts');
    // try {
    //     // Note that we decode the body's response since it's the actual JSON feed
    //     $json = json_decode($response);
    //     foreach ($json as $article){
    //         $new_post = array(
    //             'ID' => $article['id'],
    //             'post_type' => 'articlespilot_in', // Custom Post Type Slug
    //             'post_status' => 'publish',
    //             'post_title' => $article['title']['rendered'],
    //           );
          
    //       wp_insert_post($new_post);
    //     }
 
    // } catch ( Exception $ex ) {
    //     $json = null;
    // } // end try/catch
 
    // var_dump($json); 
    // $json = json_decode($response['body']);
    // foreach ($json as $article){
    //     if ( get_page_by_title( $article->title->rendered ) == null ) {
    //         $new_post = array( 
    //             'post_type' => 'articlespilot_in', // Custom Post Type Slug
    //             'post_status' => 'publish',
    //             'post_title' => $article->title->rendered,
    //             );
    //         $post_id = wp_insert_post($new_post, true);
    //     }

    //     $the_slug = $article->slug;
    //     $args = array(
    //         'name'        => $the_slug,
    //         'post_type'   => 'articlespilot_in',
    //         'post_status' => 'publish',
    //     );
    //     $my_posts = get_posts($args);
    //     if( $my_posts ) {
    //         wp_send_json_success( $my_posts);
    //     }
    //     else {
    //         // wp_send_json_success( 'NON :'.$the_slug);
    //         $new_post = array( 
    //             'post_type' => 'articlespilot_in', // Custom Post Type Slug
    //             'post_status' => 'publish',
    //             'post_title' => $article->title->rendered,
    //             'name' => $the_slug,
    //         );
    
    //         $post_id = wp_insert_post($new_post, true);
    //     }
    //     // global $wpdb;
    //     // $articleTitle = $article->title->rendered;
    //     // $query = $wpdb->prepare(
    //     //     `SELECT ID FROM  $wpdb->posts 
    //     //     WHERE post_type = 'articlespilot_in'`
    //     // );
    //     //post_title = $articleTitle AND
    //     //AND post_status = 'publish'
    //     // $test = $wpdb->query( $query );
        
        
        
    //     // if ( $wpdb->num_rows ) {
    //     //     $post_id = $wpdb->get_var( $query );
    //     //     $meta = get_post_meta( $post_id, 'times', TRUE );
    //     //     $meta++;
    //     //     update_post_meta( $post_id, 'times', $meta );
    //     // } else {
    //     //     $new_post = array( 
    //     //         'post_type' => 'articlespilot_in', // Custom Post Type Slug
    //     //         'post_status' => 'publish',
    //     //         'post_title' => $article->title->rendered,
    //     //     );
    
    //     //     $post_id = wp_insert_post($new_post, true);
    //     // }
    wp_send_json_success( $html );
    }
   
