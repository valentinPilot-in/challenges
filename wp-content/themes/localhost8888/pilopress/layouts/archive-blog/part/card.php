<?php $fields= get_field('pip_flexible'); ?>
                   
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