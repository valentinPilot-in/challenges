<?php
// Section
$configuration = pip_layout_configuration();
$css_vars      = acf_maybe_get( $configuration, 'css_vars' );

// Fields
$section_intro = get_sub_field( 'section_intro' );
$section_end   = get_sub_field( 'section_end' );

// Configuration
$advanced_mode   = get_sub_field( 'advanced_mode' );
$container_width = get_sub_field( 'container_width' );

// Content width
$content_width = pip_get_responsive_class( $container_width, $advanced_mode );

$images = get_sub_field( 'images' );
?>
<section <?php echo acf_maybe_get( $configuration, 'section_id' ); ?>
    class="<?php echo acf_maybe_get( $configuration, 'section_class' ); ?>"
    style="<?php echo apply_filters( 'pip/layout/section_style', '', $configuration ); ?>"
    <?php echo apply_filters( 'pip/layout/section_attributes', '', $configuration ); ?>>

    <?php // To add dynamic markup at the beginning of this layout
    do_action( 'pip/layout/section_start', $configuration ); ?>

    <div class="container">
        <div class="mx-auto <?php echo $content_width; ?>">

            <?php
            // Intro
            if ( $section_intro ) : ?>
                <div class="section_intro <?php echo acf_maybe_get( $css_vars, 'section_intro' ); ?>">
                    <?php echo $section_intro; ?>
                </div>
            <?php endif; ?>

            <section class="widget-meteo">
                
                <h2 class="h2">Widget Météo</h3>
                
                <?php
                    $meteo = getMeteo();
                    $urlImg = "http://openweathermap.org/img/wn/".$meteo->weather[0]->icon."@2x.png";
                    $temperature = round($meteo->main->temp);
                    $tempLike = round($meteo->main->feels_like);
                    $vent = round($meteo->wind->speed);
                    $ville = $meteo->name;
                    $humidity = $meteo->main->humidity;
                ?>
                <article class="bg-zinc-800 w-64 text-white text-center p-3 flex justify-center flex-col">
                    <img src="<?php echo $urlImg ?>">
                    <p class="text-4xl"><?php echo $temperature ?>°C</p>
                    <p class="h3 text-white"><?php echo $ville; ?></p>
                    <div class="flex justify-between py-6">
                        <div>
                            <p class="font-bold">Vent</p>
                            <p><?php echo $vent; ?>km/h</p>
                        </div>
                        <div>
                            <p class="font-bold">Humidité</p>
                            <p><?php echo $humidity; ?>%</p>
                        </div>
                        <div>
                            <p class="font-bold">Ressenti</p>
                            <p><?php echo $tempLike ?>°C</p>
                        </div>
                    </div>

                    
                </article>
               
            </section>

            <?php 
            // Outro
            if ( $section_end ) : ?>
                <div class="section_end <?php echo acf_maybe_get( $css_vars, 'section_end' ); ?>">
                    <?php echo $section_end; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php // To add dynamic markup at the end of this layout
    do_action( 'pip/layout/section_end', $configuration ); ?>

</section>
<?php
