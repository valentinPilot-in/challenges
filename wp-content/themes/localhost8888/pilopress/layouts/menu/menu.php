<?php
// Section
$configuration = pip_layout_configuration();
$css_vars      = acf_maybe_get( $configuration, 'css_vars' );

// Fields
$section_intro = get_sub_field( 'section_intro' );
$section_end   = get_sub_field( 'section_end' );
$menu = get_sub_field( 'menu' );

// Configuration
$advanced_mode   = get_sub_field( 'advanced_mode' );
$container_width = get_sub_field( 'container_width' );

// Content width
$content_width = pip_get_responsive_class( $container_width, $advanced_mode );

?>


<header <?php echo acf_maybe_get( $configuration, 'section_id' ); ?>
class="<?php echo acf_maybe_get( $configuration, 'section_class' ); ?> bg-zinc-800 text-white "
    style="<?php echo apply_filters( 'pip/layout/section_style', '', $configuration ); ?>"
    <?php echo apply_filters( 'pip/layout/section_attributes', '', $configuration ); ?>>
    <?php do_action( 'pip/layout/section_start', $configuration ); ?>
    <nav class="container flex  justify-end">
        <?php  wp_nav_menu( array(
            'menu_class' => 'justify-end container hidden md:flex ',        
            'menu' => '1'
        ) ); ?>
    </nav>
   
</header>
