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


<nav <?php echo acf_maybe_get( $configuration, 'section_id' ); ?>
class="<?php echo acf_maybe_get( $configuration, 'section_class' ); ?> bg-zinc-800 text-white"
    style="<?php echo apply_filters( 'pip/layout/section_style', '', $configuration ); ?>"
    <?php echo apply_filters( 'pip/layout/section_attributes', '', $configuration ); ?>>
    <?php // To add dynamic markup at the beginning of this layout
    do_action( 'pip/layout/section_start', $configuration ); ?>
    <ul class="flex justify-end container">
        <!-- <pre><?php var_dump($menu); ?></pre> -->
        <?php foreach ($menu as $item){?>
            <li class="<?php if( isset($item['mega_menu_check']) ){echo 'group relative';} ?> px-5"><a class="pt-6" href="<?php echo $item['item']['url']; ?>"><?php echo $item['item']['title']; ?></a>
                <?php if( isset($item['mega_menu_check']) && $item['sous_menu']){ ?>
                    <div class="group-hover:opacity-100 ease-out duration-300 group-hover:z-10	group-hover:translate-y-0 translate-y-[-150%]	group-hover:ease-inz-0 opacity-0 absolute py-16 min-w-[40rem]  right-0">
                        <ul class=" bg-zinc-800 w-full h-full py-5 px-10 relative" >
                            <?php foreach ($item['sous_menu'] as $sub_link){ ?>
                                <li class="<?php if($sub_link['image']){echo "group ";}?>">
                                    <a href="<?php echo $sub_link['sous_lien']['url']?>"><?php echo $sub_link['sous_lien']['title']?></a>
                                    <?php if($sub_link['image']){ ?>
                                        <img class="group-hover:opacity-100 opacity-0 absolute right-0 top-0 h-full" src="<?php echo $sub_link['image']?>">
                                    <?php }?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                <?php } ?>
            </li>
        <?php  }?>
    </ul>
</nav>