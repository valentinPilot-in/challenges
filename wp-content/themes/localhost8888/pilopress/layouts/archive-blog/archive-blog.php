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

            <section class="archive-articles">
            <?php
            // the query
            
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'order' => 'DESC',
                'orderby' => 'date'
            );
            $the_query = new WP_Query( $args ); ?>

            <?php if ( $the_query->have_posts() ) : ?>
                <?php $categories =get_categories(
                    array(
                    'orderby' => 'count',
                    'order'   => 'DESC'
                    )
                );?>
                <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="POST" class="form-post-categories">
                    <select name="categorie_slug">>
                        <option value="all">Tout</option>
                        <?php foreach($categories as $categorie){
                            if($categorie->slug != "uncategorized"){
                                echo "<option value='".$categorie->slug."'>".$categorie->name."</option>";
                            }
                        }?>
                    </select>
                    <input type="hidden" name="postid" value="<?php echo get_the_ID(); ?>">
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'select_category_post' ); ?>"> 
                    <input type="hidden" name="action" value="select_category_post">
                    <!-- <input class="btn-primary bg-primary" type=submit value="envoyer"> -->
                </form>
                <!-- <form id="target" action="destination.html">
                    <input type="text" value="Hello there">
                    <input type="submit" value="Go">
                </form> -->
                

                <h2 class="h2">Archive Blog</h2>
                <div class="grid grid-cols-1  md:grid-cols-2 lg:grid-cols-3 gap-4 list-articles">

                <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                    $fields= get_field('pip_flexible'); ?>
                        
                    <article class="w-full py-5  pb-16 shadow-xl rounded-lg relative">
                        
                        <h3 class="h3 px-3"><?php the_title(); ?></h2>
                        <div class="flex-none w-full relative h-72">
                            <?php echo get_the_post_thumbnail(); ?>
                        </div>
                        <?php if(isset($fields[0]['content'])): ?>
                        <div class="flex-none my-3 px-3 w-full text-ellipsis overflow-hidden max-h-[6rem]">
                            <?php echo $fields[0]['content'];?>
                        </div>
                        <?php endif; ?>
                        
                        <a class="btn-primary mx-3 absolute bottom-5 right-2" href="<?php echo get_permalink();?>">Voir l'article</a>
                    </article>
                   <?php //get_template_part('card');?>
                <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e( "Aucun article n'est disponible pour le moment" ); ?></p>
            <?php endif; ?>
                
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
