<?php

if ( !class_exists( 'Project' ) ) {

    /**
     * Class Project
     */
    class Project {

        /**
         * Project constructor.
         */
        public function __construct() {

            // Check for Pilo'Press first
            if ( !class_exists( 'PiloPress' ) ) {
                return;
            }

            // WP hooks
            add_action( 'init', array( $this, 'init_hook' ) );

            // Pilo'Press hooks
            add_filter( 'pip/tailwind/css/after_components', array( $this, 'add_custom_css' ) );

            // Local compilation
            /*add_filter( 'pip/tailwind_api', '__return_false' );
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_front' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin' ) );
            add_filter( 'mce_css', array( $this, 'editor_style' ), 20 );*/
        }

        /**
         * Init hook.
         */
        public function init_hook() {
            // Rename "Post" post type
            $get_post_type              = get_post_type_object( 'post' );
            $labels                     = pip_maybe_get( $get_post_type, 'labels' );
            $labels->name               = __( 'Actualités', 'pilot-in' );
            $labels->singular_name      = __( 'Actualités', 'pilot-in' );
            $labels->add_new            = __( 'Ajouter une actualité', 'pilot-in' );
            $labels->add_new_item       = __( 'Ajouter une actualité', 'pilot-in' );
            $labels->edit_item          = __( 'Éditer une actualité', 'pilot-in' );
            $labels->new_item           = __( 'Nouvelle actualité', 'pilot-in' );
            $labels->view_item          = __( 'Voir les actualités', 'pilot-in' );
            $labels->search_items       = __( 'Chercher une ctualités', 'pilot-in' );
            $labels->not_found          = __( 'Aucune actualité trouvée', 'pilot-in' );
            $labels->not_found_in_trash = __( 'Aucune actualité trouvée dans la corbeille', 'pilot-in' );
            $labels->all_items          = __( 'Toutes les actualités', 'pilot-in' );
            $labels->menu_name          = __( 'Actualités', 'pilot-in' );
            $labels->name_admin_bar     = __( 'Actualités', 'pilot-in' );

            // Remove "post_tag" taxonomy
            register_taxonomy( 'post_tag', array() );

            // Remove "product_tag" taxonomy
            register_taxonomy( 'product_tag', array() );

            // Rename "Category" taxonomy
            global $wp_taxonomies;
            $tax_labels                        = array(
                'name'          => __( "Catégorie d'actualités", 'pilot-in' ),
                'singular_name' => __( "Catégorie d'actualités", 'pilot-in' ),
                'menu_name'     => __( "Catégories d'actualités", 'pilot-in' ),
                'all_items'     => __( "Toutes les catégories d'actualités", 'pilot-in' ),
                'edit_item'     => __( "Éditer la catégorie d'actualités", 'pilot-in' ),
                'view_item'     => __( "Voir la catégorie d'actualités", 'pilot-in' ),
                'update_item'   => __( "Mettre à jour la catégorie d'actualités", 'pilot-in' ),
                'add_new_item'  => __( "Ajouter une catégorie d'actualités", 'pilot-in' ),
                'new_item_name' => __( "Nom de la nouvelle catégorie d'actualités", 'pilot-in' ),
                'parent_item'   => __( "Catégorie d'actualités parente", 'pilot-in' ),
                'search_items'  => __( "Chercher une catégorie d'actualités", 'pilot-in' ),
                'popular_items' => __( 'Éléments populaires', 'pilot-in' ),
            );
            $wp_taxonomies['category']->labels = (object) array_merge( (array) $wp_taxonomies['category']->labels, $tax_labels );
        }

        /**
         * Enqueue styles and scripts
         */
        public function enqueue_front() {
            // Your code here
        }

        /**
         * Enqueue styles and scripts
         */
        public function enqueue_admin() {
            // Enqueue Tailwind Styles
            $admin_style_path = PIP_THEME_ASSETS_PATH . PIP_THEME_STYLE_ADMIN_FILENAME . '.min.css';
            if ( file_exists( $admin_style_path ) ) {
                wp_enqueue_style(
                    'tailwind-styles-admin',
                    PIP_THEME_ASSETS_URL . PIP_THEME_STYLE_ADMIN_FILENAME . '.min.css',
                    null,
                    filemtime( $admin_style_path )
                );
            }
        }

        /**
         * Add custom editor style
         *
         * @param $stylesheets
         *
         * @return string
         */
        public function editor_style( $stylesheets ) {

            // Get stylesheets
            $stylesheets = explode( ',', $stylesheets );

            // Add custom stylesheet
            if ( file_exists( PIP_THEME_ASSETS_PATH . PIP_THEME_STYLE_FILENAME . '.min.css' ) ) {
                $stylesheets[] = PIP_THEME_ASSETS_URL . PIP_THEME_STYLE_FILENAME . '.min.css';
            }

            return implode( ',', $stylesheets );
        }

        /**
         * Add custom CSS for Tailwind compilation
         *
         * @return string
         */
        public function add_custom_css() {
            return file_get_contents( get_stylesheet_directory() . '/style.css' );
        }

    }

    /**
     * Instantiate class
     * Use "acf_get_instance( 'Project' )" to get class and use functions inside it
     *
     * @see acf_new_instance()
     * @see acf_get_instance()
     */
    if ( function_exists( 'acf_new_instance' ) ) {
        acf_new_instance( 'Project' );
    }






    add_action('init', '_pit_schedule_event_articles_pilotin');
    function _pit_schedule_event_articles_pilotin() {
        /**
         *  1. Add custom daily schedule
         */
        add_filter('cron_schedules', '_pit_daily_cron_schedule_articles_pilotin');
        function _pit_daily_cron_schedule_articles_pilotin($schedules) {
            $schedules['_pit_daily'] = array(
                'interval' => 86400,
                'display' => __('Every day', 'pilot-theme')
            );
            return $schedules;
        }
        /**
         *  2. Add event "_pit_event_custom" at 6AM the next day
         */
        $event_args     = array();
        $event_name     = '_pit_event_articles_pilotin';
        $event_schedule = '_pit_daily';
        // $event_time     = strtotime(date('d F Y 12h44'), time());
        $event_time     = strtotime(date('d F Y 10h00') . '+1 day', time());
        /**
         *  If the event is not already scheduled, schedule it. 
         */
        if (!wp_next_scheduled($event_name, $event_args))
            wp_schedule_event($event_time, $event_schedule, $event_name, $event_args);
    }
    /**
     *  PIT - Event
     */
    add_action('_pit_event_articles_pilotin', '_pit_action_daily_articles_pilotin', 10, 1);
    function _pit_action_daily_articles_pilotin() {
        $response = wp_remote_get( 'https://www.pilot-in.com/wp-json/wp/v2/posts');
        try {
            // Note that we decode the body's response since it's the actual JSON feed
        $json = json_decode($response['body']);


        foreach ($json as $article){
            $args = array(
                'post_type' => 'articlespilot_in',
                'posts_per_page' => 1,
                'content'  => $article->id,
                'post_status' => 'publish',
            );
            $args = array(
                'post_type'    => 'articlespilot_in',
                'name' => $article->slug,
              );
              
              $query = new WP_Query($args);
              
              if ($query->post_count == 0) {
                $new_post = array(
                    'post_type' => 'articlespilot_in', // Custom Post Type Slug
                    'post_status' => 'publish',
                    'post_title' => $article->title->rendered,
                    'content' => $article->id,
                    'meta_key'  => $article->id,
                    'post_date' => $article->date,
                    'post_modified' => $article->modified,
                    'name' => $article->slug,
                );
                    $post_id = wp_insert_post($new_post, true);
              }
        }
     
        } catch ( Exception $ex ) {
            $json = null;
        } // end try/catch
     
      
    }   
    add_action( 'wp_nav_menu', 'responsive_menu_button', 9, 2 );
    function responsive_menu_button( $menu, $args ) {
        $menu = '<button class="switch-menu md:hidden" type="button"><svg class="h-full inline fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></button>' . $menu;
        return $menu;
    }

   
    function hw_submenu( $output, $item ) {
       
        $sub = get_fields($item);
        
        $sub = $sub['pip_flexible'];
        // echo "<pre>"; var_dump($sub); echo "</pre>";                

                    
        if ( $sub != false && $sub != NULL) {
            $hw_output = '<div class="group-hover:opacity-100 ease-out duration-300 group-hover:z-10 group-hover:translate-y-0 translate-y-[-150%] group-hover:ease-inz-0 opacity-0 absolute py-8 lg:py-16 min-w-[40rem]  right-0"><ul class=" bg-zinc-800 w-full h-full py-5 px-10 relative">';
            $sub = $sub[0]['sous_menu'];
            foreach ( $sub as $subpost ) :
                setup_postdata( $subpost );
                $hw_output .= "<li class='flex justify-between items-center mb-5' ><a class='hover:text-sky-400' href='" . $subpost['lien']['url'] . "''>" . $subpost['lien']['title'] . "</a><img class=' right-0 top-0 h-30' src='".$subpost['image']."'></li>";
            endforeach; 
            wp_reset_postdata();
            $output .= $hw_output . "</ul></div>";
        }
    
        
        return $output;
    }    
    add_filter( 'walker_nav_menu_start_el', 'hw_submenu', 10, 2);

    function add_menu_link_class($atts, $item, $args)
    {
        $atts['class'] = 'pt-6';
        return $atts;
    }
    add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

    function add_additional_class_on_li($classes, $item, $args) {
        
        $classes[] = 'group relative px-5';
        
        return $classes;
    }
    add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

     
       
     
}
