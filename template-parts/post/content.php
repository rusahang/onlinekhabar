<article <?php post_class('c-post u-margin-buttom-20'); ?>>
    <div class="c-post__inner">
        <?php if(get_the_post_thumbnail() !== '') { ?>
        <div class="c-post__thumbnail">
            <?php the_post_thumbnail('onlinekhabar-blog-image'); ?>
        </div>
        <?php } ?>

        <?php get_template_part('template-parts/post/header'); ?>

        <?php if(is_single()) { ?>
        <div class="c-post__content">
            <?php the_content();
                wp_link_pages();
            ?>
        </div>
        <?php } else { ?>
        <div class="c-post__excerpt">
            <?php the_excerpt(); ?>
        </div>
        <?php } ?>
        <!-- Catigories and Tags -->
        <?php if(is_single()) { ?>
        <?php get_template_part('template-parts/post/footer'); ?>
        <?php } ?>
        <?php if( !is_single()) { onlinekhabar_readmore_link(); } ?>
    </div>
</article>